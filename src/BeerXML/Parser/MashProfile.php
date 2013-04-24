<?php


namespace BeerXML\Parser;

class MashProfile extends Record
{
    protected $tagName = 'MASH';

    protected function createRecord()
    {
        return new \BeerXML\Record\MashProfile();
    }
}