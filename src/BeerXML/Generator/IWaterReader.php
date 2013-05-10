<?php


namespace BeerXML\Generator;


interface IWaterReader {

    /**
     * Volume of water to use in a recipe in liters.
     *
     * @return number
     */
    public function getAmount();

    /**
     * The amount of bicarbonate (HCO3) in parts per million.
     *
     * @return float
     */
    public function getBicarbonate();

    /**
     * The amount of calcium (Ca) in parts per million.
     *
     * @return float
     */
    public function getCalcium();

    /**
     * @return float
     */
    public function getChloride();

    /**
     * The amount of Magnesium (Mg) in parts per million.
     *
     * @return float
     */
    public function getMagnesium();

    /**
     * Name of the water profile – usually the city and country of the water profile.
     *
     * @return string
     */
    public function getName();

    /**
     * Notes about the water profile.  May be multiline.
     *
     * @return string
     */
    public function getNotes();

    /**
     * The PH of the water.
     *
     * @return float
     */
    public function getPH();

    /**
     * The amount of Sodium (Na) in parts per million.
     *
     * @return float
     */
    public function getSodium();

    /**
     * The amount of Sulfate (SO4) in parts per million.
     *
     * @return float
     */
    public function getSulfate();

    /**
     * Version of the water record.  Should always be "1" for this version of the XML standard.
     *
     * @return int
     */
    public function getVersion();
}