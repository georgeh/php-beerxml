<?php


namespace BeerXML\Generator;


interface IMashProfileReader {

    /**
     * @return boolean
     */
    public function getEquipAdjust();

    /**
     * @return number
     */
    public function getGrainTemp();

    /**
     * @return MashStep[]
     */
    public function getMashSteps();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getNotes();

    /**
     * @return float
     */
    public function getPH();

    /**
     * @return number
     */
    public function getSpargeTemp();

    /**
     * @return float
     */
    public function getTunSpecificHeat();

    /**
     * @return number
     */
    public function getTunTemp();

    /**
     * @return float
     */
    public function getTunWeight();

    /**
     * @return int
     */
    public function getVersion();
}