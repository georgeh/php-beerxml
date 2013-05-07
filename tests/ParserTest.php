<?php

namespace BeerXML\Test;

use BeerXML\Parser;
use BeerXML\Record\Hop;
use BeerXML\Record\Recipe;
use BeerXML\Record\Misc;
use BeerXML\Record\Yeast;


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

    public function testReturnsRecords()
    {
        $xml = file_get_contents(dirname(__FILE__) . '/fixtures/recipe-simplest.xml');
        $result = $this->parser->parse($xml);
        $this->assertEquals(1, count($result));
        $this->assertInstanceOf('BeerXML\Record\Recipe', $result[0]);
    }

    public function testReturnsComplexRecords()
    {
        $xml = file_get_contents(dirname(__FILE__) . '/fixtures/recipe-record.xml');
        $result = $this->parser->parse($xml);
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

    public function testCanDealWithOfficialExample()
    {
        $xml = file_get_contents(dirname(__FILE__) . '/fixtures/recipes-4fromweb.xml');
        $result = $this->parser->parse($xml);
        $this->assertEquals(4, count($result));

        $burtonAle = $result[0];
        /** @var $burtonAle Recipe */
        $miscs = $burtonAle->getMiscs();
        $this->assertEquals(2, count($miscs));
        $polyclar = $miscs[1];
        /** @var $polyclar Misc */
        $this->assertEquals('Chill Haze', $polyclar->getUseFor() );

        list($burtonYeast) = $burtonAle->getYeasts();
        /** @var $burtonYeast \BeerXML\Record\Yeast */
        $this->assertEquals('Burton-on-trent yeast produces a complex character.  Flavors include apple, pear, and clover honey.', $burtonYeast->getNotes() );
        $this->assertEquals(Yeast::TYPE_ALE, $burtonYeast->getType());

        list($water) = $burtonAle->getWaters();
        /** @var $water \BeerXML\Record\Water */
        $this->assertEquals('Burton On Trent, UK', $water->getName());
        $this->assertEquals(300, $water->getBicarbonate());

        $equipment = $burtonAle->getEquipment();
        /** @var $equipment \BeerXML\Record\Equipment */
        $this->assertEquals('Brew Pot  (6+gal) and Igloo/Gott Cooler (5 Gal)', $equipment->getName());
        $this->assertEquals(60, $equipment->getBoilTime());
    }
}
