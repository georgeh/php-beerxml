<?php


namespace BeerXML\Test\Generator;


use BeerXML\Generator\Misc;

class MiscTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Misc
     */
    protected $gen;

    /**
     * @var \BeerXML\Record\Misc
     */
    protected $record;

    /**
     * @var \XMLWriter
     */
    protected $xmlWriter;

    public function setUp()
    {
        $this->gen = new Misc();
        $this->record = new \BeerXML\Record\Misc();
        $this->gen->setRecord($this->record);
        $this->xmlWriter = new \XMLWriter();
        $this->xmlWriter->openMemory();
        $this->gen->setXmlWriter($this->xmlWriter);
    }

    public function testBooleanFieldRendersCorrectly()
    {
        $this->record->setAmountIsWeight(true);
        $this->gen->build();
        $xml = $this->xmlWriter->outputMemory(true);
        $this->assertTag(array('tag' => 'AMOUNT_IS_WEIGHT', 'content' => 'TRUE'), $xml, '', false);
    }

    public function testAmountIsWeightIsOmmittedIfFalse()
    {
        $this->record->setAmountIsWeight(false);
        $this->gen->build();
        $xml = $this->xmlWriter->outputMemory(true);
        $this->assertNotTag(array('tag' => 'AMOUNT_IS_WEIGHT'), $xml, '', false);
    }
}
