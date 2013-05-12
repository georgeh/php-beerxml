<?php


namespace BeerXML\Test\Parser;


use BeerXML\Parser\Hop;
use BeerXML\Parser\RecordFactory;

/**
 * Class HopTest
 *
 * @package BeerXML\Test\Parser
 * @covers BeerXML\Parser\Hop
 */
class HopTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var Hop
     */
    private $parser;

    public function setUp()
    {
        $this->parser = new Hop();
        $this->parser->setRecordFactory(new RecordFactory());
    }

    public function testHopFieldsAreParsed()
    {
        $this->parser->setXmlString(file_get_contents(dirname(dirname(__FILE__)) . '/fixtures/hop-example.xml'));
        $hop = $this->parser->parse();
        /** @var $hop \BeerXML\Record\Hop */
        $this->assertEquals(0.050, $hop->getAmount());
        $this->assertEquals(1, $hop->getVersion());
        $this->assertEquals(\BeerXML\Record\Hop::USE_MASH, $hop->getUse());
        $this->assertEquals(4.5, $hop->getAlpha());
        $this->assertEquals('Shortened for unit tests', $hop->getNotes());
        $this->assertEquals(45, $hop->getTime());
        $this->assertEquals(5.5, $hop->getBeta());
        $this->assertEquals('Super Hops', $hop->getName());
        $this->assertEquals('Planet Krypton', $hop->getOrigin());
        $this->assertEquals('Goldings, Fuggles, Super Alpha', $hop->getSubstitutes());
        $this->assertEquals(24.4, $hop->getMyrcene());
        $this->assertEquals(30, $hop->getHsi());
        $this->assertEquals(\BeerXML\Record\Hop::FORM_LEAF, $hop->getForm());
        $this->assertEquals(\BeerXML\Record\Hop::TYPE_BITTERING, $hop->getType());
        $this->assertEquals(13.2, $hop->getCohumulone());
        $this->assertEquals(14, $hop->getHumulene());
        $this->assertEquals(4.1, $hop->getCaryophyllene());
    }


}
