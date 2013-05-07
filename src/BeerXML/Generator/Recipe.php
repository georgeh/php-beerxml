<?php


namespace BeerXML\Generator;


class Recipe extends Record
{
    protected $tagName = 'RECIPE';

    /**
     * @var \BeerXML\Record\Recipe
     */
    protected $record;

    /**
     * <TAG> => getterMethod
     * @var array
     */
    protected $simpleValues = array(
        'NAME'       => 'getName',
        'VERSION'    => 'getVersion',
        'BREWER'     => 'getBrewer',
        'BATCH_SIZE' => 'getBatchSize',
        'BOIL_SIZE'  => 'getBoilSize',
        'BOIL_TIME'  => 'getBoilTime',
    );

    /**
     * <TAG> => getterMethod
     * @var array
     */
    protected $optionalSimpleValues = array(
        'ASST_BREWER'         => 'getAsstBrewer',
        'NOTES'               => 'getNotes',
        'TASTE_NOTES'         => 'getTasteNotes',
        'TASTE_RATING'        => 'getTasteRating',
        'OG'                  => 'getOg',
        'FG'                  => 'getFg',
        'FERMENTATION_STAGES' => 'getFermentationStages',
        'PRIMARY_AGE'         => 'getPrimaryAge',
        'PRIMARY_TEMP'        => 'getPrimaryTemp',
        'SECONDARY_AGE'       => 'getSecondaryAge',
        'SECONDARY_TEMP'      => 'getSecondaryTemp',
        'TERTIARY_AGE'        => 'getTertiaryAge',
        'TERTIARY_TEMP'       => 'getTertiaryTemp',
        'AGE'                 => 'getAge',
        'AGE_TEMP'            => 'getAgeTemp',
        'DATE'                => 'getDate',
        'CARBONATION'         => 'getCarbonation',
        'FORCED_CARBONATION'  => 'getForcedCarbonation',
        'PRIMING_SUGAR_NAME'  => 'getPrimingSugarName',
        'CARBONATION_TEMP'    => 'getCarbonationTemp',
        'PRIMING_SUGAR_EQUIV' => 'getPrimingSugarEquiv',
        'KEG_PRIMING_FACTOR'  => 'getKegPrimingFactor',
    );

    protected $complexValueSets = array(
        'HOPS'         => array('generator' => 'BeerXML\Generator\Hop', 'values' => 'getHops'),
        'FERMENTABLES' => array('generator' => 'BeerXML\Generator\Fermentable', 'values' => 'getFermentables'),
        'MISCS'        => array('generator' => 'BeerXML\Generator\Misc', 'values' => 'getMiscs'),
        'YEASTS'       => array('generator' => 'BeerXML\Generator\Yeast', 'values' => 'getYeasts'),
        'WATERS'       => array('generator' => 'BeerXML\Generator\Water', 'values' => 'getWaters'),
    );

    /**
     * @{inheritDoc}
     */
    protected function additionalFields()
    {
        $efficiency = $this->record->getEfficiency();
        if (!empty($efficiency) ||
            \BeerXML\Record\Recipe::TYPE_ALL_GRAIN == $this->record->getType() ||
            \BeerXML\Record\Recipe::TYPE_PARTIAL_MASH == $this->record->getType()
        ) {
            $this->xmlWriter->writeElement('EFFICIENCY', $efficiency);
        }
        parent::additionalFields();
    }


}