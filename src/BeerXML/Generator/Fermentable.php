<?php


namespace BeerXML\Generator;


class Fermentable extends Record
{

    protected $tagName = 'FERMENTABLE';

    /**
     * @var \BeerXML\Record\Fermentable
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
        'TYPE'    => 'getType',
        'AMOUNT'  => 'getAmount',
        'YIELD'   => 'getYield',
        'COLOR'   => 'getColor',
    );

    protected $optionalSimpleValues = array(
        'ORIGIN'           => 'getOrigin',
        'SUPPLIER'         => 'getSupplier',
        'NOTES'            => 'getNotes',
        'COARSE_FINE_DIFF' => 'getCoarseFineDiff',
        'MOISTURE'         => 'getMoisture',
        'DIASTATIC_POWER'  => 'getDiastaticPower',
        'PROTEIN'          => 'getProtein',
        'MAX_IN_BATCH'     => 'getMaxInBatch',
        'IBU_GAL_PER_LB'   => 'getIbuGalPerLb',
    );

    protected $displayInterface = 'BeerXML\Generator\IFermentableDisplay';

    protected $displayValues = array(
        'DISPLAY_AMOUNT' => 'getDisplayAmount',
        'POTENTIAL'      => 'getPotential',
        'INVENTORY'      => 'getInventory',
        'DISPLAY_COLOR'  => 'getDisplayColor',
    );

    /**
     * @{inheritDoc}
     */
    protected function additionalFields()
    {
        $this->xmlWriter->writeElement('ADD_AFTER_BOIL', $this->boolToString($this->record->getAddAfterBoil()));
        $this->xmlWriter->writeElement('MAX_IN_BATCH', $this->boolToString($this->record->getRecommendMash()));

        return parent::additionalFields();
    }
}