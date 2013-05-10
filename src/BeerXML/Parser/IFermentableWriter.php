<?php


namespace BeerXML\Parser;


interface IFermentableWriter
{

    /**
     * May be TRUE if this item is normally added after the boil.  The default value is FALSE since most grains are
     * added during the mash or boil.
     *
     * @param boolean $addAfterBoil
     */
    public function setAddAfterBoil($addAfterBoil);

    /**
     * Weight of the fermentable, extract or sugar in Kilograms.
     *
     * @param number $amount
     */
    public function setAmount($amount);

    /**
     * Percent difference between the coarse grain yield and fine grain yield.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @param number $coarseFineDiff
     */
    public function setCoarseFineDiff($coarseFineDiff);

    /**
     * The color of the item in Lovibond Units (SRM for liquid extracts).
     *
     * @param float $color
     */
    public function setColor($color);

    /**
     * The diastatic power of the grain as measured in "Lintner" units.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @param float $diastaticPower
     */
    public function setDiastaticPower($diastaticPower);

    /**
     * For hopped extracts only - an estimate of the number of IBUs per pound of extract in a gallon of water.
     * To convert to IBUs we multiply this number by the "AMOUNT" field (in pounds) and divide by the number of gallons
     * in the batch.  Based on a sixty minute boil.
     * Only suitable for use with an "Extract" type, otherwise this value is ignored.
     *
     * @param float $ibuGalPerLb
     */
    public function setIbuGalPerLb($ibuGalPerLb);

    /**
     * The recommended maximum percentage (by weight) this ingredient should represent in a batch of beer.
     *
     * @param number $maxInBatch
     */
    public function setMaxInBatch($maxInBatch);

    /**
     * Percent moisture in the grain.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @param number $moisture
     */
    public function setMoisture($moisture);

    /**
     * Name of the fermentable.
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Textual noted describing this ingredient and its use.  May be multiline.
     *
     * @param string $notes
     */
    public function setNotes($notes);

    /**
     * Country or place of origin
     *
     * @param string $origin
     */
    public function setOrigin($origin);

    /**
     * The percent protein in the grain.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @param number $protein
     */
    public function setProtein($protein);

    /**
     * TRUE if it is recommended the grain be mashed, FALSE if it can be steeped.
     * A value of TRUE is only appropriate for a "Grain" or "Adjunct" types.  The default value is FALSE.
     * Note that this does NOT indicate whether the grain is mashed or not – it is only a recommendation used in recipe
     * formulation.
     *
     * @param boolean $recommendMash
     */
    public function setRecommendMash($recommendMash);

    /**
     * Supplier of the grain/extract/sugar
     *
     * @param string $supplier
     */
    public function setSupplier($supplier);

    /**
     * May be "Grain", "Sugar", "Extract", "Dry Extract" or "Adjunct".  Extract refers to liquid extract.
     *
     * @param string $type
     */
    public function setType($type);

    /**
     * Should be set to 1 for this version of the XML standard.
     * May be a higher number for later versions but all later versions shall be backward compatible.
     *
     * @param int $version
     */
    public function setVersion($version);

    /**
     * Percent dry yield (fine grain) for the grain, or the raw yield by weight if this is an extract adjunct or sugar.
     *
     * @param number $yield
     */
    public function setYield($yield);
}