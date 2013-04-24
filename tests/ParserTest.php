<?php

namespace BeerXML\Test;

use BeerXML\Parser;


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
}
