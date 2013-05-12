<?php


namespace BeerXML\Generator;


interface IWaterDisplay extends IWater
{

    /**
     * The amount of water in this record along with the units formatted for easy display in the current user defined
     * units.  For example "5.0 gal" or "20.0 l".
     *
     * @return string
     */
    public function getDisplayAmount();
}