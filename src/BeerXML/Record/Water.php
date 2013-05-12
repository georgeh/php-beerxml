<?php


namespace BeerXML\Record;


use BeerXML\Generator\IWaterDisplay as WaterGetter;
use BeerXML\Parser\IWaterDisplay as WaterSetter;

class Water implements WaterGetter, WaterSetter
{
    /**
     * Name of the water profile – usually the city and country of the water profile.
     *
     * @var string
     */
    private $name;

    /**
     * Version of the water record.  Should always be "1" for this version of the XML standard.
     *
     * @var int
     */
    private $version = 1;

    /**
     * Volume of water to use in a recipe in liters.
     *
     * @var number
     */
    private $amount;

    /**
     * The amount of calcium (Ca) in parts per million.
     *
     * @var float
     */
    private $calcium;

    /**
     * The amount of bicarbonate (HCO3) in parts per million.
     *
     * @var float
     */
    private $bicarbonate;

    /**
     * The amount of Sulfate (SO4) in parts per million.
     *
     * @var float
     */
    private $sulfate;

    /**
     * The amount of Chloride (Cl) in parts per million.
     *
     * @var float
     */
    private $chloride;

    /**
     * The amount of Sodium (Na) in parts per million.
     *
     * @var float
     */
    private $sodium;

    /**
     * The amount of Magnesium (Mg) in parts per million.
     *
     * @var float
     */
    private $magnesium;

    /**
     * The PH of the water.
     *
     * @var float
     */
    private $pH;

    /**
     * Notes about the water profile.  May be multiline.
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
     * Volume of water to use in a recipe in liters.
     *
     * @param number $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Volume of water to use in a recipe in liters.
     *
     * @return number
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * The amount of bicarbonate (HCO3) in parts per million.
     *
     * @param float $bicarbonate
     */
    public function setBicarbonate($bicarbonate)
    {
        $this->bicarbonate = $bicarbonate;
    }

    /**
     * The amount of bicarbonate (HCO3) in parts per million.
     *
     * @return float
     */
    public function getBicarbonate()
    {
        return $this->bicarbonate;
    }

    /**
     * The amount of calcium (Ca) in parts per million.
     *
     * @param float $calcium
     */
    public function setCalcium($calcium)
    {
        $this->calcium = $calcium;
    }

    /**
     * The amount of calcium (Ca) in parts per million.
     *
     * @return float
     */
    public function getCalcium()
    {
        return $this->calcium;
    }

    /**
     * @param float $chloride
     */
    public function setChloride($chloride)
    {
        $this->chloride = $chloride;
    }

    /**
     * @return float
     */
    public function getChloride()
    {
        return $this->chloride;
    }

    /**
     * The amount of Magnesium (Mg) in parts per million.
     *
     * @param float $magnesium
     */
    public function setMagnesium($magnesium)
    {
        $this->magnesium = $magnesium;
    }

    /**
     * The amount of Magnesium (Mg) in parts per million.
     *
     * @return float
     */
    public function getMagnesium()
    {
        return $this->magnesium;
    }

    /**
     * Name of the water profile – usually the city and country of the water profile.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Name of the water profile – usually the city and country of the water profile.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Notes about the water profile.  May be multiline.
     *
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Notes about the water profile.  May be multiline.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * The PH of the water.
     *
     * @param float $pH
     */
    public function setPH($pH)
    {
        $this->pH = $pH;
    }

    /**
     * The PH of the water.
     *
     * @return float
     */
    public function getPH()
    {
        return $this->pH;
    }

    /**
     * The amount of Sodium (Na) in parts per million.
     *
     * @param float $sodium
     */
    public function setSodium($sodium)
    {
        $this->sodium = $sodium;
    }

    /**
     * The amount of Sodium (Na) in parts per million.
     *
     * @return float
     */
    public function getSodium()
    {
        return $this->sodium;
    }

    /**
     * The amount of Sulfate (SO4) in parts per million.
     *
     * @param float $sulfate
     */
    public function setSulfate($sulfate)
    {
        $this->sulfate = $sulfate;
    }

    /**
     * The amount of Sulfate (SO4) in parts per million.
     *
     * @return float
     */
    public function getSulfate()
    {
        return $this->sulfate;
    }

    /**
     * Version of the water record.  Should always be "1" for this version of the XML standard.
     *
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Version of the water record.  Should always be "1" for this version of the XML standard.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * The amount of water in this record along with the units formatted for easy display in the current user defined
     * units.  For example "5.0 gal" or "20.0 l".
     *
     * @param string $displayAmount
     */
    public function setDisplayAmount($displayAmount)
    {
        $this->displayAmount = $displayAmount;
    }

    /**
     * The amount of water in this record along with the units formatted for easy display in the current user defined
     * units.  For example "5.0 gal" or "20.0 l".
     *
     * @return string
     */
    public function getDisplayAmount()
    {
        return $this->displayAmount;
    }

}
