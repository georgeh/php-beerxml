<?php


namespace BeerXML\Parser;


interface IWaterDisplay extends IWater {

    /**
     * The amount of water in this record along with the units formatted for easy display in the current user defined
     * units.  For example “5.0 gal” or “20.0 l”.
     *
     * @param string $displayAmount
     */
    public function setDisplayAmount($displayAmount);
}