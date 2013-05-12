<?php


namespace BeerXML\Generator;


interface IMiscDisplay extends IMisc
{

    /**
     * The amount of the item in this record along with the units formatted for easy display in the current user defined
     * units.  For example “1.5 lbs” or “2.1 kg”.
     *
     * @return string
     */
    public function getDisplayAmount();

    /**
     * Time in appropriate units along with the units as in “10 min” or “3 days”.
     *
     * @return string
     */
    public function getDisplayTime();

    /**
     * Amount in inventory for this item along with the units – for example “10.0 lb”
     *
     * @return string
     */
    public function getInventory();
}