<?php


namespace BeerXML\Generator;


class Recipe extends Record
{
    /**
     * @var \BeerXML\Record\Recipe
     */
    protected $record;
    /**
     * Construct the record in XMLWriter
     * @return null
     */
    public function build()
    {
        $this->xmlWriter->startElement('RECIPE');
        // Simple required elements
        $this->xmlWriter->writeElement('NAME', $this->record->getName());
        $this->xmlWriter->writeElement('VERSION', $this->record->getVersion());
        $this->xmlWriter->writeElement('BREWER', $this->record->getBrewer());
        $this->xmlWriter->writeElement('BATCH_SIZE', $this->record->getBatchSize());
        $this->xmlWriter->writeElement('BOIL_SIZE', $this->record->getBoilSize());
        $this->xmlWriter->writeElement('BOIL_TIME', $this->record->getBoilTime());

        // Simple optional
        $this->xmlWriter->endElement();
    }

}