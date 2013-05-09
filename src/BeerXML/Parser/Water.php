<?php


namespace BeerXML\Parser;


class Water extends Record
{
    protected $tagName = 'WATER';

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     *
     * @var array
     */
    protected $simpleProperties = array(
        'NAME'        => 'setName',
        'VERSION'     => 'setVersion',
        'AMOUNT'      => 'setAmount',
        'CALCIUM'     => 'setCalcium',
        'BICARBONATE' => 'setBicarbonate',
        'SULFATE'     => 'setSulfate',
        'CHLORIDE'    => 'setChloride',
        'SODIUM'      => 'setSodium',
        'MAGNESIUM'   => 'setMagnesium',
        'PH'          => 'setPH',
        'NOTES'       => 'setNotes',
    );

    protected function createRecord()
    {
        return new \BeerXML\Record\Water();
    }
}