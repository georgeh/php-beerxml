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
     * @return IEquipmentWriter
     */
    public function getEquipment()
    {
        return new \BeerXML\Record\Equipment();
    }

    /**
     * @return IFermentableWriter
     */
    public function getFermentable()
    {
        return new \BeerXML\Record\Fermentable();
    }

    /**
     * @return IHopWriter
     */
    public function getHop()
    {
        return new \BeerXML\Record\Hop();
    }

    /**
     * @return IMashProfileWriter
     */
    public function getMashProfile()
    {
        return new \BeerXML\Record\MashProfile();
    }

    /**
     * @return IMashStepWriter
     */
    public function getMashStep()
    {
        return new \BeerXML\Record\MashStep();
    }

    /**
     * @return IMiscWriter
     */
    public function getMisc()
    {
        return new \BeerXML\Record\Misc();
    }

    /**
     * @return IRecipeWriter
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
     * @return IWaterWriter
     */
    public function getWater()
    {
        return new \BeerXML\Record\Water();
    }

    /**
     * @return IYeastWriter
     */
    public function getYeast()
    {
        return new \BeerXML\Record\Yeast();
    }
}
