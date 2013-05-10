<?php


namespace BeerXML;

use BeerXML\Exception\InvalidRecord;

/**
 * BeerXML Generator Class
 *
 * @package BeerXML
 *
 * <code>
 * <?php
 * $recipe = new \BeerXML\Record\Recipe();
 * $recipe->setName('My Brew');
 *
 * $generator = new \BeerXML\Generator();
 * $generator->addRecord($recipe);
 * $xml = $generator->render();
 * echo $xml;
 * </code>
 */
class Generator
{

    /**
     * @var \XMLWriter
     */
    private $xmlWriter;

    /**
     * Mapping classes to set tags
     *
     * @var array
     */
    private $recordSetTags = array(
        '\BeerXML\Generator\IHopReader'         => array('tag' => 'HOPS', 'generator' => 'BeerXML\Generator\Hop'),
        '\BeerXML\Generator\IFermentableReader' => array('tag'       => 'FERMENTABLES',
                                                         'generator' => 'BeerXML\Generator\Hop'
        ),
        '\BeerXML\Generator\IYeastReader'       => array('tag' => 'YEASTS', 'generator' => 'BeerXML\Generator\Hop'),
        '\BeerXML\Generator\IMiscReader'        => array('tag' => 'MISCS', 'generator' => 'BeerXML\Generator\Hop'),
        '\BeerXML\Generator\IWaterReader'       => array('tag' => 'WATERS', 'generator' => 'BeerXML\Generator\Hop'),
        '\BeerXML\Generator\IStyleReader'       => array('tag' => 'STYLES', 'generator' => 'BeerXML\Generator\Hop'),
        '\BeerXML\Generator\IMashStepReader'    => array('tag' => 'MASH_STEPS', 'generator' => 'BeerXML\Generator\Hop'),
        '\BeerXML\Generator\IMashReader'        => array('tag' => 'MASHS', 'generator' => 'BeerXML\Generator\Hop'),
        '\BeerXML\Generator\IRecipeReader'      => array('tag' => 'RECIPES', 'generator' => 'BeerXML\Generator\Recipe'),
        '\BeerXML\Generator\IEquipmentReader'   => array('tag' => 'EQUIPMENTS', 'generator' => 'BeerXML\Generator\Hop'),
    );

    /**
     * Records to build
     *
     * @var array
     */
    private $records = array();

    public function __construct()
    {
        $this->xmlWriter = new \XMLWriter();
    }


    /**
     * @param $record
     */
    public function addRecord($record)
    {
        $this->records[] = $record;
    }

    /**
     * Creates the XML
     *
     * @return string BeerXML
     */
    public function render()
    {
        $this->xmlWriter->openMemory();
        $this->xmlWriter->startDocument('1.0', 'UTF-8');

        list($setTag, $generator) = $this->getTagGeneratorForObject($this->records[0]);
        $generator->setXmlWriter($this->xmlWriter);
        $this->xmlWriter->startElement($setTag);
        foreach ($this->records as $record) {
            $generator->setRecord($record);
            $generator->build();
        }
        $this->xmlWriter->endElement();
        return $this->xmlWriter->outputMemory(true);
    }

    /**
     * @param Record\IHopReader|Record\IFermentableReader|Record\IYeastReader|Record\IMiscReader|Record\IWaterReader|Record\IStyleReader|Record\IMashStepReader|Record\IMashReader|Record\IRecipeReader|Record\IEquipmentReader $record
     * @return array(string, Record)
     * @throws Exception\InvalidRecord
     */
    private function getTagGeneratorForObject($record)
    {
        foreach ($this->recordSetTags as $interface => $tagGen) {
            if ($record instanceof $interface) {
                $tag            = $tagGen['tag'];
                $generatorClass = $tagGen['generator'];
                $generator      = new $generatorClass();
                return array($tag, $generator);
            }
        }

        throw new InvalidRecord('Record did not implement a valid Reader interface');
    }
}