<?php


namespace BeerXML\Parser;


class Fermentable extends Record
{
    protected $tagName = 'FERMENTABLE';

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     * @var array
     */
    protected $simpleProperties = array(
        'NAME'             => 'setName',
        'VERSION'          => 'setVersion',
        'TYPE'             => 'setType',
        'AMOUNT'           => 'setAmount',
        'YIELD'            => 'setYield',
        'COLOR'            => 'setColor',
        'ADD_AFTER_BOIL'   => 'setAddAfterBoil',
        'ORIGIN'           => 'setOrigin',
        'SUPPLIER'         => 'setSupplier',
        'NOTES'            => 'setNotes',
        'COARSE_FINE_DIFF' => 'setCoarseFineDiff',
        'MOISTURE'         => 'setMoisture',
        'DIASTATIC_POWER'  => 'setDiastaticPower',
        'PROTEIN'          => 'setProtein',
        'MAX_IN_BATCH'     => 'setMaxInBatch',
        'RECOMMEND_MASH'   => 'setRecommendMash',
        'IBU_GAL_PER_LB'   => 'setIbuGalPerLb',
    );

    public function createRecord()
    {
        return new \BeerXML\Record\Fermentable();
    }



}