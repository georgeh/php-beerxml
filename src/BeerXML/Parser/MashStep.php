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

    /**
     * @return IMashStep
     */
    protected function createRecord()
    {
        $mashStep = $this->recordFactory->getMashStep();
        if ($mashStep instanceof IMashStepDisplay) {
            $this->simpleProperties = array_merge(
                $this->simpleProperties,
                array(
                    'DESCRIPTION'        => 'setDescription',
                    'WATER_GRAIN_RATIO'  => 'setWaterGrainRatio',
                    'DECOCTION_AMT'      => 'setDecoctionAmt',
                    'INFUSE_TEMP'        => 'setInfuseTemp',
                    'DISPLAY_STEP_TEMP'  => 'setDisplayStepTemp',
                    'DISPLAY_INFUSE_AMT' => 'setDisplayInfuseAmt',
                )
            );
        }
        return $mashStep;
    }
}