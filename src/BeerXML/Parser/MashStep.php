<?php


namespace BeerXML\Parser;


class MashStep extends Record
{
    protected $tagName = 'MASH_STEP';

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     *
     * @var array
     */
    protected $simpleProperties = array(
        'NAME'          => 'setName',
        'VERSION'       => 'setVersion',
        'TYPE'          => 'setType',
        'INFUSE_AMOUNT' => 'setInfuseAmount',
        'STEP_TEMP'     => 'setStepTemp',
        'STEP_TIME'     => 'setStepTime',
        'RAMP_TIME'     => 'setRampTime',
        'END_TEMP'      => 'setEndTemp',
    );

    protected function createRecord()
    {
        return new \BeerXML\Record\MashStep();
    }
}