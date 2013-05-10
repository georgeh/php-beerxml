<?php


namespace BeerXML\Generator;


interface IFermentableReader {

    /**
     * May be TRUE if this item is normally added after the boil.  The default value is FALSE since most grains are
     * added during the mash or boil.
     *
     * @return boolean
     */
    public function getAddAfterBoil();

    /**
     * Weight of the fermentable, extract or sugar in Kilograms.
     *
     * @return number
     */
    public function getAmount();

    /**
     * Percent difference between the coarse grain yield and fine grain yield.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @return number
     */
    public function getCoarseFineDiff();

    /**
     * The color of the item in Lovibond Units (SRM for liquid extracts).
     *
     * @return float
     */
    public function getColor();

    /**
     * The diastatic power of the grain as measured in "Lintner" units.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @return float
     */
    public function getDiastaticPower();

    /**
     * For hopped extracts only - an estimate of the number of IBUs per pound of extract in a gallon of water.
     * To convert to IBUs we multiply this number by the "AMOUNT" field (in pounds) and divide by the number of gallons
     * in the batch.  Based on a sixty minute boil.
     * Only suitable for use with an "Extract" type, otherwise this value is ignored.
     *
     * @return float
     */
    public function getIbuGalPerLb();

    /**
     * The recommended maximum percentage (by weight) this ingredient should represent in a batch of beer.
     *
     * @return number
     */
    public function getMaxInBatch();

    /**
     * Percent moisture in the grain.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @return number
     */
    public function getMoisture();

    /**
     * Name of the fermentable.
     *
     * @return string
     */
    public function getName();

    /**
     * Textual noted describing this ingredient and its use.  May be multiline.
     *
     * @return string
     */
    public function getNotes();

    /**
     * Country or place of origin
     *
     * @return string
     */
    public function getOrigin();

    /**
     * The percent protein in the grain.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @return number
     */
    public function getProtein();

    /**
     * TRUE if it is recommended the grain be mashed, FALSE if it can be steeped.
     * A value of TRUE is only appropriate for a "Grain" or "Adjunct" types.  The default value is FALSE.
     * Note that this does NOT indicate whether the grain is mashed or not – it is only a recommendation used in recipe
     * formulation.
     *
     * @return boolean
     */
    public function getRecommendMash();

    /**
     * Supplier of the grain/extract/sugar
     *
     * @return string
     */
    public function getSupplier();

    /**
     * May be "Grain", "Sugar", "Extract", "Dry Extract" or "Adjunct".  Extract refers to liquid extract.
     *
     * @return string
     */
    public function getType();

    /**
     * Should be set to 1 for this version of the XML standard.
     * May be a higher number for later versions but all later versions shall be backward compatible.
     *
     * @return int
     */
    public function getVersion();

    /**
     * Percent dry yield (fine grain) for the grain, or the raw yield by weight if this is an extract adjunct or sugar.
     *
     * @return number
     */
    public function getYield();
}