<?php


namespace BeerXML\Generator;


class Misc extends Record
{
    protected $tagName = 'MISC';

    /**
     * @var \BeerXML\Record\Misc
     */
    protected $record;

    /**
     * <TAG> => getterMethod
     * @var array
     */
    protected $simpleValues = array(
        'NAME'             => 'getName',
        'VERSION'          => 'getVersion',
        'TYPE'             => 'getType',
        'USE'              => 'getUse',
        'TIME'             => 'getTime',
        'AMOUNT'           => 'getAmount',

    );

    /**
     * <TAG> => getterMethod
     * @var array
     */
    protected $optionalSimpleValues = array(
        'USE_FOR'          => 'getUseFor',
        'NOTES'            => 'getNotes',
    );

    /**
     * @{inheritDoc}
     */
    protected function additionalFields()
    {
        if ($amountIsWeight = $this->record->getAmountIsWeight()) {
            $this->xmlWriter->writeElement('AMOUNT_IS_WEIGHT', $this->boolToString($amountIsWeight));
        }

        parent::additionalFields();
    }


}