<?php


namespace BeerXML\Parser;


interface IYeastDisplay extends IYeast {

    /**
     * Date sample was last cultured in a neutral date form such as “10 Dec 04”
     *
     * @param string $cultureDate
     */
    public function setCultureDate($cultureDate);

    /**
     * Maximum fermentation temperature converted to current user units along with the units.  For example “54.0 F” or
     * “24.2 C”
     *
     * @param string $dispMaxTemp
     */
    public function setDispMaxTemp($dispMaxTemp);

    /**
     * Minimum fermentation temperature converted to current user units along with the units.  For example “54.0 F” or
     * “24.2 C”
     *
     * @param string $dispMinTemp
     */
    public function setDispMinTemp($dispMinTemp);

    /**
     * The amount of yeast or starter in this record along with the units formatted for easy display in the current user
     * defined units.  For example “1.5 oz” or “100 g”.
     *
     * @param string $displayAmount
     */
    public function setDisplayAmount($displayAmount);

    /**
     * Amount in inventory for this hop along with the units – for example “10.0 pkgs”
     *
     * @param string $inventory
     */
    public function setInventory($inventory);
}