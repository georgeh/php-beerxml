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
        'LAUTER_DEADSPACE'  => 'setLauterDeadspace',
        'TOP_UP_KETTLE'     => 'setTopUpKettle',
        'HOP_UTILIZATION'   => 'setHopUtilization',
        'NOTES'             => 'setNotes',
    );

    /**
     * @return IEquipment
     */
    protected function createRecord()
    {
        $equipment = $this->recordFactory->getEquipment();
        if ($equipment instanceof IEquipmentDisplay) {
            $this->simpleProperties = array_merge(
                $this->simpleProperties,
                array(
                    'DISPLAY_BOIL_SIZE'         => 'setDisplayBoilSize',
                    'DISPLAY_BATCH_SIZE'        => 'setDisplayBatchSize',
                    'DISPLAY_TUN_VOLUME'        => 'setDisplayTunVolume',
                    'DISPLAY_TUN_WEIGHT'        => 'setDisplayTunWeight',
                    'DISPLAY_TOP_UP_WATER'      => 'setDisplayTopUpWater',
                    'DISPLAY_TRUB_CHILLER_LOSS' => 'setDisplayTrubChillerLoss',
                    'DISPLAY_LAUTER_DEADSPACE'  => 'setDisplayLauterDeadspace',
                    'DISPLAY_TOP_UP_KETTLE'     => 'setDisplayTopUpKettle',
                )
            );
        }
        return $equipment;
    }

    /**
     * @param IEquipment $record
     */
    protected function otherElementEncountered($record)
    {
        if ('CALC_BOIL_VOLUME' == $this->xmlReader->name) {
            $value = ($this->xmlReader->readString() == 'TRUE');
            $record->setCalcBoilVolume($value);
        }
    }
}
