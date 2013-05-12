<?php


namespace BeerXML\Record;


use BeerXML\Generator\IMiscDisplay as MiscGetter;
use BeerXML\Parser\IMiscDisplay as MiscSetter;

class Misc implements MiscGetter, MiscSetter
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
     *
     * @var string
     */
    private $name;

    /**
     * Version number of this element.  Should be "1" for this version.
     *
     * @var int
     */
    private $version = 1;

    /**
     * May be "Spice", "Fining", "Water Agent", "Herb", "Flavor" or "Other"
     *
     * @var string
     */
    private $type;

    /**
     * May be "Boil", "Mash", "Primary", "Secondary", "Bottling"
     *
     * @var string
     */
    private $use;

    /**
     * Amount of time the misc was boiled, steeped, mashed, etc in minutes
     *
     * @var number
     */
    private $time;

    /**
     * Amount of item used.  The default measurements are by weight, but this may be the measurement in volume units if
     * AMOUNT_IS_WEIGHT is set to TRUE for this record.  If a liquid it is in liters, if a solid the weight is measured
     * in kilograms.
     *
     * @var number
     */
    private $amount;

    /**
     * TRUE if the amount measurement is a weight measurement and FALSE if the amount is a volume measurement.  Default
     * value (if not present) is assumed to be FALSE.
     *
     * @var bool
     */
    private $amountIsWeight = false;

    /**
     * Short description of what the ingredient is used for in text
     *
     * @var string
     */
    private $useFor;

    /**
     * Detailed notes on the item including usage.  May be multiline.
     *
     * @var string
     */
    private $notes;

    /** Fields from Appendix A Optional Extensions for BeerXML Display **/

    /**
     * @var string
     */
    private $displayAmount;

    /**
     * @var string
     */
    private $inventory;

    /**
     * @var string
     */
    private $displayTime;

    /**
     * Amount of item used.  The default measurements are by weight, but this may be the measurement in volume units if
     * AMOUNT_IS_WEIGHT is set to TRUE for this record.  If a liquid it is in liters, if a solid the weight is measured
     * in kilograms.
     *
     * @param number $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Amount of item used.  The default measurements are by weight, but this may be the measurement in volume units if
     * AMOUNT_IS_WEIGHT is set to TRUE for this record.  If a liquid it is in liters, if a solid the weight is measured
     * in kilograms.
     *
     * @return number
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * TRUE if the amount measurement is a weight measurement and FALSE if the amount is a volume measurement.  Default
     * value (if not present) is assumed to be FALSE.
     *
     * @param boolean $amountIsWeight
     */
    public function setAmountIsWeight($amountIsWeight)
    {
        $this->amountIsWeight = $amountIsWeight;
    }

    /**
     * TRUE if the amount measurement is a weight measurement and FALSE if the amount is a volume measurement.  Default
     * value (if not present) is assumed to be FALSE.
     *
     * @return boolean
     */
    public function getAmountIsWeight()
    {
        return $this->amountIsWeight;
    }

    /**
     * Name of the misc item.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Name of the misc item.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Detailed notes on the item including usage.  May be multiline.
     *
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Detailed notes on the item including usage.  May be multiline.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Amount of time the misc was boiled, steeped, mashed, etc in minutes
     *
     * @param number $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * Amount of time the misc was boiled, steeped, mashed, etc in minutes
     *
     * @return number
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * May be "Spice", "Fining", "Water Agent", "Herb", "Flavor" or "Other"
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * May be "Spice", "Fining", "Water Agent", "Herb", "Flavor" or "Other"
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * May be "Boil", "Mash", "Primary", "Secondary", "Bottling"
     *
     * @param string $use
     */
    public function setUse($use)
    {
        $this->use = $use;
    }

    /**
     * May be "Boil", "Mash", "Primary", "Secondary", "Bottling"
     *
     * @return string
     */
    public function getUse()
    {
        return $this->use;
    }

    /**
     * Short description of what the ingredient is used for in text
     *
     * @param string $useFor
     */
    public function setUseFor($useFor)
    {
        $this->useFor = $useFor;
    }

    /**
     * Short description of what the ingredient is used for in text
     *
     * @return string
     */
    public function getUseFor()
    {
        return $this->useFor;
    }

    /**
     * Version number of this element.  Should be "1" for this version.
     *
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Version number of this element.  Should be "1" for this version.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * The amount of the item in this record along with the units formatted for easy display in the current user defined
     * units.  For example "1.5 lbs" or "2.1 kg".
     *
     * @param string $displayAmount
     */
    public function setDisplayAmount($displayAmount)
    {
        $this->displayAmount = $displayAmount;
    }

    /**
     * The amount of the item in this record along with the units formatted for easy display in the current user defined
     * units.  For example "1.5 lbs" or "2.1 kg".
     *
     * @return string
     */
    public function getDisplayAmount()
    {
        return $this->displayAmount;
    }

    /**
     * Time in appropriate units along with the units as in "10 min" or "3 days".
     *
     * @param string $displayTime
     */
    public function setDisplayTime($displayTime)
    {
        $this->displayTime = $displayTime;
    }

    /**
     * Time in appropriate units along with the units as in "10 min" or "3 days".
     *
     * @return string
     */
    public function getDisplayTime()
    {
        return $this->displayTime;
    }

    /**
     * Amount in inventory for this item along with the units – for example "10.0 lb"
     *
     * @param string $inventory
     */
    public function setInventory($inventory)
    {
        $this->inventory = $inventory;
    }

    /**
     * Amount in inventory for this item along with the units – for example "10.0 lb"
     *
     * @return string
     */
    public function getInventory()
    {
        return $this->inventory;
    }

}
