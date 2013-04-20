<?php


namespace BeerXML\Record;


class Misc
{
    const TYPE_SPICE       = 'Spice';
    const TYPE_FINING      = 'Fining';
    const TYPE_WATER_AGENT = 'Water Agent';
    const TYPE_HERB        = 'Herb';
    const TYPE_FLAVOR      = 'Flavor';
    const TYPE_OTHER       = 'Other';
    const USE_BOIL         = 'Boil';
    const USE_MASH         = 'Mash';
    const USE_PRIMARY      = 'Primary';
    const USE_SECONDARY    = 'Secondary';
    const USE_BOTTLING     = 'Bottling';

    /**
     * Name of the misc item.
     * @var string
     */
    private $name;

    /**
     * Version number of this element.  Should be "1” for this version.
     * @var int
     */
    private $version = 1;

    /**
     * May be "Spice”, "Fining”, "Water Agent”, "Herb”, "Flavor” or "Other”
     * @var string
     */
    private $type;

    /**
     * May be "Boil”, "Mash”, "Primary”, "Secondary”, "Bottling”
     * @var string
     */
    private $use;

    /**
     * Amount of time the misc was boiled, steeped, mashed, etc in minutes
     * @var number
     */
    private $time;

    /**
     * Amount of item used.  The default measurements are by weight, but this may be the measurement in volume units if
     * AMOUNT_IS_WEIGHT is set to TRUE for this record.  If a liquid it is in liters, if a solid the weight is measured
     * in kilograms.
     * @var number
     */
    private $amount;

    /**
     * TRUE if the amount measurement is a weight measurement and FALSE if the amount is a volume measurement.  Default
     * value (if not present) is assumed to be FALSE.
     * @var bool
     */
    private $amountIsWeight = false;

    /**
     * Short description of what the ingredient is used for in text
     * @var string
     */
    private $useFor;

    /**
     * Detailed notes on the item including usage.  May be multiline.
     * @var string
     */
    private $notes;

    /**
     * @param number $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return number
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param boolean $amountIsWeight
     */
    public function setAmountIsWeight($amountIsWeight)
    {
        $this->amountIsWeight = $amountIsWeight;
    }

    /**
     * @return boolean
     */
    public function getAmountIsWeight()
    {
        return $this->amountIsWeight;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param number $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return number
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $use
     */
    public function setUse($use)
    {
        $this->use = $use;
    }

    /**
     * @return string
     */
    public function getUse()
    {
        return $this->use;
    }

    /**
     * @param string $useFor
     */
    public function setUseFor($useFor)
    {
        $this->useFor = $useFor;
    }

    /**
     * @return string
     */
    public function getUseFor()
    {
        return $this->useFor;
    }

    /**
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

}