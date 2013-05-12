<?php


namespace BeerXML\Generator;


class MashProfile extends Record
{
    protected $tagName = 'MASH';

    /**
     * @var \BeerXML\Record\MashProfile
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
        'GRAIN_TEMP' => 'getGrainTemp',
    );

    protected $optionalSimpleValues = array(
        'NOTES'             => 'getNotes',
        'TUN_TEMP'          => 'getTunTemp',
        'SPARGE_TEMP'       => 'getSpargeTemp',
        'PH'                => 'getPH',
        'TUN_WEIGHT'        => 'getTunWeight',
        'TUN_SPECIFIC_HEAT' => 'getTunSpecificHeat',
    );

    protected $complexValueSets = array(
        'MASH_STEPS' => array('generator' => 'BeerXML\Generator\MashStep', 'values' => 'getMashSteps'),
    );

    protected $displayInterface = 'BeerXML\Generator\IMashProfileDisplay';

    protected $displayValues = array(
        'DISPLAY_GRAIN_TEMP'  => 'getDisplayGrainTemp',
        'DISPLAY_TUN_TEMP'    => 'getDisplayTunTemp',
        'DISPLAY_SPARGE_TEMP' => 'getDisplaySpargeTemp',
        'DISPLAY_TUN_WEIGHT'  => 'getDisplayTunWeight',
    );

    /**
     * @{inheritDoc}
     */
    protected function additionalFields()
    {
        $this->xmlWriter->writeElement('EQUIP_ADJUST', $this->boolToString($this->record->getEquipAdjust()));
    }

}