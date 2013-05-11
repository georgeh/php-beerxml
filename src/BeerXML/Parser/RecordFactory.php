<?php


namespace BeerXML\Parser;


/**
 * Factory for record classes. \BeerXML\Parser uses this (or a subclass of this) to create objects to store the data it
 * finds.
 *
 * If you want \BeerXML\Parser to write into different classes, implement the Writer interfaces in this directory in
 * your objects, subclass this Factory class so that it returns the objects you want, and then pass it into
 * \BeerXML\Parser
 *
 * @package BeerXML\Parser
 */
class RecordFactory {

    /**
     * @return IEquipment
     */
    public function getEquipment()
    {
        return new \BeerXML\Record\Equipment();
    }

    /**
     * @return IFermentable
     */
    public function getFermentable()
    {
        return new \BeerXML\Record\Fermentable();
    }

    /**
     * @return IHop
     */
    public function getHop()
    {
        return new \BeerXML\Record\Hop();
    }

    /**
     * @return IMashProfile
     */
    public function getMashProfile()
    {
        return new \BeerXML\Record\MashProfile();
    }

    /**
     * @return IMashStep
     */
    public function getMashStep()
    {
        return new \BeerXML\Record\MashStep();
    }

    /**
     * @return IMisc
     */
    public function getMisc()
    {
        return new \BeerXML\Record\Misc();
    }

    /**
     * @return IRecipe
     */
    public function getRecipe()
    {
        return new \BeerXML\Record\Recipe();
    }

    /**
     * @return IStyleWriter
     */
    public function getStyle()
    {
        return new \BeerXML\Record\Style();
    }

    /**
     * @return IWater
     */
    public function getWater()
    {
        return new \BeerXML\Record\Water();
    }

    /**
     * @return IYeast
     */
    public function getYeast()
    {
        return new \BeerXML\Record\Yeast();
    }
}
