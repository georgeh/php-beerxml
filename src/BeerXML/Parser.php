<?php


namespace BeerXML;


use BeerXML\Record\MashProfile;
use BeerXML\Parser\Record;
use BeerXML\Record\Equipment;
use BeerXML\Record\Fermentable;
use BeerXML\Record\Hop;
use BeerXML\Record\Misc;
use BeerXML\Record\Recipe;
use BeerXML\Record\Style;
use BeerXML\Record\Water;
use BeerXML\Record\Yeast;

/**
 * Parses BeerXML 1.0 files into PHP record classes
 *
 * <code>
 * <?php
 * $parser = new \BeerXML\Parser();
 * $result = $parser->parse(file_get_contents('http://www.beerxml.com/recipes.xml'));
 * foreach ($result as $recipe) {
 *     echo "Found beer recipe " . $recipe->getName() . "\n";
 * }
 * </code>
 * @package BeerXML
 */
class Parser
{
    /**
     * @var \XMLReader
     */
    private $xmlReader;

    /**
     * @var Parser\Record
     */
    private $recipeParser;

    private $tagParsers = array(
        'RECIPE'      => '\BeerXML\Parser\Recipe',
        'HOP'         => '\BeerXML\Parser\Hop',
        'FERMENTABLE' => '\BeerXML\Parser\Fermentable',
        'YEAST'       => '\BeerXML\Parser\Yeast',
        'MISC'        => '\BeerXML\Parser\Misc',
        'WATER'       => '\BeerXML\Parser\Water',
        'EQUIPMENT'   => '\BeerXML\Parser\Equipment',
        'STYLE'       => '\BeerXML\Parser\Style',
        'MASH_STEP'   => '\BeerXML\Parser\MashStep',
        'MASH'        => '\BeerXML\Parser\Mash'
    );

    /**
     * @param \XMLReader $xmlReader
     */
    function __construct($xmlReader = null)
    {
        if (is_null($xmlReader)) {
            $xmlReader = new \XMLReader();
        }
        $this->xmlReader = $xmlReader;
    }

    /**
     * Parse a beer XML, returning an array of the record objects found
     *
     * @param string $xml
     * @return Recipe[]|Equipment[]|Fermentable[]|Hop[]|MashProfile[]|Misc[]|Style[]|Water[]|Yeast[]
     */
    public function parse($xml)
    {
        $this->xmlReader->XML($xml);
        $records = array();

        while ($this->xmlReader->read()) {
            // Find records
            if ($this->xmlReader->nodeType == \XMLReader::ELEMENT && isset($this->tagParsers[$this->xmlReader->name])) {
                $recordParser = new $this->tagParsers[$this->xmlReader->name];
                $recordParser->setXmlReader($this->xmlReader);
                $records[] = $recordParser->parse();
            }
        }

        $this->xmlReader->close();

        return $records;
    }

}