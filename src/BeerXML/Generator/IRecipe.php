<?php


namespace BeerXML\Generator;

/**
 * Interface for classes that want to implement getters for Recipe Records.
 *
 * These can be used with the Generator to parse into an object implementing this interface
 *
 * @package BeerXML\Generator
 */
interface IRecipe
{
    /**
     * The time to age the beer in days after bottling.
     *
     * @return number Time (days)
     */
    public function getAge();

    /**
     * Temperature for aging the beer after bottling.
     *
     * @return number Temperature C
     */
    public function getAgeTemp();

    /**
     * Optional name of the assistant brewer
     *
     * @return string
     */
    public function getAsstBrewer();

    /**
     * Target size of the finished batch in liters.
     *
     * @return float Volume (liters)
     */
    public function getBatchSize();

    /**
     * Starting size for the main boil of the wort in liters.
     *
     * @return float Volume (liters)
     */
    public function getBoilSize();

    /**
     * The total time to boil the wort in minutes.
     *
     * @return number Time in minutes
     */
    public function getBoilTime();

    /**
     * Name of the brewer
     *
     * @return string
     */
    public function getBrewer();

    /**
     * Floating point value corresponding to the target volumes of CO2 used to carbonate this beer.
     *
     * @return float Volumes of CO2
     */
    public function getCarbonation();

    /**
     * The temperature for either bottling or forced carbonation.
     *
     * @return number Temperature (degrees C)
     */
    public function getCarbonationTemp();

    /**
     * Date brewed in a easily recognizable format such as "3 Dec 04".
     *
     * @return string
     */
    public function getDate();

    /**
     * The percent brewhouse efficiency to be used for estimating the starting gravity of the beer.
     *
     * Not required for "Extract" recipes, but is required for "Partial Mash" and "All Grain" recipes.
     *
     * @return float (e.g. 72.3)
     */
    public function getEfficiency();

    /**
     * An equipment record is optional.
     *
     * If included the BATCH_SIZE and BOIL_SIZE in the equipment record must match the values in this recipe record.
     *
     * @return IEquipment
     */
    public function getEquipment();

    /**
     * Zero or more FERMENTABLE ingredients may appear between the <FERMENTABLES> … </FERMENTABLES> tags.
     *
     * @return IFermentable[]
     */
    public function getFermentables();

    /**
     * The number of fermentation stages used – typically a number between one and three
     *
     * @return int
     */
    public function getFermentationStages();

    /**
     * The measured final gravity of the finished beer.
     *
     * @return float Specific Gravity
     */
    public function getFg();

    /**
     * TRUE if the batch was force carbonated using CO2 pressure, FALSE if the batch was carbonated using a priming
     * agent.
     *
     * Default is FALSE
     *
     * @return boolean
     */
    public function getForcedCarbonation();

    /**
     * Zero or more HOP ingredient records may appear between the <HOPS>…</HOPS> tags.
     *
     * @return IHop[]
     */
    public function getHops();

    /**
     * Used to factor in the smaller amount of sugar needed for large containers.
     *
     * For example, this might be 0.5 for a typical 5 gallon keg since naturally priming a keg requires about 50% as
     * much sugar as priming bottles.
     *
     * @return float
     */
    public function getKegPrimingFactor();

    /**
     * A MASH profile record containing one or more MASH_STEPs.
     *
     * NOTE: No Mash record is needed for "Extract" type brews.
     *
     * @return IMashProfile
     */
    public function getMash();

    /**
     * Zero or more MISC records may appear between <MISCS> … </MISCS>
     *
     * @return IMisc[]
     */
    public function getMiscs();

    /**
     * Name of the recipe.
     *
     * @return string
     */
    public function getName();

    /**
     * Notes associated with this recipe – may be multiline.
     *
     * @return string
     */
    public function getNotes();

    /**
     * The measured original (pre-fermentation) specific gravity of the beer.
     *
     * @return float Specific Gravity
     */
    public function getOg();

    /**
     * Time spent in the primary in days
     *
     * @return number Time (days)
     */
    public function getPrimaryAge();

    /**
     * Temperature in degrees Celsius for the primary fermentation.
     *
     * @return number Temperature C
     */
    public function getPrimaryTemp();

    /**
     * Factor used to convert this priming agent to an equivalent amount of corn sugar for a bottled scenario.
     *
     * For example, "Dry Malt Extract" would have a value of 1.4 because it requires 1.4 times as much DME as corn sugar
     * to carbonate.  To calculate the amount of DME needed, the program can calculate the amount of corn sugar needed
     * and then multiply by this factor.
     *
     * @return float
     */
    public function getPrimingSugarEquiv();

    /**
     * Text describing the priming agent such as "Honey" or "Corn Sugar" – used only if this is not a forced carbonation
     *
     * @return string
     */
    public function getPrimingSugarName();

    /**
     * Time spent in the secondary in days
     *
     * @return number Time (days)
     */
    public function getSecondaryAge();

    /**
     * Temperature in degrees Celsius for the secondary fermentation.
     *
     * @return number Temperature (C )
     */
    public function getSecondaryTemp();

    /**
     * The style of the beer this recipe is associated with.  All of the required items for a valid style should be
     * between the <STYLE>…</STYLE> tags.
     *
     * @return \BeerXML\Record\Style
     */
    public function getStyle();

    /**
     * Tasting notes – may be multiline.
     *
     * @return string
     */
    public function getTasteNotes();

    /**
     * Number between zero and 50.0 denoting the taste rating – corresponds to the 50 point BJCP rating system.
     *
     * @return float
     */
    public function getTasteRating();

    /**
     * Time spent in the third fermenter in days.
     *
     * @return number Time (days)
     */
    public function getTertiaryAge();

    /**
     * Temperature in the tertiary fermenter.
     *
     * @return number Temperature C
     */
    public function getTertiaryTemp();

    /**
     * May be one of "Extract", "Partial Mash" or "All Grain"
     *
     * @return string
     */
    public function getType();

    /**
     * Version of the recipe record.  Should always be "1" for this version of the XML standard.
     *
     * @return int
     */
    public function getVersion();

    /**
     * Zero or more WATER records may appear between <WATERS> … </WATERS>
     *
     * @return IWater[]
     */
    public function getWaters();

    /**
     * Zero or more YEAST records may appear between <YEASTS> … </YEASTS>
     *
     * @return IYeast[]
     */
    public function getYeasts();
}