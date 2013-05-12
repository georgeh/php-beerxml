<?php


namespace BeerXML\Generator;


class Equipment extends Record
{
    protected $tagName = 'EQUIPMENT';

    /**
     * @var \BeerXML\Record\Equipment
     */
    protected $record;

    /**
     * <TAG> => getterMethod
     *
     * @var array
     */
    protected $simpleValues = array(
        'NAME'       => 'getName',
        'VERSION'    => 'getVersion',
        'BATCH_SIZE' => 'getBatchSize',
        'BOIL_SIZE'  => 'getBoilSize',
    );

    protected $optionalSimpleValues = array(
        'BOIL_TIME'         => 'getBoilTime',
        'TUN_VOLUME'        => 'getTunVolume',
        'TUN_VOLUME'        => 'getTunVolume',
        'TUN_WEIGHT'        => 'getTunWeight',
        'TUN_SPECIFIC_HEAT' => 'getTunSpecificHeat',
        'TOP_UP_WATER'      => 'getTopUpWater',
        'TRUB_CHILLER_LOSS' => 'getTrubChillerLoss',
        'EVAP_RATE'         => 'getEvapRate',
        'LAUTER_DEADSPACE'  => 'getLauterDeadspace',
        'TOP_UP_KETTLE'     => 'getTopUpKettle',
        'HOP_UTILIZATION'   => 'getHopUtilization',
        'NOTES'             => 'getNotes',
    );

    protected $displayInterface = 'BeerXML\Generator\IEquipmentDisplay';

    protected $displayValues = array(
        'DISPLAY_BOIL_SIZE'         => 'getDisplayBoilSize',
        'DISPLAY_BATCH_SIZE'        => 'getDisplayBatchSize',
        'DISPLAY_TUN_VOLUME'        => 'getDisplayTunVolume',
        'DISPLAY_TUN_WEIGHT'        => 'getDisplayTunWeight',
        'DISPLAY_TOP_UP_WATER'      => 'getDisplayTopUpWater',
        'DISPLAY_TRUB_CHILLER_LOSS' => 'getDisplayTrubChillerLoss',
        'DISPLAY_LAUTER_DEADSPACE'  => 'getDisplayLauterDeadspace',
        'DISPLAY_TOP_UP_KETTLE'     => 'getDisplayTopUpKettle',
    );

    protected function additionalFields()
    {
        $this->xmlWriter->writeElement('CALC_BOIL_VOLUME', $this->boolToString($this->record->getCalcBoilVolume()));

        return parent::additionalFields();
    }

}