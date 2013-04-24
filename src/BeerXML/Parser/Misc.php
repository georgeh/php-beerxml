<?php


namespace BeerXML\Parser;


class Misc extends Record
{
    protected $tagName = 'MISC';

    protected function createRecord()
    {
        return new \BeerXML\Record\Misc();
    }
}