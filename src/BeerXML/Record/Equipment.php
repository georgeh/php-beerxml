<?php


namespace BeerXML\Record;


class Equipment
{
    /**
     * Name of the equipment profile – usually a text description of the brewing setup.
     *
     * @var string
     */
    private $name;

    /**
     * Version of the equipment record.  Should always be "1" for this version of the XML standard.
     *
     * @var int
     */
    private $version = 1;

    /**
     * The pre-boil volume used in this particular instance for this equipment setup.  Note that this may be a
     * calculated value depending on the CALC_BOIL_VOLUME parameter.
     *
     * @var float
     */
    private $boilSize;

    /**
     * The target volume of the batch at the start of fermentation.
     *
     * @var float
     */
    private $batchSize;

    /**
     * Volume of the mash tun in liters.  This parameter can be used to calculate if a particular mash and grain profile
     * will fit in the mash tun.  It may also be used for thermal calculations in the case of a partially full mash tun.
     *
     * @var float
     */
    private $tunVolume;

    /**
     * Weight of the mash tun in kilograms.  Used primarily to calculate the thermal parameters of the mash tun – in
     * conjunction with the volume and specific heat.
     *
     * @var float
     */
    private $tunWeight;

    /**
     * The specific heat of the mash tun which is usually a function of the material it is made of.  Typical ranges are
     * 0.1-0.25 for metal and 0.2-0.5 for plastic materials.
     *
     * @var float
     */
    private $tunSpecificHeat;

    /**
     * The amount of top up water normally added just prior to starting fermentation.  Usually used for extract brewing.
     *
     * @var float
     */
    private $topUpWater;

    /**
     * The amount of wort normally lost during transition from the boiler to the fermentation vessel.  Includes both
     * unusable wort due to trub and wort lost to the chiller and transfer systems.
     *
     * @var float
     */
    private $trubChillerLoss;

    /**
     * The percentage of wort lost to evaporation per hour of the boil.
     *
     * @var float
     */
    private $evapRate;

    /**
     * The normal amount of time one boils for this equipment setup.  This can be used with the evaporation rate to
     * calculate the evaporation loss.
     *
     * @var number
     */
    private $boilTime;

    /**
     * Flag denoting that the program should calculate the boil size.  Flag may be TRUE or FALSE.
     * If TRUE, then BOIL_SIZE = (BATCH_SIZE – TOP_UP_WATER – TRUB_CHILLER_LOSS) * (1+BOIL_TIME * EVAP_RATE )
     * If set then the boil size should match this value.
     *
     * @var bool
     */
    private $calcBoilVolume;

    /**
     * Amount lost to the lauter tun and equipment associated with the lautering process.
     *
     * @var number
     */
    private $lauterDeadspace;

    /**
     * Amount normally added to the boil kettle before the boil.
     *
     * @var number
     */
    private $topUpKettle;

    /**
     * Large batch hop utilization.  This value should be 100% for batches less than 20 gallons, but may be higher
     * (200% or more) for very large batch equipment.
     *
     * @var float
     */
    private $hopUtilization;

    /**
     * Notes associated with the equipment.  May be a multiline entry.
     *
     * @var string
     */
    private $notes;

    /**
     * The target volume of the batch at the start of fermentation.
     *
     * @param float $batchSize
     */
    public function setBatchSize($batchSize)
    {
        $this->batchSize = $batchSize;
    }

    /**
     * The target volume of the batch at the start of fermentation.
     *
     * @return float
     */
    public function getBatchSize()
    {
        return $this->batchSize;
    }

    /**
     * The pre-boil volume used in this particular instance for this equipment setup.  Note that this may be a
     * calculated value depending on the CALC_BOIL_VOLUME parameter.
     *
     * @param float $boilSize
     */
    public function setBoilSize($boilSize)
    {
        $this->boilSize = $boilSize;
    }

    /**
     * The pre-boil volume used in this particular instance for this equipment setup.  Note that this may be a
     * calculated value depending on the CALC_BOIL_VOLUME parameter.
     *
     * @return float
     */
    public function getBoilSize()
    {
        return $this->boilSize;
    }

    /**
     * The normal amount of time one boils for this equipment setup.  This can be used with the evaporation rate to
     * calculate the evaporation loss.
     *
     * @param number $boilTime
     */
    public function setBoilTime($boilTime)
    {
        $this->boilTime = $boilTime;
    }

    /**
     * The normal amount of time one boils for this equipment setup.  This can be used with the evaporation rate to
     * calculate the evaporation loss.
     *
     * @return number
     */
    public function getBoilTime()
    {
        return $this->boilTime;
    }

    /**
     * Flag denoting that the program should calculate the boil size.  Flag may be TRUE or FALSE.
     * If TRUE, then BOIL_SIZE = (BATCH_SIZE – TOP_UP_WATER – TRUB_CHILLER_LOSS) * (1+BOIL_TIME * EVAP_RATE )
     * If set then the boil size should match this value.
     *
     * @param boolean $calcBoilVolume
     */
    public function setCalcBoilVolume($calcBoilVolume)
    {
        $this->calcBoilVolume = $calcBoilVolume;
    }

