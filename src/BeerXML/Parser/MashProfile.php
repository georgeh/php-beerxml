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
    );

    /**
     * @return IMashProfileWriter
     */
    protected function createRecord()
    {
        return $this->recordFactory->getMashProfile();
    }

    /**
     * @param IMashProfileWriter $record
     */
    protected function otherElementEncountered($record)
    {
        if ('EQUIP_ADJUST' == $this->xmlReader->name) {
            $value = ($this->xmlReader->readString() == 'TRUE');
            $record->setEquipAdjust($value);
        }
    }
}
