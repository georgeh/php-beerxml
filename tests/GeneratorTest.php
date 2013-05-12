<?php


namespace BeerXML\Test;

use BeerXML\Generator;
use BeerXML\Record\Fermentable;
use BeerXML\Record\Hop;
use BeerXML\Record\MashProfile;
use BeerXML\Record\MashStep;
use BeerXML\Record\Misc;
use BeerXML\Record\Recipe;
use BeerXML\Record\Style;
use BeerXML\Record\Water;
use BeerXML\Record\Yeast;

class GeneratorTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Generator
     */
    private $generator;

    /**
     * @expectedException \BeerXML\Exception\InvalidRecord
     */
    public function testThrowsExceptionForInvalidRecords()
    {
        $this->generator->addRecord('asdf');
        $this->generator->render();
    }

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



    /**
     * @dataProvider dryStout
     * @param Recipe $recipe
     */
    public function testCanCreateRecipeToMatchExample(Recipe $recipe)
    {
        $this->generator->addRecord($recipe);
        $xml = $this->generator->render();
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/fixtures/generated-recipe.xml', $xml);
    }

    /**
     * @dataProvider dryStout
     * @param Recipe $recipe
     */
    public function testCanCreateRecipeWithOptionalFields(Recipe $recipe)
    {
        $recipe->setEstOg('1.056');
        $recipe->setEstFg('1.010');
        $recipe->setIbu(30);
        $recipe->setIbuMethod('Tinseth');
        $this->generator->addRecord($recipe);
        $xml = $this->generator->render();
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/fixtures/generated-recipe-with-display.xml', $xml);
    }

    /**
     * Creates a record that matches fixtures/recipe-record.xml
     * @return Recipe
     */
    public function dryStout()
    {
        $recipe = new Recipe();
        $recipe->setName('Dry Stout');
        $recipe->setType(Recipe::TYPE_ALL_GRAIN);
        $recipe->setBrewer('Brad Smith');
        $recipe->setBatchSize(18.93);
        $recipe->setBoilSize(20.82);
        $recipe->setBoilTime(60);
        $recipe->setEfficiency(72.0);
        $recipe->setTasteNotes("Nice dry Irish stout with a warm body but low starting gravity much like the famous drafts.");
        $recipe->setTasteRating(41);
        $recipe->setDate('3 Jan 04');
        $recipe->setOg(1.036);
        $recipe->setFg(1.012);
        $recipe->setCarbonation(2.1);
        $recipe->setForcedCarbonation(true);
        $recipe->setAge(24.0);
        $recipe->setAgeTemp(17.0);
        $recipe->setFermentationStages(2);

        $style = new Style();
        $style->setName('Dry Stout');
        $style->setCategory(16);
        $style->setStyleLetter('A');
        $style->setStyleGuide('BJCP');
        $style->setType(Style::TYPE_ALE);
        $style->setOgMin(1.035);
        $style->setOgMax(1.050);
        $style->setFgMin(1.007);
        $style->setFgMax(1.011);
        $style->setIbuMin(30.0);
        $style->setIbuMax(50.0);
        $style->setColorMin(35.0);
        $style->setColorMax(200.0);
        $style->setAbvMin(3.2);
        $style->setAbvMax(5.5);
        $style->setCarbMin(1.6);
        $style->setCarbMax(2.1);
        $style->setNotes('Famous Irish Stout. Dry, roasted, almost coffee like flavor. Often soured with pasteurized sour beer. Full body perception due to flaked barley, though starting gravity may be low. Dry roasted flavor.');
        $recipe->setStyle($style);

        $hop = new Hop();
        $hop->setName('Goldings, East Kent');
        $hop->setAlpha(5.0);
        $hop->setAmount(0.0638);
        $hop->setUse(Hop::USE_BOIL);
        $hop->setTime(60.0);
        $hop->setNotes('Great all purpose UK hop for ales, stouts, porters');
        $recipe->addHop($hop);

        $twoRow = new Fermentable();
        $twoRow->setName('Pale Malt (2 row) UK');
        $twoRow->setAmount(2.27);
        $twoRow->setType(Fermentable::TYPE_GRAIN);
        $twoRow->setYield(78.0);
        $twoRow->setColor(3.0);
        $twoRow->setOrigin('United Kingdom');
        $twoRow->setSupplier('Fussybrewer Malting');
        $twoRow->setNotes('All purpose base malt for English styles');
        $twoRow->setCoarseFineDiff(1.5);
        $twoRow->setMoisture(4.0);
        $twoRow->setDiastaticPower(45.0);
        $twoRow->setProtein(10.2);
        $twoRow->setMaxInBatch(100.0);
        $recipe->addFermentable($twoRow);

        $flakedBarley = new Fermentable();        
        $flakedBarley->setName('Barley, Flaked');
        $flakedBarley->setAmount(0.91);
        $flakedBarley->setType(Fermentable::TYPE_GRAIN);
        $flakedBarley->setYield(70.0);
        $flakedBarley->setColor(2.0);
        $flakedBarley->setOrigin('United Kingdom');
        $flakedBarley->setSupplier('Fussybrewer Malting');
        $flakedBarley->setNotes('Adds body to porters and stouts, must be mashed');
        $flakedBarley->setCoarseFineDiff(1.5);
        $flakedBarley->setMoisture(9.0);
        $flakedBarley->setDiastaticPower(0.0);
        $flakedBarley->setProtein(13.2);
        $flakedBarley->setMaxInBatch(20.0);
        $flakedBarley->setRecommendMash(true);
        $recipe->addFermentable($flakedBarley);
        
        $blackBarley = new Fermentable();
        $blackBarley->setName('Pale Malt (2 row) UK');
        $blackBarley->setAmount(0.45);
        $blackBarley->setType(Fermentable::TYPE_GRAIN);
        $blackBarley->setYield(78.0);
        $blackBarley->setColor(500.0);
        $blackBarley->setOrigin('United Kingdom');
        $blackBarley->setSupplier('Fussybrewer Malting');
        $blackBarley->setNotes('Unmalted roasted barley for stouts, porters');
        $blackBarley->setCoarseFineDiff(1.5);
        $blackBarley->setMoisture(5.0);
        $blackBarley->setDiastaticPower(0.0);
        $blackBarley->setProtein(13.2);
        $blackBarley->setMaxInBatch(10.0);
        $recipe->addFermentable($blackBarley);

        $misc = new Misc();
        $misc->setName('Irish Moss');
        $misc->setType(Misc::TYPE_FINING);
        $misc->setUse(Misc::USE_BOIL);
        $misc->setTime(15.0);
        $misc->setAmount(0.010);
        $misc->setNotes('Used as a clarifying agent during the last few minutes of the boil');
        $recipe->addMisc($misc);

        $water = new Water();
        $water->setName('Burton on Trent, UK');
        $water->setAmount(20.0);
        $water->setCalcium(295.0);
        $water->setMagnesium(45.0);
        $water->setSodium(55.0);
        $water->setSulfate(725.0);
        $water->setChloride(25.0);
        $water->setBicarbonate(300.0);
        $water->setPH(8.0);
        $water->setNotes('Use for distinctive pale ales strongly hopped. Very hard water accentuates the hops flavor. Example: Bass Ale');
        $recipe->addWater($water);

        $yeast = new Yeast();
        $yeast->setName('Irish Ale');
        $yeast->setType(Yeast::TYPE_ALE);
        $yeast->setForm(Yeast::FORM_LIQUID);
        $yeast->setAmount(0.250);
        $yeast->setLaboratory('Wyeast Labs');
        $yeast->setProductId('1084');
        $yeast->setMinTemperature(16.7);
        $yeast->setMaxTemperature(22.2);
        $yeast->setAttenuation(73.0);
        $yeast->setNotes('Dry, fruity flavor characteristic of stouts. Full bodied, dry, clean flavor.');
        $yeast->setBestFor('Irish Dry Stouts');
        $yeast->setFlocculation(Yeast::FLOCCULATION_MEDIUM);
        $recipe->addYeast($yeast);

        $mash = new MashProfile();
        $mash->setName('Single Step Infusion, 68 C');
        $mash->setGrainTemp(22.0);

        $mashStep = new MashStep();
        $mashStep->setName('Conversion Step, 68C');
        $mashStep->setType(MashStep::TYPE_INFUSION);
        $mashStep->setStepTemp(68.0);
        $mashStep->setStepTime(60.0);
        $mashStep->setInfuseAmount(10.0);
        $mash->addMashStep($mashStep);
        $recipe->setMash($mash);

        return array(array($recipe));
    }

}
