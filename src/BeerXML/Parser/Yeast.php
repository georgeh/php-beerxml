<?php


namespace BeerXML\Parser;


class Yeast extends Record
{
    protected $tagName = 'YEAST';

    protected function createRecord()
    {
        return new \BeerXML\Record\Yeast();
    }
}