<?php


namespace BeerXML\Generator;


class MashStep extends Record
{
    protected $tagName = 'MASH_STEP';

    /**
     * @var \BeerXML\Record\MashStep
     */
    protected $record;

    /**
     * <TAG> => getterMethod
     * @var array
     */
    protected $simpleValues = array(
        'NAME'          => 'getName',
        'VERSION'       => 'getVersion',
        'TYPE'          => 'getType',
        'INFUSE_AMOUNT' => 'getInfuseAmount',
        'STEP_TEMP'     => 'getStepTemp',
        'STEP_TIME'     => 'getStepTime',
    );

    /**
     * <TAG> => getterMethod
     * @var array
     */
    protected $optionalSimpleValues = array(
        'RAMP_TIME' => 'getRampTime',
        'END_TEMP'  => 'getEndTemp',
    );

    /**
     * @{inheritDoc}
     */
    protected function additionalFields()
    {
        if (\BeerXML\Record\MashStep::TYPE_DECOCTION != $this->record->getType()) {
            $this->xmlWriter->writeElement('INFUSE_AMOUNT', $this->record->getInfuseAmount());
        }

        return parent::additionalFields();
    }

}