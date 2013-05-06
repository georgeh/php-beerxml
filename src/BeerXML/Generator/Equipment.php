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

    protected function additionalFields()
    {
        $calcBoilVolume = ($this->record->getCalcBoilVolume()) ? 'TRUE' : 'FALSE';
        $this->xmlWriter->writeElement('CALC_BOIL_VOLUME', $calcBoilVolume);

        parent::additionalFields();
    }

}