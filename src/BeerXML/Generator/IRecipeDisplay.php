<?php


namespace BeerXML\Generator;

/**
 * Interface for classes that want to implement the optional display properties from the appendix of the specification
 *
 * @package BeerXML\Generator
 */
interface IRecipeDisplay extends IRecipe
{

    /**
     * Actual alcohol by volume calculated from the OG and FG measured.
     *
     * @return float Percent
     */
    public function getAbv();

    /**
     * The actual efficiency as calculated using the measured original and final gravity.
     *
     * @return float Percent
     */
    public function getActualEfficiency();

    /**
     * Calorie estimate based on the measured starting and ending gravity.
     *
     * Note that calories should be quoted in "Cal" or kilocalories which is the normal dietary measure (i.e. a beer is
     * usually in the range of 100-250 calories per 12 oz).  Examples "180 Cal/pint",
     *
     * @return string
     */
    public function getCalories();

    /**
     * Temperature to use when aging the beer in user units such as "55 F"
     *
     * @return string
     */
    public function getDisplayAgeTemp();

    /**
     * Batch size in user defined units along with the units as in "5.0 gal"
     *
     * @return string
     */
    public function getDisplayBatchSize();

    /**
     * Boil size with user defined units as in "6.3 gal"
     *
     * @return string
     */
    public function getDisplayBoilSize();

    /**
     * Carbonation/Bottling temperature in appropriate units such as "40F" or "32 C"
     *
     * @return string
     */
    public function getDisplayCarbTemp();

    /**
     * Text description of the carbonation used such as "50g corn sugar" or "Kegged at 20psi"
     *
     * @return string
     */
    public function getDisplayCarbonationUsed();

    /**
     * Measured final gravity in user defined units as in "1.035 sg"
     *
     * @return string
     */
    public function getDisplayFg();

    /**
     * Measured original gravity in user defined units as in "6.4 plato"
     *
     * @return string
     */
    public function getDisplayOg();

    /**
     * Primary fermentation temperature in user defined units such as "64 F"
     *
     * @return string
     */
    public function getDisplayPrimaryTemp();

    /**
     * Secondary fermentation temperature in user defined units such as "56 F"
     *
     * @return string
     */
    public function getDisplaySecondaryTemp();

    /**
     * Tertiary temperature in user defined units such as "20 C"
     *
     * @return string
     */
    public function getDisplayTertiaryTemp();

    /**
     * Estimated percent alcohol by volume for this recipe.
     *
     * @return float Percent
     */
    public function getEstAbv();

    /**
     * The estimated color of the beer in user defined color units.
     *
     * @return string
     */
    public function getEstColor();

    /**
     * Calculated estimate for the final specific gravity of this recipe along with the units as in "1.015 sg"
     *
     * @return string
     */
    public function getEstFg();

    /**
     * Calculated estimate of the original gravity for this recipe along with the units.
     *
     * @return string
     */
    public function getEstOg();

    /**
     * The estimated bitterness level of the beer in IBUs
     *
     * @return float
     */
    public function getIbu();

    /**
     * May be "Rager", "Tinseth" or "Garetz" corresponding to the method/equation used to estimate IBUs for this recipe.
     *
     * @return string
     */
    public function getIbuMethod();
}