<?php


namespace BeerXML\Generator;


abstract class Record {
    /**
     * @var \XMLWriter
     */
    protected $xmlWriter;

    protected $record;

    /**
     * @param \XMLWriter $xmlWriter
     */
    public function setXmlWriter($xmlWriter)
    {
        $this->xmlWriter = $xmlWriter;
    }

    public function setRecord($record)
    {
        $this->record = $record;
    }

    /**
     * Construct the record in XMLWriter
     * @return null
     */
    abstract public function build();
}