<?php


namespace BeerXML\Parser;


class Hop extends Record
{
    protected $tagName = 'HOP';

    protected function createRecord()
    {
        return new \BeerXML\Record\Hop();
    }


}