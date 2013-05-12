<?php

namespace BeerXML\Record;

use BeerXML\Generator\IRecipeDisplay as RecipeGetter;
use BeerXML\Parser\IRecipeDisplay as RecipeSetter;

class Recipe implements RecipeGetter, RecipeSetter
{
    /**
     * Name of the recipe.
     *
     * @var string
     */
    private $name;

    /**
     * Version of the recipe record.  Should always be "1" for this version of the XML standard.
     *
     * @var int
     */
    private $version = 1;

    /**
     * May be one of "Extract", "Partial Mash" or "All Grain"
     *
     * @var string
     */
    private $type;

    /**
     * The style of the beer this recipe is associated with.  All of the required items for a valid style should be
     * between the <STYLE>…</STYLE> tags.
     *
     * @var Style
     */
    private $style;

    /**
     * An equipment record is optional.  If included the BATCH_SIZE and BOIL_SIZE in the equipment record must match
     * the values in this recipe record.
     *
     * @var Equipment
     */
    private $equipment;

    /**
     * Name of the brewer
     *
     * @var string
     */
    private $brewer;

    /**
     * Optional name of the assistant brewer
     *
     * @var string
     */
    private $asstBrewer;

    /**
     * Target size of the finished batch in liters.
     *
     * @var float
     */
    private $batchSize;

    /**
     * Starting size for the main boil of the wort in liters.
     *
     * @var float
     */
    private $boilSize;

    /**
     * The total time to boil the wort in minutes.
     *
     * @var number
     */
    private $boilTime;

    /**
     * The percent brewhouse efficiency to be used for estimating the starting gravity of the beer.   Not required for
     * "Extract" recipes, but is required for "Partial Mash" and "All Grain" recipes.
     *
     * @var float
     */
    private $efficiency;

    /**
     * Zero or more HOP ingredient records may appear between the <HOPS>…</HOPS> tags.
     *
     * @var array of Hop
     */
    private $hops = array();

    /**
     * Zero or more FERMENTABLE ingredients may appear between the <FERMENTABLES> … </FERMENTABLES> tags.
     *
     * @var array of Fermentable
     */
    private $fermentables = array();

    /**
     * Zero or more MISC records may appear between <MISCS> … </MISCS>
     *
     * @var array of Misc
     */
    private $miscs = array();

    /**
     * Zero or more YEAST records may appear between <YEASTS> … </YEASTS>
     *
     * @var array of Yeast
     */
    private $yeasts = array();

    /**
     * Zero or more WATER records may appear between <WATERS> … </WATERS>
     *
     * @var array of Water
     */
    private $waters = array();

    /**
     * A MASH profile record containing one or more MASH_STEPs.  NOTE: No Mash record is needed for "Extract" type
     * brews.
     *
     * @var MashProfile
     */
    private $mash;

    /**
     * Notes associated with this recipe – may be multiline.
     *
     * @var string
     */
    private $notes;

    /**
     * Tasting notes – may be multiline.
     *
     * @var string
     */
    private $tasteNotes;

    /**
     * Number between zero and 50.0 denoting the taste rating – corresponds to the 50 point BJCP rating system.
     *
     * @var float
     */
    private $tasteRating;

    /**
     * The measured original (pre-fermentation) specific gravity of the beer.
     *
     * @var float
     */
    private $og;

    /**
     * The measured final gravity of the finished beer.
     *
     * @var float
     */
    private $fg;

    /**
     * The number of fermentation stages used – typically a number between one and three
     *
     * @var int
     */
    private $fermentationStages;

    /**
     * Time spent in the primary in days
     *
     * @var number
     */
    private $primaryAge;

    /**
     * Temperature in degrees Celsius for the primary fermentation.
     *
     * @var number
     */
    private $primaryTemp;

    /**
     * Time spent in the secondary in days.
     *
     * @var number
     */
    private $secondaryAge;

    /**
     * Temperature in degrees Celsius for the secondary fermentation.
     *
     * @var number
     */
    private $secondaryTemp;

