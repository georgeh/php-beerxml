<?php


namespace BeerXML\Parser;


use BeerXML\Exception\BadData;

class Recipe extends Record
{
    protected $tagName = 'RECIPE';

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     *
     * @var array
     */
    protected $simpleProperties = array(
        'AGE'                 => 'setAge',
        'AGE_TEMP'            => 'setAgeTemp',
        'ASST_BREWER'         => 'setAsstBrewer',
        'BATCH_SIZE'          => 'setBatchSize',
        'BOIL_SIZE'           => 'setBoilSize',
        'BOIL_TIME'           => 'setBoilTime',
        'BREWER'              => 'setBrewer',
        'CARBONATION'         => 'setCarbonation',
        'CARBONATION_TEMP'    => 'setCarbonationTemp',
        'EFFICIENCY'          => 'setEfficiency',
        'FERMENTATION_STAGES' => 'setFermentationStages',
        'FG'                  => 'setFg',
        'KEG_PRIMING_FACTOR'  => 'setKegPrimingFactor',
        'NAME'                => 'setName',
        'NOTES'               => 'setNotes',
        'OG'                  => 'setOg',
        'PRIMARY_AGE'         => 'setPrimaryAge',
        'PRIMARY_TEMP'        => 'setPrimaryTemp',
        'PRIMING_SUGAR_EQUIV' => 'setPrimingSugarEquiv',
        'PRIMING_SUGAR_NAME'  => 'setPrimingSugarName',
        'SECONDARY_AGE'       => 'setSecondaryAge',
        'SECONDARY_TEMP'      => 'setSecondaryTemp',
        'TASTE_NOTES'         => 'setTasteNotes',
        'TASTE_RATING'        => 'setTasteRating',
        'TERTIARY_AGE'        => 'setTertiaryAge',
        'TERTIARY_TEMP'       => 'setTertiaryTemp',
        'TYPE'                => 'setType',
        'VERSION'             => 'setVersion',
    );

    /**
     * @return IRecipe
     */
    protected function createRecord()
    {
        $recipe = $this->recordFactory->getRecipe();
        if ($recipe instanceof IRecipeDisplay) {
            $this->simpleProperties = array_merge(
                $this->simpleProperties,
                array(
                    'EST_OG'                 => 'setEstOg',
                    'EST_FG'                 => 'setEstFg',
                    'EST_COLOR'              => 'setEstColor',
                    'IBU'                    => 'setIbu',
                    'IBU_METHOD'             => 'setIbuMethod',
                    'EST_ABV'                => 'setEstAbv',
                    'ABV'                    => 'setAbv',
                    'ACTUAL_EFFICIENCY'      => 'setActualEfficiency',
                    'CALORIES'               => 'setCalories',
                    'DISPLAY_BATCH_SIZE'     => 'setDisplayBatchSize',
                    'DISPLAY_BOIL_SIZE'      => 'setDisplayBoilSize',
                    'DISPLAY_OG'             => 'setDisplayOg',
                    'DISPLAY_FG'             => 'setDisplayFg',
                    'DISPLAY_PRIMARY_TEMP'   => 'setDisplayPrimaryTemp',
                    'DISPLAY_SECONDARY_TEMP' => 'setDisplaySecondaryTemp',
                    'DISPLAY_TERTIARY_TEMP'  => 'setDisplayTertiaryTemp',
                    'DISPLAY_AGE_TEMP'       => 'setDisplayAgeTemp',
                    'CARBONATION_USED'       => 'setCarbonationUsed',
                    'DISPLAY_CARB_TEMP'      => 'setDisplayCarbTemp',
                )
            );
        }
        return $recipe;
    }

    /**
     * @param IRecipe $record
     */
    protected function otherElementEncountered($record)
    {
        if ('FORCED_CARBONATION' == $this->xmlReader->name) {
            $carb = ($this->xmlReader->readString() == 'TRUE');
            $record->setForcedCarbonation($carb);
        } elseif ('DATE' == $this->xmlReader->name) {
            $dateTimeString = $this->xmlReader->readString();
            $record->setDate($this->parseDateString($dateTimeString));
        }
    }
}
