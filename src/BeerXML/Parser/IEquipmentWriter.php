<?php


namespace BeerXML\Parser;


interface IEquipmentWriter
{

    /**
     * The target volume of the batch at the start of fermentation.
     *
     * @param float $batchSize
     */
    public function setBatchSize($batchSize);

    /**
     * The pre-boil volume used in this particular instance for this equipment setup.  Note that this may be a
     * calculated value depending on the CALC_BOIL_VOLUME parameter.
     *
     * @param float $boilSize
     */
    public function setBoilSize($boilSize);

    /**
     * The normal amount of time one boils for this equipment setup.  This can be used with the evaporation rate to
     * calculate the evaporation loss.
     *
     * @param number $boilTime
     */
    public function setBoilTime($boilTime);

    /**
     * Flag denoting that the program should calculate the boil size.  Flag may be TRUE or FALSE.
     * If TRUE, then BOIL_SIZE = (BATCH_SIZE – TOP_UP_WATER – TRUB_CHILLER_LOSS) * (1+BOIL_TIME * EVAP_RATE )
     * If set then the boil size should match this value.
     *
     * @param boolean $calcBoilVolume
     */
    public function setCalcBoilVolume($calcBoilVolume);

    /**
     * The percentage of wort lost to evaporation per hour of the boil.
     *
     * @param float $evapRate
     */
    public function setEvapRate($evapRate);

    /**
     * Large batch hop utilization.  This value should be 100% for batches less than 20 gallons, but may be higher
     * (200% or more) for very large batch equipment.
     *
     * @param float $hopUtilization
     */
    public function setHopUtilization($hopUtilization);

    /**
     * Amount lost to the lauter tun and equipment associated with the lautering process.
     *
     * @param number $lauterDeadspace
     */
    public function setLauterDeadspace($lauterDeadspace);

    /**
     * Name of the equipment profile – usually a text description of the brewing setup.
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Notes associated with the equipment.  May be a multiline entry.
     *
     * @param string $notes
     */
    public function setNotes($notes);

    /**
     * Amount normally added to the boil kettle before the boil.
     *
     * @param number $topUpKettle
     */
    public function setTopUpKettle($topUpKettle);

    /**
     * @param float $topUpWater
     */
    public function setTopUpWater($topUpWater);

    /**
     * The amount of wort normally lost during transition from the boiler to the fermentation vessel.  Includes both
     * unusable wort due to trub and wort lost to the chiller and transfer systems.
     *
     * @param float $trubChillerLoss
     */
    public function setTrubChillerLoss($trubChillerLoss);

    /**
     * The specific heat of the mash tun which is usually a function of the material it is made of.  Typical ranges are
     * 0.1-0.25 for metal and 0.2-0.5 for plastic materials.
     *
     * @param float $tunSpecificHeat
     */
    public function setTunSpecificHeat($tunSpecificHeat);

    /**
     * Volume of the mash tun in liters.  This parameter can be used to calculate if a particular mash and grain profile
     * will fit in the mash tun.  It may also be used for thermal calculations in the case of a partially full mash tun.
     *
     * @param float $tunVolume
     */
    public function setTunVolume($tunVolume);

    /**
     * Weight of the mash tun in kilograms.  Used primarily to calculate the thermal parameters of the mash tun – in
     * conjunction with the volume and specific heat.
     *
     * @param float $tunWeight
     */
    public function setTunWeight($tunWeight);

    /**
     * Version of the equipment record.  Should always be "1" for this version of the XML standard.
     *
     * @param int $version
     */
    public function setVersion($version);
}