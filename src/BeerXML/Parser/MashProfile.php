<?php


namespace BeerXML\Parser;

class MashProfile extends Record
{
    protected $tagName = 'MASH';

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     *
     * @var array
     */
    protected $simpleProperties = array(
        'NAME'              => 'setName',
        'VERSION'           => 'setVersion',
        'GRAIN_TEMP'        => 'setGrainTemp',
        'NOTES'             => 'setNotes',
        'TUN_TEMP'          => 'setTunTemp',
        'SPARGE_TEMP'       => 'setSpargeTemp',
        'PH'                => 'setPH',
        'TUN_WEIGHT'        => 'setTunWeight',
        'TUN_SPECIFIC_HEAT' => 'setTunSpecificHeat',
        'EQUIP_ADJUST'      => 'setEquipAdjust',
    );

    protected function createRecord()
    {
        return new \BeerXML\Record\MashProfile();
    }
}