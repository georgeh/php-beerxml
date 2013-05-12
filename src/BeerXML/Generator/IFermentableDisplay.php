<?php


namespace BeerXML\Generator;


interface IFermentableDisplay extends IFermentable
{

    /**
     * The amount of fermentables in this record along with the units formatted for easy display in the current user
     * defined units.  For example “1.5 lbs” or “2.1 kg”.
     *
     * @return string
     */
    public function getDisplayAmount();

    /**
     * Color in user defined color units along with the unit identified – for example “200L” or “40 ebc”
     *
     * @return string
     */
    public function getDisplayColor();

    /**
     * Amount in inventory for this item along with the units – for example “10.0 lb”
     *
     * @return string
     */
    public function getInventory();

    /**
     * The yield of the fermentable converted to specific gravity units for display.  For example “1.036” or “1.040”
     * might be valid potentials.
     *
     * @return float
     */
    public function getPotential();
}