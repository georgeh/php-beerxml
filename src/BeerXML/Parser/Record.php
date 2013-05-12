<?php


namespace BeerXML\Parser;


use BeerXML\Exception\BadData;

abstract class Record
{
    /**
     * The <TAG> that a subclass parses
     * @var string
     */
    protected $tagName = null;

    /**
     * @var \XMLReader
     */
    protected $xmlReader;

    /**
     * @var RecordFactory
     */
    protected $recordFactory;

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     *
     * @var array
     */
    protected $simpleProperties = array();

    protected $complexProperties = array(
        'STYLE'     => array(
            'parser' => '\BeerXML\Parser\Style',
            'method' => 'setStyle'
        ),
        'EQUIPMENT' => array(
            'parser' => '\BeerXML\Parser\Equipment',
            'method' => 'setEquipment'
        ),
        'MASH'      => array(
            'parser' => '\BeerXML\Parser\MashProfile',
            'method' => 'setMash'
        ),
    );

    protected $complexPropertySets = array(
        'HOPS'         => array(
            'tag'    => 'HOP',
            'parser' => '\BeerXML\Parser\Hop',
            'method' => 'addHop'
        ),
        'FERMENTABLES' => array(
            'tag'    => 'FERMENTABLE',
            'parser' => '\BeerXML\Parser\Fermentable',
            'method' => 'addFermentable',
        ),
        'MISCS'        => array(
            'tag'    => 'MISC',
            'parser' => '\BeerXML\Parser\Misc',
            'method' => 'addMisc',
        ),
        'WATERS'       => array(
            'tag'    => 'WATER',
            'parser' => '\BeerXML\Parser\Water',
            'method' => 'addWater',
        ),
        'YEASTS'       => array(
            'tag'    => 'YEAST',
            'parser' => '\BeerXML\Parser\Yeast',
            'method' => 'addYeast',
        ),
        'MASH_STEPS'   => array(
            'tag'    => 'MASH_STEP',
            'parser' => '\BeerXML\Parser\MashStep',
            'method' => 'addMashStep',
        ),
        'STYLES'       => array(
            'tag'    => 'STYLE',
            'parser' => '\BeerXML\Parser\Style',
            'method' => 'addSTyle'
        ),
        'EQUIPMENTS'   => array(
            'tag'    => 'EQUIPMENT',
            'parser' => '\BeerXML\Parser\Equipment',
            'method' => 'addEquipment'
        ),
        'MASHS'        => array(
            'tag'    => 'MASH',
            'parser' => '\BeerXML\Parser\MashProfile',
            'method' => 'addMash'
        ),
    );

    /**
     * @param RecordFactory $recordFactory
     */
    public function setRecordFactory($recordFactory)
    {
        $this->recordFactory = $recordFactory;
    }

    /**
     * @param \XMLReader $xmlReader
     */
    public function setXmlReader($xmlReader)
    {
        $this->xmlReader = $xmlReader;
    }

    /**
     * @param string $xmlStr BeerXML to parse
     */
    public function setXmlString($xmlStr)
    {
        $this->xmlReader = new \XMLReader();
        $this->xmlReader->XML($xmlStr);
    }

    /**
     * @throws BadData
     * @return mixed
     */
    public function parse()
    {
        $record = $this->createRecord();
        // While this recipe is still open
        while ($this->tagName != $this->xmlReader->name || \XMLReader::END_ELEMENT != $this->xmlReader->nodeType) {
            if (!$this->xmlReader->read()) {
                throw new BadData('Surprise end of file!');
            };

            if (\XMLReader::ELEMENT == $this->xmlReader->nodeType) {
                if (isset($this->simpleProperties[$this->xmlReader->name])) {
                    $method = $this->simpleProperties[$this->xmlReader->name];
                    // Call the setter method
                    $record->{$method}($this->xmlReader->readString());
                } elseif (isset($this->complexProperties[$this->xmlReader->name])) {
                    $this->setComplexProperty($record);
                } elseif (isset($this->complexPropertySets[$this->xmlReader->name])) {
                    $this->setComplexPropertySet($record);
                } else {
                    $this->otherElementEncountered($record);
                }
            }
        }

        return $record;
    }

    abstract protected function createRecord();

    /**
     * Called when an unknown element is encountered, useful for edge cases
     *
     * @param IRecipe|IEquipment|IFermentable|IHop|IMashProfile|IMisc|IStyle|IWater|IYeast
     */
    protected function otherElementEncountered($record)
    {
    }

    /**
     * Add a set of records to the record
     *
     * @param $record
     * @throws \Exception
     */
    protected function setComplexPropertySet($record)
    {
        // Sets of records
        $setTag = $this->xmlReader->name;
        $setType = $this->complexPropertySets[$this->xmlReader->name];
        $tag = $setType['tag'];
        $parserClass = $setType['parser'];
        $recordAdder = $setType['method'];
        while ($setTag != $this->xmlReader->name || \XMLReader::END_ELEMENT != $this->xmlReader->nodeType) {
            if (!$this->xmlReader->read()) {
                throw new \Exception('Surprise end of file!');
            };

            if ($tag == $this->xmlReader->name && \XMLReader::ELEMENT == $this->xmlReader->nodeType) {
                $recordParser = $this->createRecordParser($parserClass);
                $complex = $recordParser->parse();
                // Add the record
                $record->{$recordAdder}($complex);
            }
        }
    }

    /**
     * Set a complex value to the record
     *
     * @param $record
     */
    protected function setComplexProperty($record)
    {
        $recordType = $this->complexProperties[$this->xmlReader->name];
        $recordParser = $this->createRecordParser($recordType['parser']);
        $complex = $recordParser->parse();
        $method = $recordType['method'];
        // Call the setter method
        $record->{$method}($complex);
    }

    /**
     * @param string $class
     * @return Record
     */
    protected function createRecordParser($class)
    {
        $recordParser = new $class;
        /** @var $recordParser Record */
        $recordParser->setXmlReader($this->xmlReader);
        $recordParser->setRecordFactory($this->recordFactory);
        return $recordParser;
    }
}

