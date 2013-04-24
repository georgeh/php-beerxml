<?php


namespace BeerXML;


use BeerXML\Parser\Record;

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
     * @param string $xmlStr BeerXML to parse
     */
    public function setXmlString($xmlStr)
    {
        $this->xmlReader = new \XMLReader();
        $this->xmlReader->XML($xmlStr);
    }

    /**
     * Parse a beer XML, returning an array of the record objects found
     * @return array
     */
    public function parse()
    {
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