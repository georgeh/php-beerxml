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
        'NAME'            => 'setName',
        'VERSION'         => 'setVersion',
        'TYPE'            => 'setType',
        'FORM'            => 'setForm',
        'AMOUNT'          => 'setAmount',
        'LABORATORY'      => 'setLaboratory',
        'PRODUCT_ID'      => 'setProductId',
        'MIN_TEMPERATURE' => 'setMinTemperature',
        'FLOCCULATION'    => 'setFlocculation',
        'ATTENUATION'     => 'setAttenuation',
        'NOTES'           => 'setNotes',
        'BEST_FOR'        => 'setBestFor',
        'TIMES_CULTURED'  => 'setTimesCultured',
        'MAX_REUSE'       => 'setMaxReuse',
        'MAX_TEMPERATURE' => 'setMaxTemperature',
    );

    /**
     * @return IYeast
     */
    protected function createRecord()
    {
        return $this->recordFactory->getYeast();
    }

    /**
     * @param IYeast $record
     */
    protected function otherElementEncountered($record)
    {
        if ('AMOUNT_IS_WEIGHT' == $this->xmlReader->name) {
            $value = ($this->xmlReader->readString() == 'TRUE');
            $record->setAmountIsWeight($value);
        }
        if ('ADD_TO_SECONDARY' == $this->xmlReader->name) {
            $value = ($this->xmlReader->readString() == 'TRUE');
            $record->setAddToSecondary($value);
        }
    }
}
