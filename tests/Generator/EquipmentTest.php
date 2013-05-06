<?php


namespace BeerXML\Test\Generator;


use BeerXML\Generator\Equipment;

class EquipmentTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Equipment
     */
    protected $generator;

    /**
     * @var \XMLWriter
     */
    protected $xml;

    /**
     * @var \BeerXML\Record\Equipment
     */
    protected $record;

    protected function setUp()
    {
        $this->generator = new Equipment();
        $this->xml = new \XMLWriter();
        $this->xml->openMemory();
        $this->generator->setXmlWriter($this->xml);
        $this->record = new \BeerXML\Record\Equipment();
        $this->generator->setRecord($this->record);
        parent::setUp();
    }

    public function testConvertsBooleanToString()
    {
        $this->record->setCalcBoilVolume(true);
        $this->generator->build();
        $xml = $this->xml->outputMemory(true);
        $this->assertTag(array('tag' => 'CALC_BOIL_VOLUME', 'content' => 'TRUE'), $xml, '', false);

        $this->record->setCalcBoilVolume(false);
        $this->generator->build();
        $xml = $this->xml->outputMemory(true);
        $this->assertTag(array('tag' => 'CALC_BOIL_VOLUME', 'content' => 'FALSE'), $xml, '', false);
    }
}
