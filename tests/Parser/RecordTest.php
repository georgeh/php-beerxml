<?php


namespace BeerXML\Test\Parser;


use BeerXML\Parser\Recipe;
use BeerXML\Parser\RecordFactory;

/**
 * Class RecordTest
 *
 * @package BeerXML\Test\Parser
 * @covers BeerXML\Parser\Record
 */
class RecordTest extends \PHPUnit_Framework_TestCase {


    /**
     * @expectedException \BeerXML\Exception\BadData
     */
    public function testThrowsExceptionOnTruncatedFile()
    {
        $parser = new Recipe();
        $parser->setRecordFactory(new RecordFactory());
        $parser->setXmlString('<RECIPES><RECIPE><NAME>foo</NAME>');
        $parser->parse();
    }
}
