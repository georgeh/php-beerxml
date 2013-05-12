<?php


namespace BeerXML\Parser;


interface IRecipeDisplay extends IRecipe
{

    /**
     * Actual alcohol by volume calculated from the OG and FG measured.
     *
     * @param float $abv Percent
     */
    public function setAbv($abv);

    /**
     * The actual efficiency as calculated using the measured original and final gravity.
     *
     * @param float $actualEfficiency Percent
     */
    public function setActualEfficiency($actualEfficiency);

    /**
     * Calorie estimate based on the measured starting and ending gravity.
     *
     * Note that calories should be quoted in "Cal" or kilocalories which is the normal dietary measure (i.e. a beer is
     * usually in the range of 100-250 calories per 12 oz).  Examples "180 Cal/pint",
     *
     * @param string $calories
     */
    public function setCalories($calories);

    /**
     * Temperature to use when aging the beer in user units such as "55 F"
     *
     * @param string $displayAgeTemp
     */
    public function setDisplayAgeTemp($displayAgeTemp);

    /**
     * Batch size in user defined units along with the units as in "5.0 gal"
     *
     * @param string $displayBatchSize
     */
    public function setDisplayBatchSize($displayBatchSize);

    /**
     * Boil size with user defined units as in "6.3 gal"
     *
     * @param string $displayBoilSize
     */
    public function setDisplayBoilSize($displayBoilSize);

    /**
     * Carbonation/Bottling temperature in appropriate units such as "40F" or "32 C"
     *
     * @param string $displayCarbTemp
     */
    public function setDisplayCarbTemp($displayCarbTemp);

    /**
     * Text description of the carbonation used such as "50g corn sugar" or "Kegged at 20psi"
     *
     * @param string $carbonationUsed
     */
    public function setCarbonationUsed($carbonationUsed);

    /**
     * Measured final gravity in user defined units as in "1.035 sg"
     *
     * @param string $displayFg
     */
    public function setDisplayFg($displayFg);

    /**
     * Measured original gravity in user defined units as in "6.4 plato"
     *
     * @param string $displayOg
     */
    public function setDisplayOg($displayOg);

    /**
     * Primary fermentation temperature in user defined units such as "64 F"
     *
     * @param string $displayPrimaryTemp
     */
    public function setDisplayPrimaryTemp($displayPrimaryTemp);

    /**
     * Secondary fermentation temperature in user defined units such as "56 F"
     *
     * @param string $displaySecondaryTemp
     */
    public function setDisplaySecondaryTemp($displaySecondaryTemp);

    /**
     * Tertiary temperature in user defined units such as "20 C"
     *
     * @param string $displayTertiaryTemp
     */
    public function setDisplayTertiaryTemp($displayTertiaryTemp);

    /**
     * Estimated percent alcohol by volume for this recipe.
     *
     * @param float $estAbv Percent
     */
    public function setEstAbv($estAbv);

    /**
     * The estimated color of the beer in user defined color units.
     *
     * @param string $estColor
     */
    public function setEstColor($estColor);

    /**
     * Calculated estimate for the final specific gravity of this recipe along with the units as in "1.015 sg"
     *
     * @param string $estFg
     */
    public function setEstFg($estFg);

    /**
     * Calculated estimate of the original gravity for this recipe along with the units.
     *
     * @param string $estOg
     */
    public function setEstOg($estOg);

    /**
     * The estimated bitterness level of the beer in IBUs
     *
     * @param float $ibu
     */
    public function setIbu($ibu);

    /**
     * May be "Rager", "Tinseth" or "Garetz" corresponding to the method/equation used to estimate IBUs for this recipe.
     *
     * @param string $ibuMethod
     */
    public function setIbuMethod($ibuMethod);
}