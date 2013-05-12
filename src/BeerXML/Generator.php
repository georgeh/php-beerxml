<?php


namespace BeerXML;

use BeerXML\Exception\InvalidRecord;
use BeerXML\Generator\IEquipment;
use BeerXML\Generator\IFermentable;
use BeerXML\Generator\IHop;
use BeerXML\Generator\IMashProfile;
use BeerXML\Generator\IMashStep;
use BeerXML\Generator\IMisc;
use BeerXML\Generator\IRecipe;
use BeerXML\Generator\IStyle;
use BeerXML\Generator\IWater;
use BeerXML\Generator\IYeast;
use BeerXML\Generator\Record;

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
        '\BeerXML\Generator\IHop'         => array('tag' => 'HOPS', 'generator' => 'BeerXML\Generator\Hop'),
        '\BeerXML\Generator\IFermentable' => array(
            'tag'       => 'FERMENTABLES',
            'generator' => 'BeerXML\Generator\Fermentable'
        ),
        '\BeerXML\Generator\IYeast'       => array('tag' => 'YEASTS', 'generator' => 'BeerXML\Generator\Yeast'),
        '\BeerXML\Generator\IMisc'        => array('tag' => 'MISCS', 'generator' => 'BeerXML\Generator\Misc'),
        '\BeerXML\Generator\IWater'       => array('tag' => 'WATERS', 'generator' => 'BeerXML\Generator\Water'),
        '\BeerXML\Generator\IStyle'       => array('tag' => 'STYLES', 'generator' => 'BeerXML\Generator\Style'),
        '\BeerXML\Generator\IMashStep'    => array('tag' => 'MASH_STEPS', 'generator' => 'BeerXML\Generator\MashStep'),
        '\BeerXML\Generator\IMash'        => array('tag' => 'MASHS', 'generator' => 'BeerXML\Generator\MashProfile'),
        '\BeerXML\Generator\IRecipe'      => array('tag' => 'RECIPES', 'generator' => 'BeerXML\Generator\Recipe'),
        '\BeerXML\Generator\IEquipment'   => array('tag' => 'EQUIPMENTS', 'generator' => 'BeerXML\Generator\Equipment'),
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
        $this->xmlWriter->writeComment('Created with php-beerxml: https://github.com/georgeh/php-beerxml');

        list($setTag, $generator) = $this->getTagGeneratorForObject($this->records[0]);
        /** @var $generator Record */
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
     * @param IHop|IFermentable|IEquipment|IYeast|IMisc|IWater|IStyle|IMashStep|IMashProfile|IRecipe $record
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