    /**
     * Flag denoting that the program should calculate the boil size.  Flag may be TRUE or FALSE.
     * If TRUE, then BOIL_SIZE = (BATCH_SIZE – TOP_UP_WATER – TRUB_CHILLER_LOSS) * (1+BOIL_TIME * EVAP_RATE )
     * If set then the boil size should match this value.
     *
     * @return boolean
     */
    public function getCalcBoilVolume()
    {
        return $this->calcBoilVolume;
    }

    /**
     * The percentage of wort lost to evaporation per hour of the boil.
     *
     * @param float $evapRate
     */
    public function setEvapRate($evapRate)
    {
        $this->evapRate = $evapRate;
    }

    /**
     * The percentage of wort lost to evaporation per hour of the boil.
     *
     * @return float
     */
    public function getEvapRate()
    {
        return $this->evapRate;
    }

    /**
     * Large batch hop utilization.  This value should be 100% for batches less than 20 gallons, but may be higher
     * (200% or more) for very large batch equipment.
     *
     * @param float $hopUtilization
     */
    public function setHopUtilization($hopUtilization)
    {
        $this->hopUtilization = $hopUtilization;
    }

    /**
     * Large batch hop utilization.  This value should be 100% for batches less than 20 gallons, but may be higher
     * (200% or more) for very large batch equipment.
     *
     * @return float
     */
    public function getHopUtilization()
    {
        return $this->hopUtilization;
    }

    /**
     * Amount lost to the lauter tun and equipment associated with the lautering process.
     *
     * @param number $lauterDeadspace
     */
    public function setLauterDeadspace($lauterDeadspace)
    {
        $this->lauterDeadspace = $lauterDeadspace;
    }

    /**
     * Amount lost to the lauter tun and equipment associated with the lautering process.
     *
     * @return number
     */
    public function getLauterDeadspace()
    {
        return $this->lauterDeadspace;
    }

    /**
     * Name of the equipment profile – usually a text description of the brewing setup.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Name of the equipment profile – usually a text description of the brewing setup.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Notes associated with the equipment.  May be a multiline entry.
     *
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Notes associated with the equipment.  May be a multiline entry.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Amount normally added to the boil kettle before the boil.
     *
     * @param number $topUpKettle
     */
    public function setTopUpKettle($topUpKettle)
    {
        $this->topUpKettle = $topUpKettle;
    }

    /**
     * Amount normally added to the boil kettle before the boil.
     *
     * @return number
     */
    public function getTopUpKettle()
    {
        return $this->topUpKettle;
    }

    /**
     * @param float $topUpWater
     */
    public function setTopUpWater($topUpWater)
    {
        $this->topUpWater = $topUpWater;
    }

    /**
     * @return float
     */
    public function getTopUpWater()
    {
        return $this->topUpWater;
    }

    /**
     * The amount of wort normally lost during transition from the boiler to the fermentation vessel.  Includes both
     * unusable wort due to trub and wort lost to the chiller and transfer systems.
     *
     * @param float $trubChillerLoss
     */
    public function setTrubChillerLoss($trubChillerLoss)
    {
        $this->trubChillerLoss = $trubChillerLoss;
    }

    /**
     * The amount of wort normally lost during transition from the boiler to the fermentation vessel.  Includes both
     * unusable wort due to trub and wort lost to the chiller and transfer systems.
     *
     * @return float
     */
    public function getTrubChillerLoss()
    {
        return $this->trubChillerLoss;
    }

    /**
     * The specific heat of the mash tun which is usually a function of the material it is made of.  Typical ranges are
     * 0.1-0.25 for metal and 0.2-0.5 for plastic materials.
     *
     * @param float $tunSpecificHeat
     */
    public function setTunSpecificHeat($tunSpecificHeat)
    {
        $this->tunSpecificHeat = $tunSpecificHeat;
    }

    /**
     * The specific heat of the mash tun which is usually a function of the material it is made of.  Typical ranges are
     * 0.1-0.25 for metal and 0.2-0.5 for plastic materials.
     *
     * @return float
     */
    public function getTunSpecificHeat()
    {
        return $this->tunSpecificHeat;
    }

    /**
     * Volume of the mash tun in liters.  This parameter can be used to calculate if a particular mash and grain profile
     * will fit in the mash tun.  It may also be used for thermal calculations in the case of a partially full mash tun.
     *
     * @param float $tunVolume
     */
    public function setTunVolume($tunVolume)
    {
        $this->tunVolume = $tunVolume;
    }

    /**
     * Volume of the mash tun in liters.  This parameter can be used to calculate if a particular mash and grain profile
     * will fit in the mash tun.  It may also be used for thermal calculations in the case of a partially full mash tun.
     *
     * @return float
     */
    public function getTunVolume()
    {
        return $this->tunVolume;
    }

    /**
     * Weight of the mash tun in kilograms.  Used primarily to calculate the thermal parameters of the mash tun – in
     * conjunction with the volume and specific heat.
     *
     * @param float $tunWeight
     */
    public function setTunWeight($tunWeight)
    {
        $this->tunWeight = $tunWeight;
    }

    /**
     * Weight of the mash tun in kilograms.  Used primarily to calculate the thermal parameters of the mash tun – in
     * conjunction with the volume and specific heat.
     *
     * @return float
     */
    public function getTunWeight()
    {
        return $this->tunWeight;
    }

    /**
     * Version of the equipment record.  Should always be "1" for this version of the XML standard.
     *
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Version of the equipment record.  Should always be "1" for this version of the XML standard.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

}