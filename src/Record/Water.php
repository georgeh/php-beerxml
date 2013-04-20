<?php


namespace BeerXML\Record;


class Water
{
    /**
     * Name of the water profile – usually the city and country of the water profile.
     * @var string
     */
    private $name;

    /**
     * Version of the water record.  Should always be "1” for this version of the XML standard.
     * @var int
     */
    private $version = 1;

    /**
     * Volume of water to use in a recipe in liters.
     * @var number
     */
    private $amount;

    /**
     * The amount of calcium (Ca) in parts per million.
     * @var float
     */
    private $calcium;

    /**
     * The amount of bicarbonate (HCO3) in parts per million.
     * @var float
     */
    private $bicarbonate;

    /**
     * The amount of Sulfate (SO4) in parts per million.
     * @var float
     */
    private $sulfate;

    /**
     * The amount of Chloride (Cl) in parts per million.
     * @var float
     */
    private $chloride;

    /**
     * The amount of Sodium (Na) in parts per million.
     * @var float
     */
    private $sodium;

    /**
     * The amount of Magnesium (Mg) in parts per million.
     * @var float
     */
    private $magnesium;

    /**
     * The PH of the water.
     * @var float
     */
    private $pH;

    /**
     * Notes about the water profile.  May be multiline.
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
     * @param float $bicarbonate
     */
    public function setBicarbonate($bicarbonate)
    {
        $this->bicarbonate = $bicarbonate;
    }

    /**
     * @return float
     */
    public function getBicarbonate()
    {
        return $this->bicarbonate;
    }

    /**
     * @param float $calcium
     */
    public function setCalcium($calcium)
    {
        $this->calcium = $calcium;
    }

    /**
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
     * @param float $magnesium
     */
    public function setMagnesium($magnesium)
    {
        $this->magnesium = $magnesium;
    }

    /**
     * @return float
     */
    public function getMagnesium()
    {
        return $this->magnesium;
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
     * @param float $pH
     */
    public function setPH($pH)
    {
        $this->pH = $pH;
    }

    /**
     * @return float
     */
    public function getPH()
    {
        return $this->pH;
    }

    /**
     * @param float $sodium
     */
    public function setSodium($sodium)
    {
        $this->sodium = $sodium;
    }

    /**
     * @return float
     */
    public function getSodium()
    {
        return $this->sodium;
    }

    /**
     * @param float $sulfate
     */
    public function setSulfate($sulfate)
    {
        $this->sulfate = $sulfate;
    }

    /**
     * @return float
     */
    public function getSulfate()
    {
        return $this->sulfate;
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