    /**
     * Time spent in the third fermenter in days.
     *
     * @var number
     */
    private $tertiaryAge;

    /**
     * Temperature in the tertiary fermenter.
     *
     * @var number
     */
    private $tertiaryTemp;

    /**
     * The time to age the beer in days after bottling.
     *
     * @var number
     */
    private $age;

    /**
     * Temperature for aging the beer after bottling.
     *
     * @var number
     */
    private $ageTemp;

    /**
     * Date brewed in a easily recognizable format such as "3 Dec 04".
     *
     * @var string
     */
    private $date;

    /**
     * Floating point value corresponding to the target volumes of CO2 used to carbonate this beer.
     *
     * @var float
     */
    private $carbonation;

    /**
     * TRUE if the batch was force carbonated using CO2 pressure, FALSE if the batch was carbonated using a priming
     * agent.  Default is FALSE
     *
     * @var bool
     */
    private $forcedCarbonation = false;

    /**
     * Text describing the priming agent such as "Honey" or "Corn Sugar" – used only if this is not a forced carbonation
     *
     * @var string
     */
    private $primingSugarName;

    /**
     * The temperature for either bottling or forced carbonation.
     *
     * @var number
     */
    private $carbonationTemp;

    /**
     * Factor used to convert this priming agent to an equivalent amount of corn sugar for a bottled scenario.  For
     * example, "Dry Malt Extract" would have a value of 1.4 because it requires 1.4 times as much DME as corn sugar to
     * carbonate.  To calculate the amount of DME needed, the program can calculate the amount of corn sugar needed and
     * then multiply by this factor.
     *
     * @var float
     */
    private $primingSugarEquiv;

    /**
     * Used to factor in the smaller amount of sugar needed for large containers.  For example, this might be 0.5 for a
     * typical 5 gallon keg since naturally priming a keg requires about 50% as much sugar as priming bottles.
     *
     * @var float
     */
    private $kegPrimingFactor;


    /** Fields from Appendix A Optional Extensions for BeerXML Display **/
    /**
     * @var string
     */
    private $estOg;

    /**
     * @var string
     */
    private $estFg;

    /**
     * @var string
     */
    private $estColor;

    /**
     * @var float
     */
    private $ibu;

    /**
     * @var string
     */
    private $ibuMethod;

    /**
     * @var float
     */
    private $estAbv;

    /**
     * @var float
     */
    private $abv;

    /**
     * @var float
     */
    private $actualEfficiency;

    /**
     * @var string
     */
    private $calories;

    /**
     * @var string
     */
    private $displayBatchSize;

    /**
     * @var string
     */
    private $displayBoilSize;

    /**
     * @var string
     */
    private $displayOg;

    /**
     * @var string
     */
    private $displayFg;

    /**
     * @var string
     */
    private $displayPrimaryTemp;

    /**
     * @var string
     */
    private $displaySecondaryTemp;

    /**
     * @var string
     */
    private $displayTertiaryTemp;

    /**
     * @var string
     */
    private $displayAgeTemp;

    /**
     * @var string
     */
    private $carbonationUsed;

    /**
     * @var string
     */
    private $displayCarbTemp;

    /**
     * @return number
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param number $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return number
     */
    public function getAgeTemp()
    {
        return $this->ageTemp;
    }

    /**
     * @param number $ageTemp
     */
    public function setAgeTemp($ageTemp)
    {
        $this->ageTemp = $ageTemp;
    }

    /**
     * @return string
     */
    public function getAsstBrewer()
    {
        return $this->asstBrewer;
    }

    /**
     * @param string $asstBrewer
     */
    public function setAsstBrewer($asstBrewer)
    {
        $this->asstBrewer = $asstBrewer;
    }

    /**
     * @return float
     */
    public function getBatchSize()
    {
        return $this->batchSize;
    }

    /**
     * @param float $batchSize
     */
    public function setBatchSize($batchSize)
    {
        $this->batchSize = $batchSize;
    }

