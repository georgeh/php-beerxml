<?php


namespace BeerXML\Test\Parser;


use BeerXML\Parser\Recipe;
use BeerXML\Parser\RecordFactory;

/**
 * Class RecipeTest
 *
 * @package BeerXML\Test\Parser
 * @covers \BeerXML\Record\Recipe
 */
class RecipeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Recipe
     */
    private $parser;

    public function testBooleansReturnFalse()
    {
        $this->parser->setXmlString('<RECIPE><FORCED_CARBONATION>TRUE</FORCED_CARBONATION></RECIPE>');
        $recipe = $this->parser->parse();
        /** @var $recipe \BeerXML\Record\Recipe */
        $this->assertTrue($recipe->getForcedCarbonation());
    }

    protected function setUp()
    {
        $this->parser = new Recipe();
        $this->parser->setRecordFactory(new RecordFactory());
    }

    public function testReturnsRecipe()
    {
        $this->parser->setXmlString(file_get_contents(dirname(dirname(__FILE__)) . '/fixtures/recipe-record.xml'));
        $recipe = $this->parser->parse();
        $this->assertInstanceOf('BeerXML\Record\Recipe', $recipe);
    }

}
