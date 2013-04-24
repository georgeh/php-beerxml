<?php


namespace BeerXML\Parser;


class MashStep extends Record
{
    protected $tagName = 'MASH_STEP';

    protected function createRecord()
    {
        return new \BeerXML\Record\MashStep();
    }
}