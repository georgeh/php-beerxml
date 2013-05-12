<?php


namespace BeerXML\Generator;


interface IEquipmentDisplay extends IEquipment
{

    /**
     * The target volume of the batch at the start of fermentation in display volume units such as “5.0 gal”
     *
     * @return string
     */
    public function getDisplayBatchSize();

    /**
     * The pre-boil volume normally used for a batch of this size shown in display volume units such as “5.5 gal”
     *
     * @return string
     */
    public function getDisplayBoilSize();

    /**
     * Amount lost to the lauter tun and equipment associated with the lautering process. Ex: “2.0 gal” or “1.0 l”
     *
     * @return string
     */
    public function getDisplayLauterDeadspace();

    /**
     * Amount normally added to the boil kettle before the boil. Ex: “1.0 gal”
     *
     * @return string
     */
    public function getDisplayTopUpKettle();

    /**
     * The amount of top up water normally added just prior to starting fermentation in display volume such as “1.0 gal”
     *
     * @return string
     */
    public function getDisplayTopUpWater();

    /**
     * The amount of wort normally lost during transition from the boiler to the fermentation vessel.
     *
     * Includes both unusable wort due to trub and wort lost to the chiller and transfer systems.  Expressed in user
     * units - Ex: “1.5 qt”
     *
     * @return string
     */
    public function getDisplayTrubChillerLoss();

    /**
     * Volume of the mash tun in display units such as “10.0 gal” or “20.0 l”
     *
     * @return string
     */
    public function getDisplayTunVolume();

    /**
     * Weight of the mash tun in display units such as “3.0 kg” or “6.0 lb”
     *
     * @return string
     */
    public function getDisplayTunWeight();
}