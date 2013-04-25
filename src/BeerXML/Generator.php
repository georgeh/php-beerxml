<?php


namespace BeerXML;


class Generator {

    /**
     * @var \XMLWriter
     */
    private $xmlWriter;

    /**
     * Mapping classes to set tags
     * @todo replace with reader interfaces and injectable dependencies
     * @var array
     */
    private $recordSetTags = array(
        'BeerXML\Record\Hop'         => array('tag' => 'HOPS', 'generator' => 'BeerXML\Generator\Hop'),
        'BeerXML\Record\Fermentable' => array('tag' => 'FERMENTABLES', 'generator' => 'BeerXML\Generator\Hop'),
        'BeerXML\Record\Yeast'       => array('tag' => 'YEASTS', 'generator' => 'BeerXML\Generator\Hop'),
        'BeerXML\Record\Misc'        => array('tag' => 'MISCS', 'generator' => 'BeerXML\Generator\Hop'),
        'BeerXML\Record\Water'       => array('tag' => 'WATERS', 'generator' => 'BeerXML\Generator\Hop'),
        'BeerXML\Record\Style'       => array('tag' => 'STYLES', 'generator' => 'BeerXML\Generator\Hop'),
        'BeerXML\Record\MashStep'    => array('tag' => 'MASH_STEPS', 'generator' => 'BeerXML\Generator\Hop'),
        'BeerXML\Record\Mash'        => array('tag' => 'MASHS', 'generator' => 'BeerXML\Generator\Hop'),
        'BeerXML\Record\Recipe'      => array('tag' => 'RECIPES', 'generator' => 'BeerXML\Generator\Recipe'),
        'BeerXML\Record\Equipment'   => array('tag' => 'EQUIPMENTS', 'generator' => 'BeerXML\Generator\Hop'),
    );

    /**
     * Records to build
     * @var array
     */
    private $records = array();

    function __construct()
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
     * @return string BeerXML
     */
    public function render()
    {
        $this->xmlWriter->openMemory();
        $this->xmlWriter->startDocument('1.0', 'UTF-8');

        $recordClass = get_class($this->records[0]);
        $setTag = $this->recordSetTags[$recordClass]['tag'];
        $generatorClass = $this->recordSetTags[$recordClass]['generator'];
        $generator = new $generatorClass();
        $generator->setXmlWriter($this->xmlWriter);
        $this->xmlWriter->startElement($setTag);
        foreach ($this->records as $record) {
            $generator->setRecord($record);
            $generator->build();
        }
        $this->xmlWriter->endElement();
        return $this->xmlWriter->outputMemory(true);

    }
}