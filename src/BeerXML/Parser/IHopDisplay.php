<?php


namespace BeerXML\Parser;


interface IHopDisplay extends IHop
{

    /**
     * The amount of hops in this record along with the units formatted for easy display in the current user defined
     * units.  For example “100 g” or “1.5 oz”.
     *
     * @param string $displayAmount
     */
    public function setDisplayAmount($displayAmount);

    /**
     * Time displayed in minutes for all uses except for the dry hop which is in days.  For example “60 min”, “3 days”.
     *
     * @param string $displayTime
     */
    public function setDisplayTime($displayTime);

    /**
     * Amount in inventory for this item along with the units – for example “10.0 oz”
     *
     * @param string $inventory
     */
    public function setInventory($inventory);
}