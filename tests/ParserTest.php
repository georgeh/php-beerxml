<?php

namespace BeerXML\Test;

use BeerXML\Parser;
use BeerXML\Record\Hop;
use BeerXML\Record\Recipe;


class ParserTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Parser
     */
    private $parser;

    public function setUp()
    {
        $this->parser = new Parser();
    }

    public function testParserReturnsRecords()
    {
        $xml = file_get_contents(dirname(__FILE__) . '/fixtures/recipe-simplest.xml');
        $this->parser->setXmlString($xml);
        $result = $this->parser->parse();
        $this->assertEquals(1, count($result), print_r($result, true));
        $this->assertInstanceOf('BeerXML\Record\Recipe', $result[0]);
    }

    public function testParserReturnsComplexRecords()
    {
        $xml = file_get_contents(dirname(__FILE__) . '/fixtures/recipe-record.xml');
        $this->parser->setXmlString($xml);
        $result = $this->parser->parse();
        $this->assertEquals(1, count($result));
        $recipe = $result[0];
        /** @var $recipe Recipe */
        $this->assertInstanceOf('BeerXML\Record\Recipe', $recipe);
        $this->assertEquals('Dry Stout', $recipe->getStyle()->getName());

        $this->assertEquals(1, count($recipe->getHops()));
        list($hop) = $recipe->getHops();
        /** @var $hop Hop */
        $this->assertEquals(5.0, $hop->getAlpha());

        $this->assertEquals(3, count($recipe->getFermentables()));
    }
}
