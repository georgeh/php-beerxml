<?php


namespace BeerXML\Parser;


class Fermentable extends Record
{
    protected $tagName = 'FERMENTABLE';

    public function createRecord()
    {
        return new \BeerXML\Record\Fermentable();
    }

}