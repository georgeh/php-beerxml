<?php


namespace BeerXML\Parser;


class Misc extends Record
{
    protected $tagName = 'MISC';

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     *
     * @var array
     */
    protected $simpleProperties = array(
        'NAME'             => 'setName',
        'VERSION'          => 'setVersion',
        'TYPE'             => 'setType',
        'USE'              => 'setUse',
        'TIME'             => 'setTime',
        'AMOUNT'           => 'setAmount',
        'AMOUNT_IS_WEIGHT' => 'setAmountIsWeight',
        'USE_FOR'          => 'setUseFor',
        'NOTES'            => 'setNotes',
    );

    protected function createRecord()
    {
        return $this->recordFactory->getMisc();
    }
}