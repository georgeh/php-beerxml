<?php


namespace BeerXML\Test\Record;

use BeerXML\Record\Recipe;

/**
 * Class RecipeTest
 * @package BeerXML\Test\Record
 * @covers BeerXML\Record\Recipe
 */
class RecipeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Recipe
     */
    protected $recipe;

    protected function setUp()
    {
        $this->recipe = new Recipe();
    }


    public function testHasGettersAndSetters()
    {
        $accessors = array(
            "Age"                => 24.0,
            "AgeTemp"            => 17.0,
            "AsstBrewer"         => "Yoshi Scooter",
            "BatchSize"          => 18.93,
            "BoilSize"           => 20.82,
            "BoilTime"           => 60.0,
            "Brewer"             => "George Hotelling",
            "Carbonation"        => 2.1,
            "CarbonationTemp"    => 4.0,
            "Date"               => "3 Jan 04",
            "Efficiency"         => 72.0,
            "FermentationStages" => 2,
            "Fg"                 => 1.012,
            "ForcedCarbonation"  => false,
            "KegPrimingFactor"   => 0.5,
            "Name"               => "BenderBrau",
            "Notes"              => "Cold fusion steam beer",
            "Og"                 => 1.036,
            "PrimaryAge"         => 4,
            "PrimaryTemp"        => 20.000,
            "PrimingSugarEquiv"  => 1.4,
            "PrimingSugarName"   => "DME",
            "SecondaryAge"       => 7,
            "SecondaryTemp"      => 20.000,
            "TasteNotes"         => "Meh",
            "TasteRating"        => 35,
            "TertiaryAge"        => 14,
            "TertiaryTemp"       => 19.999,
            "Type"               => Recipe::TYPE_ALL_GRAIN,
            "Version"            => 2,
        );
        foreach ($accessors as $method => $value) {
            $getter = "get" . $method;
            $setter = "set" . $method;
            $this->recipe->{$setter}($value);
            $this->assertEquals($value, $this->recipe->{$getter}());
        }

    }
}