    /**
     * @return float
     */
    public function getBoilSize()
    {
        return $this->boilSize;
    }

    /**
     * @param float $boilSize
     */
    public function setBoilSize($boilSize)
    {
        $this->boilSize = $boilSize;
    }

    /**
     * @return number
     */
    public function getBoilTime()
    {
        return $this->boilTime;
    }

    /**
     * @param number $boilTime
     */
    public function setBoilTime($boilTime)
    {
        $this->boilTime = $boilTime;
    }

    /**
     * @return string
     */
    public function getBrewer()
    {
        return $this->brewer;
    }

    /**
     * @param string $brewer
     */
    public function setBrewer($brewer)
    {
        $this->brewer = $brewer;
    }

    /**
     * @return float
     */
    public function getCarbonation()
    {
        return $this->carbonation;
    }

    /**
     * @param float $carbonation
     */
    public function setCarbonation($carbonation)
    {
        $this->carbonation = $carbonation;
    }

    /**
     * @return number
     */
    public function getCarbonationTemp()
    {
        return $this->carbonationTemp;
    }

    /**
     * @param number $carbonationTemp
     */
    public function setCarbonationTemp($carbonationTemp)
    {
        $this->carbonationTemp = $carbonationTemp;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return float
     */
    public function getEfficiency()
    {
        return $this->efficiency;
    }

    /**
     * @param float $efficiency
     */
    public function setEfficiency($efficiency)
    {
        $this->efficiency = $efficiency;
    }

    /**
     * @return Equipment
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * @param Equipment $equipment
     */
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;
    }

    /**
     * @return Fermentable[]
     */
    public function getFermentables()
    {
        return $this->fermentables;
    }

    /**
     * @param Fermentable $fermentable
     */
    public function addFermentable($fermentable)
    {
        $this->fermentables[] = $fermentable;
    }

    /**
     * @return int
     */
    public function getFermentationStages()
    {
        return $this->fermentationStages;
    }

    /**
     * @param int $fermentationStages
     */
    public function setFermentationStages($fermentationStages)
    {
        $this->fermentationStages = $fermentationStages;
    }

    /**
     * @return float
     */
    public function getFg()
    {
        return $this->fg;
    }

    /**
     * @param float $fg
     */
    public function setFg($fg)
    {
        $this->fg = $fg;
    }

    /**
     * @return boolean
     */
    public function getForcedCarbonation()
    {
        return $this->forcedCarbonation;
    }

    /**
     * @param boolean $forcedCarbonation
     */
    public function setForcedCarbonation($forcedCarbonation)
    {
        $this->forcedCarbonation = $forcedCarbonation;
    }

    /**
     * @return Hop[]
     */
    public function getHops()
    {
        return $this->hops;
    }

    /**
     * @param Hop $hop
     */
    public function addHop($hop)
    {
        $this->hops[] = $hop;
    }

    /**
     * @return float
     */
    public function getKegPrimingFactor()
    {
        return $this->kegPrimingFactor;
    }

    /**
     * @param float $kegPrimingFactor
     */
    public function setKegPrimingFactor($kegPrimingFactor)
    {
        $this->kegPrimingFactor = $kegPrimingFactor;
    }

    /**
     * @return MashProfile
     */
    public function getMash()
    {
        return $this->mash;
    }

    /**
     * @param MashProfile $mash
     */
    public function setMash($mash)
    {
        $this->mash = $mash;
    }

    /**
     * @return array
     */
    public function getMiscs()
    {
        return $this->miscs;
    }

