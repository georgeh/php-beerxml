<?php


namespace BeerXML\Test\Parser;


use BeerXML\Parser\Recipe;

class RecipeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Recipe
     */
    private $parser;

    protected function setUp()
    {
        $this->parser = new Recipe();
    }

    public function testReturnsRecipe()
    {
        $this->parser->setXmlString(file_get_contents(dirname(dirname(__FILE__)) . '/fixtures/recipe-record.xml'));
        $recipe = $this->parser->parse();
        $this->assertInstanceOf('BeerXML\Record\Recipe', $recipe);
    }

}
