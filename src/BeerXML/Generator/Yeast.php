<?php


namespace BeerXML\Generator;


class Yeast extends Record
{
    protected $tagName = 'YEAST';

    /**
     * @var \BeerXML\Record\Yeast
     */
    protected $record;

    /**
     * <TAG> => getterMethod
     * @var array
     */
    protected $simpleValues = array(
        'NAME'    => 'setName',
        'VERSION' => 'setVersion',
        'TYPE'    => 'setType',
        'FORM'    => 'setForm',
        'AMOUNT'  => 'setAmount',
    );

    /**
     * <TAG> => getterMethod
     * @var array
     */
    protected $optionalSimpleValues = array(
        'AMOUNT_IS_WEIGHT' => 'setAmountIsWeight',
        'LABORATORY'       => 'setLaboratory',
        'PRODUCT_ID'       => 'setProductId',
        'MIN_TEMPERATURE'  => 'setMinTemperature',
        'FLOCCULATION'     => 'setFlocculation',
        'ATTENUATION'      => 'setAttenuation',
        'NOTES'            => 'setNotes',
        'BEST_FOR'         => 'setBestFor',
        'TIMES_CULTURED'   => 'setTimesCultured',
        'MAX_REUSE'        => 'setMaxReuse',
        'MAX_TEMPERATURE'  => 'setMaxTemperature',
        'ADD_TO_SECONDARY' => 'setAddToSecondary',
    );

    /**
     * @{inheritDoc}
     */
    protected function additionalFields()
    {
        $amountIsWeight = $this->record->getAmountIsWeight();
        if (!is_null($amountIsWeight)) {
            $this->xmlWriter->writeElement('AMOUNT_IS_WEIGHT', $this->boolToString($amountIsWeight));
        }

        $addToSecondary = $this->record->getAddToSecondary();
        if (!is_null($addToSecondary)) {
            $this->xmlWriter->writeElement('ADD_TO_SECONDARY', $this->boolToString($addToSecondary));
        }

        return parent::additionalFields();
    }
}