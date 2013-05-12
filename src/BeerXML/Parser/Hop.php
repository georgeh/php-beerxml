<?php


namespace BeerXML\Parser;


class Hop extends Record
{
    protected $tagName = 'HOP';

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     *
     * @var array
     */
    protected $simpleProperties = array(
        'NAME'          => 'setName',
        'VERSION'       => 'setVersion',
        'ALPHA'         => 'setAlpha',
        'AMOUNT'        => 'setAmount',
        'USE'           => 'setUse',
        'TIME'          => 'setTime',
        'NOTES'         => 'setNotes',
        'TYPE'          => 'setType',
        'FORM'          => 'setForm',
        'BETA'          => 'setBeta',
        'HSI'           => 'setHsi',
        'ORIGIN'        => 'setOrigin',
        'SUBSTITUTES'   => 'setSubstitutes',
        'HUMULENE'      => 'setHumulene',
        'CARYOPHYLLENE' => 'setCaryophyllene',
        'COHUMULONE'    => 'setCohumulone',
        'MYRCENE'       => 'setMyrcene',
    );

    /**
     * @return IHop
     */
    protected function createRecord()
    {
        $hop = $this->recordFactory->getHop();
        if ($hop instanceof IHopDisplay) {
            $this->simpleProperties = array_merge(
                $this->simpleProperties,
                array(
                    'DISPLAY_AMOUNT' => 'setDisplayAmount',
                    'INVENTORY'      => 'setInventory',
                    'DISPLAY_TIME'   => 'setDisplayTime',
                )
            );
        }
        return $hop;
    }
}