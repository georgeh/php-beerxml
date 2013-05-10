<?php


namespace BeerXML\Generator;


interface IEquipmentReader
{

    /**
     * The target volume of the batch at the start of fermentation.
     *
     * @return float
     */
    public function getBatchSize();

    /**
     * The pre-boil volume used in this particular instance for this equipment setup.  Note that this may be a
     * calculated value depending on the CALC_BOIL_VOLUME parameter.
     *
     * @return float
     */
    public function getBoilSize();

    /**
     * The normal amount of time one boils for this equipment setup.  This can be used with the evaporation rate to
     * calculate the evaporation loss.
     *
     * @return number
     */
    public function getBoilTime();

    /**
     * Flag denoting that the program should calculate the boil size.  Flag may be TRUE or FALSE.
     * If TRUE, then BOIL_SIZE = (BATCH_SIZE – TOP_UP_WATER – TRUB_CHILLER_LOSS) * (1+BOIL_TIME * EVAP_RATE )
     * If set then the boil size should match this value.
     *
     * @return boolean
     */
    public function getCalcBoilVolume();

    /**
     * The percentage of wort lost to evaporation per hour of the boil.
     *
     * @return float
     */
    public function getEvapRate();

    /**
     * Large batch hop utilization.  This value should be 100% for batches less than 20 gallons, but may be higher
     * (200% or more) for very large batch equipment.
     *
     * @return float
     */
    public function getHopUtilization();

    /**
     * Amount lost to the lauter tun and equipment associated with the lautering process.
     *
     * @return number
     */
    public function getLauterDeadspace();

    /**
     * Name of the equipment profile – usually a text description of the brewing setup.
     *
     * @return string
     */
    public function getName();

    /**
     * Notes associated with the equipment.  May be a multiline entry.
     *
     * @return string
     */
    public function getNotes();

    /**
     * Amount normally added to the boil kettle before the boil.
     *
     * @return number
     */
    public function getTopUpKettle();

    /**
     * @return float
     */
    public function getTopUpWater();

    /**
     * The amount of wort normally lost during transition from the boiler to the fermentation vessel.  Includes both
     * unusable wort due to trub and wort lost to the chiller and transfer systems.
     *
     * @return float
     */
    public function getTrubChillerLoss();

    /**
     * The specific heat of the mash tun which is usually a function of the material it is made of.  Typical ranges are
     * 0.1-0.25 for metal and 0.2-0.5 for plastic materials.
     *
     * @return float
     */
    public function getTunSpecificHeat();

    /**
     * Volume of the mash tun in liters.  This parameter can be used to calculate if a particular mash and grain profile
     * will fit in the mash tun.  It may also be used for thermal calculations in the case of a partially full mash tun.
     *
     * @return float
     */
    public function getTunVolume();

    /**
     * Weight of the mash tun in kilograms.  Used primarily to calculate the thermal parameters of the mash tun – in
     * conjunction with the volume and specific heat.
     *
     * @return float
     */
    public function getTunWeight();

    /**
     * Version of the equipment record.  Should always be "1" for this version of the XML standard.
     *
     * @return int
     */
    public function getVersion();
}