<?php


namespace BeerXML\Generator;


interface IMiscReader
{

    /**
     * Amount of item used.  The default measurements are by weight, but this may be the measurement in volume units if
     * AMOUNT_IS_WEIGHT is set to TRUE for this record.  If a liquid it is in liters, if a solid the weight is measured
     * in kilograms.
     *
     * @return number
     */
    public function getAmount();

    /**
     * TRUE if the amount measurement is a weight measurement and FALSE if the amount is a volume measurement.  Default
     * value (if not present) is assumed to be FALSE.
     *
     * @return boolean
     */
    public function getAmountIsWeight();

    /**
     * Name of the misc item.
     *
     * @return string
     */
    public function getName();

    /**
     * Detailed notes on the item including usage.  May be multiline.
     *
     * @return string
     */
    public function getNotes();

    /**
     * Amount of time the misc was boiled, steeped, mashed, etc in minutes
     *
     * @return number
     */
    public function getTime();

    /**
     * May be "Spice", "Fining", "Water Agent", "Herb", "Flavor" or "Other"
     *
     * @return string
     */
    public function getType();

    /**
     * May be "Boil", "Mash", "Primary", "Secondary", "Bottling"
     *
     * @return string
     */
    public function getUse();

    /**
     * Short description of what the ingredient is used for in text
     *
     * @return string
     */
    public function getUseFor();

    /**
     * Version number of this element.  Should be "1" for this version.
     *
     * @return int
     */
    public function getVersion();
}