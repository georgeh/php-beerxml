<?php


namespace BeerXML\Parser;


interface IMashProfile
{

    /**
     * @param boolean $equipAdjust
     */
    public function setEquipAdjust($equipAdjust);

    /**
     * @param number $grainTemp
     */
    public function setGrainTemp($grainTemp);

    /**
     * @param MashStep $mashStep
     */
    public function addMashStep($mashStep);

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @param string $notes
     */
    public function setNotes($notes);

    /**
     * @param float $pH
     */
    public function setPH($pH);

    /**
     * @param number $spargeTemp
     */
    public function setSpargeTemp($spargeTemp);

    /**
     * @param float $tunSpecificHeat
     */
    public function setTunSpecificHeat($tunSpecificHeat);

    /**
     * @param number $tunTemp
     */
    public function setTunTemp($tunTemp);

    /**
     * @param float $tunWeight
     */
    public function setTunWeight($tunWeight);

    /**
     * @param int $version
     */
    public function setVersion($version);
}