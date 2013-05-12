<?php


namespace BeerXML\Generator;


interface IMashProfileDisplay extends IMashProfile
{

    /**
     * Grain temperature in user display units with the units.  For example: "72 F".
     *
     * @return string
     */
    public function getDisplayGrainTemp();

    /**
     * Sparge temperature in user defined units.  For example "178 F"
     *
     * @return string
     */
    public function getDisplaySpargeTemp();

    /**
     * Tun temperature in user display units.  For example "68 F"
     *
     * @return string
     */
    public function getDisplayTunTemp();

    /**
     * Tun weight in user defined units – for example "10 lb"
     *
     * @return string
     */
    public function getDisplayTunWeight();
}