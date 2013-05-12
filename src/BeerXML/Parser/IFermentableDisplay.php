<?php


namespace BeerXML\Parser;


interface IFermentableDisplay extends IFermentable
{

    /**
     * The amount of fermentables in this record along with the units formatted for easy display in the current user
     * defined units.  For example “1.5 lbs” or “2.1 kg”.
     *
     * @param string $displayAmount
     */
    public function setDisplayAmount($displayAmount);

    /**
     * Color in user defined color units along with the unit identified – for example “200L” or “40 ebc”
     *
     * @param string $displayColor
     */
    public function setDisplayColor($displayColor);

    /**
     * Amount in inventory for this item along with the units – for example “10.0 lb”
     *
     * @param string $inventory
     */
    public function setInventory($inventory);

    /**
     * The yield of the fermentable converted to specific gravity units for display.  For example “1.036” or “1.040”
     * might be valid potentials.
     *
     * @param float $potential
     */
    public function setPotential($potential);
}