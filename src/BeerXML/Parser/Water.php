<?php


namespace BeerXML\Parser;


class Water extends Record
{
    protected $tagName = 'WATER';

    protected function createRecord()
    {
        return new \BeerXML\Record\Water();
    }
}