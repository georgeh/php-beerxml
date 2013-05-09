<?php


namespace BeerXML\Generator;


class Water extends Record
{
    protected $tagName = 'WATER';

    /**
     * @var \BeerXML\Record\Water
     */
    protected $record;

    /**
     * <TAG> => getterMethod
     *
     * @var array
     */
    protected $simpleValues = array(
        'NAME'        => 'getName',
        'VERSION'     => 'getVersion',
        'AMOUNT'      => 'getAmount',
        'CALCIUM'     => 'getCalcium',
        'BICARBONATE' => 'getBicarbonate',
        'SULFATE'     => 'getSulfate',
        'CHLORIDE'    => 'getChloride',
        'SODIUM'      => 'getSodium',
        'MAGNESIUM'   => 'getMagnesium',
    );

    /**
     * <TAG> => getterMethod
     *
     * @var array
     */
    protected $optionalSimpleValues = array(
        'PH'    => 'getPH',
        'NOTES' => 'getNotes',
    );
}