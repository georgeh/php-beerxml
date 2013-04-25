<?php


namespace BeerXML\Test;


use BeerXML\Generator;
use BeerXML\Record\Recipe;

class GeneratorTest extends \PHPUnit_Framework_TestCase {
    public function testCreatesRecipesBlock()
    {
        $generator = new Generator();
        $recipe = new Recipe();
        $recipe->setName('Foo');
        $generator->addRecord($recipe);
        $xml = $generator->render();
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
}
