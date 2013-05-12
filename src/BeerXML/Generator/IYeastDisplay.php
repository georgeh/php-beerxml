<?php


namespace BeerXML\Generator;


interface IYeastDisplay extends IYeast
{

    /**
     * Date sample was last cultured in a neutral date form such as "10 Dec 04"
     *
     * @return string
     */
    public function getCultureDate();

    /**
     * Maximum fermentation temperature converted to current user units along with the units.  For example "54.0 F" or
     * "24.2 C"
     *
     * @return string
     */
    public function getDispMaxTemp();

    /**
     * Minimum fermentation temperature converted to current user units along with the units.  For example "54.0 F" or
     * "24.2 C"
     *
     * @return string
     */
    public function getDispMinTemp();

    /**
     * The amount of yeast or starter in this record along with the units formatted for easy display in the current user
     * defined units.  For example "1.5 oz" or "100 g".
     *
     * @return string
     */
    public function getDisplayAmount();

    /**
     * Amount in inventory for this hop along with the units – for example "10.0 pkgs"
     *
     * @return string
     */
    public function getInventory();
}