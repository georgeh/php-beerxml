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
        'NAME'    => 'setName',
        'VERSION' => 'setVersion',
        'TYPE'    => 'setType',
        'USE'     => 'setUse',
        'TIME'    => 'setTime',
        'AMOUNT'  => 'setAmount',
        'USE_FOR' => 'setUseFor',
        'NOTES'   => 'setNotes',
    );

    /**
     * @return IMisc
     */
    protected function createRecord()
    {
        return $this->recordFactory->getMisc();
    }

    /**
     * @param IMisc $record
     */
    protected function otherElementEncountered($record)
    {
        if ('AMOUNT_IS_WEIGHT' == $this->xmlReader->name) {
            $value = ($this->xmlReader->readString() == 'TRUE');
            $record->setAmountIsWeight($value);
        }
    }
}
