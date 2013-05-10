<?php


namespace BeerXML\Parser;

use BeerXML\Record\Equipment;
use BeerXML\Record\Fermentable;
use BeerXML\Record\Hop;
use BeerXML\Record\MashProfile;
use BeerXML\Record\MashStep;
use BeerXML\Record\Misc;
use BeerXML\Record\Recipe;
use BeerXML\Record\Style;
use BeerXML\Record\Water;
use BeerXML\Record\Yeast;

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
        return new Equipment();
    }

    /**
     * @return IFermentableWriter
     */
    public function getFermentable()
    {
        return new Fermentable();
    }

    /**
     * @return IHopWriter
     */
    public function getHop()
    {
        return new Hop();
    }

    /**
     * @return IMashProfileWriter
     */
    public function getMashProfile()
    {
        return new MashProfile();
    }

    /**
     * @return IMashStepWriter
     */
    public function getMashStep()
    {
        return new MashStep();
    }

    /**
     * @return IMiscWriter
     */
    public function getMisc()
    {
        return new Misc();
    }

    /**
     * @return IRecipeWriter
     */
    public function getRecipe()
    {
        return new Recipe();
    }

    /**
     * @return IStyleWriter
     */
    public function getStyle()
    {
        return new Style();
    }

    /**
     * @return IWaterWriter
     */
    public function getWater()
    {
        return new Water();
    }

    /**
     * @return IYeastWriter
     */
    public function getYeast()
    {
        return new Yeast();
    }
}