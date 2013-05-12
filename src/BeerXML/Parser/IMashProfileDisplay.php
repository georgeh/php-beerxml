<?php


namespace BeerXML\Parser;


interface IMashProfileDisplay extends IMashProfile
{

    /**
     * Grain temperature in user display units with the units.  For example: “72 F”.
     *
     * @param string $displayGrainTemp
     */
    public function setDisplayGrainTemp($displayGrainTemp);

    /**
     * Sparge temperature in user defined units.  For example “178 F”
     *
     * @param string $displaySpargeTemp
     */
    public function setDisplaySpargeTemp($displaySpargeTemp);

    /**
     * Tun temperature in user display units.  For example “68 F”
     *
     * @param string $displayTunTemp
     */
    public function setDisplayTunTemp($displayTunTemp);

    /**
     * Tun weight in user defined units – for example “10 lb”
     *
     * @param string $displayTunWeight
     */
    public function setDisplayTunWeight($displayTunWeight);
}