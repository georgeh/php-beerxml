<?php
/*
   Copyright 2013: Kaspar Bach Pedersen

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

     http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
*/

namespace BeerXML\Test\Parser;

use BeerXML\Parser\RecordFactory;
use BeerXML\Parser\Yeast;

/**
 * Class YeastTest
 * @package BeerXML\Test\Parser
 * @covers BeerXML\Parser\Yeast
 */
class YeastTest extends \PHPUnit_Framework_TestCase {
    /**
     * @var Yeast
     */
    private $parser;

    public function setUp()
    {
        $this->parser = new Yeast();
        $this->parser->setRecordFactory(new RecordFactory());
    }

    public function testParseYeastWithCultureDate()
    {
        // Dates are defined very loosely in the beerxml standard
        $this->parser->setXmlString(file_get_contents(dirname(dirname(__FILE__)) . '/fixtures/yeast-culture-date.xml'));
        $yeast = $this->parser->parse();
        /** @var $yeast \BeerXML\Record\Yeast */
        $this->assertEquals("Nottingham Yeast", $yeast->getName());
        $this->assertEquals(1, $yeast->getVersion());
        $this->assertEquals("Ale", $yeast->getType());
        $this->assertEquals("Dry", $yeast->getForm());
        // Allow a little room floating point
        $amount = $yeast->getAmount();
        $this->assertTrue($amount < 0.02366 && $amount > 0.02365);
        $this->assertFalse($yeast->getAmountIsWeight());
        $this->assertEquals("Lallemand", $yeast->getLaboratory());
        $this->assertEquals("-", $yeast->getProductId());

        $minTemperature = $yeast->getMinTemperature();
        $this->assertTrue($minTemperature < 16.66667 && $minTemperature > 16.66666);
        $maxTemperature = $yeast->getMaxTemperature();
        $this->assertTrue($maxTemperature < 22.2223 && $maxTemperature > 22.2222);
        $this->assertEquals("Very High", $yeast->getFlocculation());
        $this->assertEquals(75, $yeast->getAttenuation());
        $this->assertEquals("High flocculation - settles quickly.  Very good reputation as a fast starter and quick fermenter.  Clean and only slightly fruity.  Some nutty flavor in bottled version.  Relatively high attenuation.",
            $yeast->getNotes());
        $this->assertEquals("Ales", $yeast->getBestFor());
        $this->assertEquals(5, $yeast->getMaxReuse());
        $this->assertEquals(0, $yeast->getTimesCultured());
        $this->assertFalse($yeast->getAddToSecondary());
        $this->assertEquals("23.66 ml", $yeast->getDisplayAmount());
        $this->assertEquals("16.7 C", $yeast->getDispMinTemp());
        $this->assertEquals("22.2 C", $yeast->getDispMaxTemp());
        $this->assertEquals("0.0 pkg", $yeast->getInventory());
        $cultureDateString = $yeast->getCultureDate()->format("Ymd");
        $this->assertEquals("20030613", $cultureDateString);
    }

} 