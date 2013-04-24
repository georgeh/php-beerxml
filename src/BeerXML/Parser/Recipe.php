<?php


namespace BeerXML\Parser;


class Recipe extends Record
{

    protected $tagName = 'RECIPE';

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     * @var array
     */
    protected $simpleProperties = array(
        'AGE'                => 'setAge',
        'AGETEMP'            => 'setAgeTemp',
        'ASSTBREWER'         => 'setAsstBrewer',
        'BATCHSIZE'          => 'setBatchSize',
        'BOILSIZE'           => 'setBoilSize',
        'BOILTIME'           => 'setBoilTime',
        'BREWER'             => 'setBrewer',
        'CARBONATION'        => 'setCarbonation',
        'CARBONATIONTEMP'    => 'setCarbonationTemp',
        'DATE'               => 'setDate',
        'EFFICIENCY'         => 'setEfficiency',
        'FERMENTATIONSTAGES' => 'setFermentationStages',
        'FG'                 => 'setFg',
        'FORCEDCARBONATION'  => 'setForcedCarbonation',
        'KEGPRIMINGFACTOR'   => 'setKegPrimingFactor',
        'NAME'               => 'setName',
        'NOTES'              => 'setNotes',
        'OG'                 => 'setOg',
        'PRIMARYAGE'         => 'setPrimaryAge',
        'PRIMARYTEMP'        => 'setPrimaryTemp',
        'PRIMINGSUGAREQUIV'  => 'setPrimingSugarEquiv',
        'PRIMINGSUGARNAME'   => 'setPrimingSugarName',
        'SECONDARYAGE'       => 'setSecondaryAge',
        'SECONDARYTEMP'      => 'setSecondaryTemp',
        'TASTENOTES'         => 'setTasteNotes',
        'TASTERATING'        => 'setTasteRating',
        'TERTIARYAGE'        => 'setTertiaryAge',
        'TERTIARYTEMP'       => 'setTertiaryTemp',
        'TYPE'               => 'setType',
        'VERSION'            => 'setVersion',
    );

    protected function createRecord()
    {
        return new \BeerXML\Record\Recipe();
    }
}