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

    /**
     * @return IWater
     */
    protected function createRecord()
    {
        $water = $this->recordFactory->getWater();
        if ($water instanceof IWaterDisplay) {
            $this->simpleProperties = array_merge(
                $this->simpleProperties,
                array(
                    'DISPLAY_AMOUNT' => 'setDisplayAmount',
                )
            );
        }
        return $water;
    }
}