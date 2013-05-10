<?php


namespace BeerXML\Parser;


class Equipment extends Record
{
    protected $tagName = 'EQUIPMENT';

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     *
     * @var array
     */
    protected $simpleProperties = array(
        'NAME'              => 'setName',
        'VERSION'           => 'setVersion',
        'BOIL_SIZE'         => 'setBoilSize',
        'BATCH_SIZE'        => 'setBatchSize',
        'TUN_VOLUME'        => 'setTunVolume',
        'TUN_WEIGHT'        => 'setTunWeight',
        'TUN_SPECIFIC_HEAT' => 'setTunSpecificHeat',
        'TOP_UP_WATER'      => 'setTopUpWater',
        'TRUB_CHILLER_LOSS' => 'setTrubChillerLoss',
        'EVAP_RATE'         => 'setEvapRate',
        'BOIL_TIME'         => 'setBoilTime',
        'CALC_BOIL_VOLUME'  => 'setCalcBoilVolume',
        'LAUTER_DEADSPACE'  => 'setLauterDeadspace',
        'TOP_UP_KETTLE'     => 'setTopUpKettle',
        'HOP_UTILIZATION'   => 'setHopUtilization',
        'NOTES'             => 'setNotes',
    );

    protected function createRecord()
    {
        return $this->recordFactory->getEquipment();
    }
}