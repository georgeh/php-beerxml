<?php


namespace BeerXML\Parser;


interface IMisc
{

    /**
     * Amount of item used.  The default measurements are by weight, but this may be the measurement in volume units if
     * AMOUNT_IS_WEIGHT is set to TRUE for this record.  If a liquid it is in liters, if a solid the weight is measured
     * in kilograms.
     *
     * @param number $amount
     */
    public function setAmount($amount);

    /**
     * TRUE if the amount measurement is a weight measurement and FALSE if the amount is a volume measurement.  Default
     * value (if not present) is assumed to be FALSE.
     *
     * @param boolean $amountIsWeight
     */
    public function setAmountIsWeight($amountIsWeight);

    /**
     * Name of the misc item.
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Detailed notes on the item including usage.  May be multiline.
     *
     * @param string $notes
     */
    public function setNotes($notes);

    /**
     * Amount of time the misc was boiled, steeped, mashed, etc in minutes
     *
     * @param number $time
     */
    public function setTime($time);

    /**
     * May be "Spice", "Fining", "Water Agent", "Herb", "Flavor" or "Other"
     *
     * @param string $type
     */
    public function setType($type);

    /**
     * May be "Boil", "Mash", "Primary", "Secondary", "Bottling"
     *
     * @param string $use
     */
    public function setUse($use);

    /**
     * Short description of what the ingredient is used for in text
     *
     * @param string $useFor
     */
    public function setUseFor($useFor);

    /**
     * Version number of this element.  Should be "1" for this version.
     *
     * @param int $version
     */
    public function setVersion($version);
}