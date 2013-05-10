<?php


namespace BeerXML\Parser;


class Yeast extends Record
{
    protected $tagName = 'YEAST';

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     *
     * @var array
     */
    protected $simpleProperties = array(
        'NAME'             => 'setName',
        'VERSION'          => 'setVersion',
        'TYPE'             => 'setType',
        'FORM'             => 'setForm',
        'AMOUNT'           => 'setAmount',
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

    protected function createRecord()
    {
        return $this->recordFactory->getYeast();
    }
}