<?php


namespace BeerXML\Generator;


class Hop extends Record
{
    protected $tagName = 'HOP';

    /**
     * @var \BeerXML\Record\Hop
     */
    protected $record;

    /**
     * <TAG> => getterMethod
     *
     * @var array
     */
    protected $simpleValues = array(
        'NAME'    => 'getName',
        'VERSION' => 'getVersion',
        'ALPHA'   => 'getAlpha',
        'AMOUNT'  => 'getAmount',
        'USE'     => 'getUse',
        'TIME'    => 'getTime',
    );

    protected $optionalSimpleValues = array(
        'NOTES'         => 'getNotes',
        'TYPE'          => 'getType',
        'FORM'          => 'getForm',
        'BETA'          => 'getBeta',
        'HSI'           => 'getHsi',
        'ORIGIN'        => 'getOrigin',
        'SUBSTITUTES'   => 'getSubstitutes',
        'HUMULENE'      => 'getHumulene',
        'CARYOPHYLLENE' => 'getCaryophyllene',
        'COHUMULONE'    => 'getCohumulone',
        'MYRCENE'       => 'getMyrcene',
    );

    protected $displayInterface = 'BeerXML\Generator\IHopDisplay';

    protected $displayValues = array(
        'DISPLAY_AMOUNT' => 'getDisplayAmount',
        'INVENTORY'      => 'getInventory',
        'DISPLAY_TIME'   => 'getDisplayTime',
    );
}