    /**
     * @param Misc
     */
    public function addMisc($misc)
    {
        $this->miscs[] = $misc;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return float
     */
    public function getOg()
    {
        return $this->og;
    }

    /**
     * @param float $og
     */
    public function setOg($og)
    {
        $this->og = $og;
    }

    /**
     * @return number
     */
    public function getPrimaryAge()
    {
        return $this->primaryAge;
    }

    /**
     * @param number $primaryAge
     */
    public function setPrimaryAge($primaryAge)
    {
        $this->primaryAge = $primaryAge;
    }

    /**
     * @return number
     */
    public function getPrimaryTemp()
    {
        return $this->primaryTemp;
    }

    /**
     * @param number $primaryTemp
     */
    public function setPrimaryTemp($primaryTemp)
    {
        $this->primaryTemp = $primaryTemp;
    }

    /**
     * @return float
     */
    public function getPrimingSugarEquiv()
    {
        return $this->primingSugarEquiv;
    }

    /**
     * @param float $primingSugarEquiv
     */
    public function setPrimingSugarEquiv($primingSugarEquiv)
    {
        $this->primingSugarEquiv = $primingSugarEquiv;
    }

    /**
     * @return string
     */
    public function getPrimingSugarName()
    {
        return $this->primingSugarName;
    }

    /**
     * @param string $primingSugarName
     */
    public function setPrimingSugarName($primingSugarName)
    {
        $this->primingSugarName = $primingSugarName;
    }

    /**
     * @return number
     */
    public function getSecondaryAge()
    {
        return $this->secondaryAge;
    }

    /**
     * @param number $secondaryAge
     */
    public function setSecondaryAge($secondaryAge)
    {
        $this->secondaryAge = $secondaryAge;
    }

    /**
     * @return number
     */
    public function getSecondaryTemp()
    {
        return $this->secondaryTemp;
    }

    /**
     * @param number $secondaryTemp
     */
    public function setSecondaryTemp($secondaryTemp)
    {
        $this->secondaryTemp = $secondaryTemp;
    }

    /**
     * @return Style
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * @param Style $style
     */
    public function setStyle($style)
    {
        $this->style = $style;
    }

    /**
     * @return string
     */
    public function getTasteNotes()
    {
        return $this->tasteNotes;
    }

    /**
     * @param string $tasteNotes
     */
    public function setTasteNotes($tasteNotes)
    {
        $this->tasteNotes = $tasteNotes;
    }

    /**
     * @return float
     */
    public function getTasteRating()
    {
        return $this->tasteRating;
    }

    /**
     * @param float $tasteRating
     */
    public function setTasteRating($tasteRating)
    {
        $this->tasteRating = $tasteRating;
    }

    /**
     * @return number
     */
    public function getTertiaryAge()
    {
        return $this->tertiaryAge;
    }

    /**
     * @param number $tertiaryAge
     */
    public function setTertiaryAge($tertiaryAge)
    {
        $this->tertiaryAge = $tertiaryAge;
    }

    /**
     * @return number
     */
    public function getTertiaryTemp()
    {
        return $this->tertiaryTemp;
    }

    /**
     * @param number $tertiaryTemp
     */
    public function setTertiaryTemp($tertiaryTemp)
    {
        $this->tertiaryTemp = $tertiaryTemp;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return array
     */
    public function getWaters()
    {
        return $this->waters;
    }

    /**
     * @param Water
     */
    public function addWater($water)
    {
        $this->waters[] = $water;
    }

    /**
     * @return array
     */
    public function getYeasts()
    {
        return $this->yeasts;
    }

    /**
     * @param Yeast
     */
    public function addYeast($yeast)
    {
        $this->yeasts[] = $yeast;
    }

    /**
     * Actual alcohol by volume calculated from the OG and FG measured.
     *
     * @param float $abv Percent
     */
    public function setAbv($abv)
    {
        $this->abv = $abv;
    }

    /**
     * Actual alcohol by volume calculated from the OG and FG measured.
     *
     * @return float Percent
     */
    public function getAbv()
    {
        return $this->abv;
    }

    /**
     * The actual efficiency as calculated using the measured original and final gravity.
     *
     * @param float $actualEfficiency Percent
     */
    public function setActualEfficiency($actualEfficiency)
    {
        $this->actualEfficiency = $actualEfficiency;
    }

    /**
     * The actual efficiency as calculated using the measured original and final gravity.
     *
     * @return float Percent
     */
    public function getActualEfficiency()
    {
        return $this->actualEfficiency;
    }

    /**
     * Calorie estimate based on the measured starting and ending gravity.
     *
     * Note that calories should be quoted in "Cal" or kilocalories which is the normal dietary measure (i.e. a beer is
     * usually in the range of 100-250 calories per 12 oz).  Examples "180 Cal/pint",
     *
     * @param string $calories
     */
    public function setCalories($calories)
    {
        $this->calories = $calories;
    }

    /**
     * Calorie estimate based on the measured starting and ending gravity.
     *
     * Note that calories should be quoted in "Cal" or kilocalories which is the normal dietary measure (i.e. a beer is
     * usually in the range of 100-250 calories per 12 oz).  Examples "180 Cal/pint",
     *
     * @return string
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * Temperature to use when aging the beer in user units such as "55 F"
     *
     * @param string $displayAgeTemp
     */
    public function setDisplayAgeTemp($displayAgeTemp)
    {
        $this->displayAgeTemp = $displayAgeTemp;
    }

    /**
     * Temperature to use when aging the beer in user units such as "55 F"
     *
     * @return string
     */
    public function getDisplayAgeTemp()
    {
        return $this->displayAgeTemp;
    }

    /**
     * Batch size in user defined units along with the units as in "5.0 gal"
     *
     * @param string $displayBatchSize
     */
    public function setDisplayBatchSize($displayBatchSize)
    {
        $this->displayBatchSize = $displayBatchSize;
    }

    /**
     * Batch size in user defined units along with the units as in "5.0 gal"
     *
     * @return string
     */
    public function getDisplayBatchSize()
    {
        return $this->displayBatchSize;
    }

    /**
     * Boil size with user defined units as in "6.3 gal"
     *
     * @param string $displayBoilSize
     */
    public function setDisplayBoilSize($displayBoilSize)
    {
        $this->displayBoilSize = $displayBoilSize;
    }

    /**
     * Boil size with user defined units as in "6.3 gal"
     *
     * @return string
     */
    public function getDisplayBoilSize()
    {
        return $this->displayBoilSize;
    }

    /**
     * Carbonation/Bottling temperature in appropriate units such as "40F" or "32 C"
     *
     * @param string $displayCarbTemp
     */
    public function setDisplayCarbTemp($displayCarbTemp)
    {
        $this->displayCarbTemp = $displayCarbTemp;
    }

    /**
     * Carbonation/Bottling temperature in appropriate units such as "40F" or "32 C"
     *
     * @return string
     */
    public function getDisplayCarbTemp()
    {
        return $this->displayCarbTemp;
    }

    /**
     * Text description of the carbonation used such as "50g corn sugar" or "Kegged at 20psi"
     *
     * @param string $carbonationUsed
     */
    public function setCarbonationUsed($carbonationUsed)
    {
        $this->carbonationUsed = $carbonationUsed;
    }

    /**
     * Text description of the carbonation used such as "50g corn sugar" or "Kegged at 20psi"
     *
     * @return string
     */
    public function getCarbonationUsed()
    {
        return $this->carbonationUsed;
    }

    /**
     * Measured final gravity in user defined units as in "1.035 sg"
     *
     * @param string $displayFg
     */
    public function setDisplayFg($displayFg)
    {
        $this->displayFg = $displayFg;
    }

    /**
     * Measured final gravity in user defined units as in "1.035 sg"
     *
     * @return string
     */
    public function getDisplayFg()
    {
        return $this->displayFg;
    }

    /**
     * Measured original gravity in user defined units as in "6.4 plato"
     *
     * @param string $displayOg
     */
    public function setDisplayOg($displayOg)
    {
        $this->displayOg = $displayOg;
    }

    /**
     * Measured original gravity in user defined units as in "6.4 plato"
     *
     * @return string
     */
    public function getDisplayOg()
    {
        return $this->displayOg;
    }

    /**
     * Primary fermentation temperature in user defined units such as "64 F"
     *
     * @param string $displayPrimaryTemp
     */
    public function setDisplayPrimaryTemp($displayPrimaryTemp)
    {
        $this->displayPrimaryTemp = $displayPrimaryTemp;
    }

    /**
     * Primary fermentation temperature in user defined units such as "64 F"
     *
     * @return string
     */
    public function getDisplayPrimaryTemp()
    {
        return $this->displayPrimaryTemp;
    }

    /**
     * Secondary fermentation temperature in user defined units such as "56 F"
     *
     * @param string $displaySecondaryTemp
     */
    public function setDisplaySecondaryTemp($displaySecondaryTemp)
    {
        $this->displaySecondaryTemp = $displaySecondaryTemp;
    }

    /**
     * Secondary fermentation temperature in user defined units such as "56 F"
     *
     * @return string
     */
    public function getDisplaySecondaryTemp()
    {
        return $this->displaySecondaryTemp;
    }

    /**
     * Tertiary temperature in user defined units such as "20 C"
     *
     * @param string $displayTertiaryTemp
     */
    public function setDisplayTertiaryTemp($displayTertiaryTemp)
    {
        $this->displayTertiaryTemp = $displayTertiaryTemp;
    }

    /**
     * Tertiary temperature in user defined units such as "20 C"
     *
     * @return string
     */
    public function getDisplayTertiaryTemp()
    {
        return $this->displayTertiaryTemp;
    }

    /**
     * Estimated percent alcohol by volume for this recipe.
     *
     * @param float $estAbv Percent
     */
    public function setEstAbv($estAbv)
    {
        $this->estAbv = $estAbv;
    }

    /**
     * Estimated percent alcohol by volume for this recipe.
     *
     * @return float Percent
     */
    public function getEstAbv()
    {
        return $this->estAbv;
    }

    /**
     * The estimated color of the beer in user defined color units.
     *
     * @param string $estColor
     */
    public function setEstColor($estColor)
    {
        $this->estColor = $estColor;
    }

    /**
     * The estimated color of the beer in user defined color units.
     *
     * @return string
     */
    public function getEstColor()
    {
        return $this->estColor;
    }

    /**
     * Calculated estimate for the final specific gravity of this recipe along with the units as in "1.015 sg"
     *
     * @param string $estFg
     */
    public function setEstFg($estFg)
    {
        $this->estFg = $estFg;
    }

    /**
     * Calculated estimate for the final specific gravity of this recipe along with the units as in "1.015 sg"
     *
     * @return string
     */
    public function getEstFg()
    {
        return $this->estFg;
    }

    /**
     * Calculated estimate of the original gravity for this recipe along with the units.
     *
     * @param string $estOg
     */
    public function setEstOg($estOg)
    {
        $this->estOg = $estOg;
    }

    /**
     * Calculated estimate of the original gravity for this recipe along with the units.
     *
     * @return string
     */
    public function getEstOg()
    {
        return $this->estOg;
    }

    /**
     * The estimated bitterness level of the beer in IBUs
     *
     * @param float $ibu
     */
    public function setIbu($ibu)
    {
        $this->ibu = $ibu;
    }

    /**
     * The estimated bitterness level of the beer in IBUs
     *
     * @return float
     */
    public function getIbu()
    {
        return $this->ibu;
    }

    /**
     * May be "Rager", "Tinseth" or "Garetz" corresponding to the method/equation used to estimate IBUs for this recipe.
     *
     * @param string $ibuMethod
     */
    public function setIbuMethod($ibuMethod)
    {
        $this->ibuMethod = $ibuMethod;
    }

    /**
     * May be "Rager", "Tinseth" or "Garetz" corresponding to the method/equation used to estimate IBUs for this recipe.
     *
     * @return string
     */
    public function getIbuMethod()
    {
        return $this->ibuMethod;
    }

}
