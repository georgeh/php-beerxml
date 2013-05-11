<?php


namespace BeerXML\Parser;


class Fermentable extends Record
{
    protected $tagName = 'FERMENTABLE';

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     *
     * @var array
     */
    protected $simpleProperties = array(
        'NAME'             => 'setName',
        'VERSION'          => 'setVersion',
        'TYPE'             => 'setType',
        'AMOUNT'           => 'setAmount',
        'YIELD'            => 'setYield',
        'COLOR'            => 'setColor',
        'ORIGIN'           => 'setOrigin',
        'SUPPLIER'         => 'setSupplier',
        'NOTES'            => 'setNotes',
        'COARSE_FINE_DIFF' => 'setCoarseFineDiff',
        'MOISTURE'         => 'setMoisture',
        'DIASTATIC_POWER'  => 'setDiastaticPower',
        'PROTEIN'          => 'setProtein',
        'MAX_IN_BATCH'     => 'setMaxInBatch',
        'IBU_GAL_PER_LB'   => 'setIbuGalPerLb',
    );

    /**
     * @return IFermentableWriter
     */
    public function createRecord()
    {
        return $this->recordFactory->getFermentable();
    }

    /**
     * @param IFermentableWriter $record
     */
    protected function otherElementEncountered($record)
    {
        if ('ADD_AFTER_BOIL' == $this->xmlReader->name) {
            $value = ($this->xmlReader->readString() == 'TRUE');
            $record->setAddAfterBoil($value);
        }
        if ('RECOMMEND_MASH' == $this->xmlReader->name) {
            $value = ($this->xmlReader->readString() == 'TRUE');
            $record->setRecommendMash($value);
        }
    }
}
