<?php


namespace BeerXML\Test;

use BeerXML\Generator;
use BeerXML\Record\Recipe;

class GeneratorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Generator
     */
    private $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
    }


    public function testCreatesRecipesBlock()
    {
        $recipe = new Recipe();
        $recipe->setName('Foo');
        $this->generator->addRecord($recipe);
        $xml = $this->generator->render();
        $this->assertTag(array(
                'tag' => 'RECIPES',
                'child' => array(
                    'tag' => 'RECIPE',
                    'child' => array(
                        'tag' => 'NAME',
                        'content' => 'Foo',
                    ),
                ),
            ), $xml, '', false);
    }

    public function testOnlyAssignsConditionalFieldsIfNotEmpty()
    {
        $recipe = new Recipe();
        $recipe->setAsstBrewer('Bruce Wayne');
        $this->generator->addRecord($recipe);
        $xml = $this->generator->render();
        $this->assertContains('<ASST_BREWER>Bruce Wayne</ASST_BREWER>', $xml);
        $this->assertNotContains('<TERTIARY_AGE>', $xml);
    }

    public function testAdditionalFieldsAreAssigned()
    {
        $recipe = new Recipe();
        $recipe->setType(Recipe::TYPE_ALL_GRAIN);
        $this->generator->addRecord($recipe);
        $xml = $this->generator->render();
        // Efficiency is required for all grain recipes
        $this->assertContains('<EFFICIENCY', $xml);
    }

}
