<?php


namespace BeerXML\Generator;


class Yeast extends Record
{
    protected $tagName = 'YEAST';

    /**
     * @var \BeerXML\Record\Yeast
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
        'FORM'    => 'getForm',
        'AMOUNT'  => 'getAmount',
    );

    /**
     * <TAG> => getterMethod
     *
     * @var array
     */
    protected $optionalSimpleValues = array(
        'AMOUNT_IS_WEIGHT' => 'getAmountIsWeight',
        'LABORATORY'       => 'getLaboratory',
        'PRODUCT_ID'       => 'getProductId',
        'MIN_TEMPERATURE'  => 'getMinTemperature',
        'FLOCCULATION'     => 'getFlocculation',
        'ATTENUATION'      => 'getAttenuation',
        'NOTES'            => 'getNotes',
        'BEST_FOR'         => 'getBestFor',
        'TIMES_CULTURED'   => 'getTimesCultured',
        'MAX_REUSE'        => 'getMaxReuse',
        'MAX_TEMPERATURE'  => 'getMaxTemperature',
        'ADD_TO_SECONDARY' => 'getAddToSecondary',
    );

    protected $displayInterface = 'BeerXML\Generator\IYeastDisplay';

    protected $displayValues = array(
        'DISPLAY_AMOUNT' => 'getDisplayAmount',
        'DISP_MIN_TEMP'  => 'getDispMinTemp',
        'DISP_MAX_TEMP'  => 'getDispMaxTemp',
        'INVENTORY'      => 'getInventory',
    );


    /**
     * @{inheritDoc}
     */
    protected function additionalFields()
    {
        $amountIsWeight = $this->record->getAmountIsWeight();
        if (!is_null($amountIsWeight)) {
            $this->xmlWriter->writeElement('AMOUNT_IS_WEIGHT', $this->boolToString($amountIsWeight));
        }

        $addToSecondary = $this->record->getAddToSecondary();
        if (!is_null($addToSecondary)) {
            $this->xmlWriter->writeElement('ADD_TO_SECONDARY', $this->boolToString($addToSecondary));
        }

        if ($this->record instanceof $this->displayInterface) {
            $cultureDate = $this->record->getCultureDate();
            if ($cultureDate instanceof \DateTime) {
                $this->xmlWriter->writeElement('CULTURE_DATE', $cultureDate->format('d M y'));
            }
        }

        parent::additionalFields();
    }
}