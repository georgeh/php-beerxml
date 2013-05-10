<?php


namespace BeerXML\Parser;


interface IWaterWriter
{

    /**
     * Volume of water to use in a recipe in liters.
     *
     * @param number $amount
     */
    public function setAmount($amount);

    /**
     * The amount of bicarbonate (HCO3) in parts per million.
     *
     * @param float $bicarbonate
     */
    public function setBicarbonate($bicarbonate);

    /**
     * The amount of calcium (Ca) in parts per million.
     *
     * @param float $calcium
     */
    public function setCalcium($calcium);

    /**
     * @param float $chloride
     */
    public function setChloride($chloride);

    /**
     * The amount of Magnesium (Mg) in parts per million.
     *
     * @param float $magnesium
     */
    public function setMagnesium($magnesium);

    /**
     * Name of the water profile – usually the city and country of the water profile.
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Notes about the water profile.  May be multiline.
     *
     * @param string $notes
     */
    public function setNotes($notes);

    /**
     * The PH of the water.
     *
     * @param float $pH
     */
    public function setPH($pH);

    /**
     * The amount of Sodium (Na) in parts per million.
     *
     * @param float $sodium
     */
    public function setSodium($sodium);

    /**
     * The amount of Sulfate (SO4) in parts per million.
     *
     * @param float $sulfate
     */
    public function setSulfate($sulfate);

    /**
     * Version of the water record.  Should always be "1" for this version of the XML standard.
     *
     * @param int $version
     */
    public function setVersion($version);
}