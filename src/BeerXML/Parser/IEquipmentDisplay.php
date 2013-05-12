<?php


namespace BeerXML\Parser;


interface IEquipmentDisplay extends IEquipment
{

    /**
     * The target volume of the batch at the start of fermentation in display volume units such as “5.0 gal”
     *
     * @param string $displayBatchSize
     */
    public function setDisplayBatchSize($displayBatchSize);

    /**
     * The pre-boil volume normally used for a batch of this size shown in display volume units such as “5.5 gal”
     *
     * @param string $displayBoilSize
     */
    public function setDisplayBoilSize($displayBoilSize);

    /**
     * Amount lost to the lauter tun and equipment associated with the lautering process. Ex: “2.0 gal” or “1.0 l”
     *
     * @param string $displayLauterDeadspace
     */
    public function setDisplayLauterDeadspace($displayLauterDeadspace);

    /**
     * Amount normally added to the boil kettle before the boil. Ex: “1.0 gal”
     *
     * @param string $displayTopUpKettle
     */
    public function setDisplayTopUpKettle($displayTopUpKettle);

    /**
     * The amount of top up water normally added just prior to starting fermentation in display volume such as “1.0 gal”
     *
     * @param string $displayTopUpWater
     */
    public function setDisplayTopUpWater($displayTopUpWater);

    /**
     * The amount of wort normally lost during transition from the boiler to the fermentation vessel.
     *
     * Includes both unusable wort due to trub and wort lost to the chiller and transfer systems.  Expressed in user
     * units - Ex: “1.5 qt”
     *
     * @param string $displayTrubChillerLoss
     */
    public function setDisplayTrubChillerLoss($displayTrubChillerLoss);

    /**
     * Volume of the mash tun in display units such as “10.0 gal” or “20.0 l”
     *
     * @param string $displayTunVolume
     */
    public function setDisplayTunVolume($displayTunVolume);

    /**
     * Weight of the mash tun in display units such as “3.0 kg” or “6.0 lb”
     *
     * @param string $displayTunWeight
     */
    public function setDisplayTunWeight($displayTunWeight);
}