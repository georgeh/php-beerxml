<?php


namespace BeerXML\Record;


use BeerXML\Generator\IFermentableReader;
use BeerXML\Parser\IFermentableWriter;

class Fermentable implements IFermentableReader, IFermentableWriter
{

    const TYPE_GRAIN       = 'Grain';
    const TYPE_SUGAR       = 'Sugar';
    const TYPE_EXTRACT     = 'Extract';
    const TYPE_DRY_EXTRACT = 'Dry Extract';
    const TYPE_ADJUNCT     = 'Adjunct';

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $version = 1;

    /**
     * @var string "Grain", "Sugar", "Extract", "Dry Extract" or "Adjunct"
     */
    private $type;

    /**
     * @var number Weight (kg)
     */
    private $amount;

    /**
     * @var number Percent
     */
    private $yield;

    /**
     * @var float (Lovibond, or SRM for liquid extract)
     */
    private $color;

    /**
     * @var bool
     */
    private $addAfterBoil = false;

    /**
     * @var string
     */
    private $origin;

    /**
     * @var string
     */
    private $supplier;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var number Percent
     */
    private $coarseFineDiff;

    /**
     * @var number Percent
     */
    private $moisture;

    /**
     * @var float Lintner
     */
    private $diastaticPower;

    /**
     * @var number Percent
     */
    private $protein;

    /**
     * @var number Percent
     */
    private $maxInBatch;

    /**
     * @var bool
     */
    private $recommendMash = false;

    /**
     * @var float
     */
    private $ibuGalPerLb;

    /**
     * May be TRUE if this item is normally added after the boil.  The default value is FALSE since most grains are
     * added during the mash or boil.
     *
     * @param boolean $addAfterBoil
     */
    public function setAddAfterBoil($addAfterBoil)
    {
        $this->addAfterBoil = $addAfterBoil;
    }

    /**
     * May be TRUE if this item is normally added after the boil.  The default value is FALSE since most grains are
     * added during the mash or boil.
     *
     * @return boolean
     */
    public function getAddAfterBoil()
    {
        return $this->addAfterBoil;
    }

    /**
     * Weight of the fermentable, extract or sugar in Kilograms.
     *
     * @param number $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Weight of the fermentable, extract or sugar in Kilograms.
     *
     * @return number
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Percent difference between the coarse grain yield and fine grain yield.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @param number $coarseFineDiff
     */
    public function setCoarseFineDiff($coarseFineDiff)
    {
        $this->coarseFineDiff = $coarseFineDiff;
    }

    /**
     * Percent difference between the coarse grain yield and fine grain yield.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @return number
     */
    public function getCoarseFineDiff()
    {
        return $this->coarseFineDiff;
    }

    /**
     * The color of the item in Lovibond Units (SRM for liquid extracts).
     *
     * @param float $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * The color of the item in Lovibond Units (SRM for liquid extracts).
     *
     * @return float
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * The diastatic power of the grain as measured in "Lintner" units.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @param float $diastaticPower
     */
    public function setDiastaticPower($diastaticPower)
    {
        $this->diastaticPower = $diastaticPower;
    }

    /**
     * The diastatic power of the grain as measured in "Lintner" units.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @return float
     */
    public function getDiastaticPower()
    {
        return $this->diastaticPower;
    }

    /**
     * For hopped extracts only - an estimate of the number of IBUs per pound of extract in a gallon of water.
     * To convert to IBUs we multiply this number by the "AMOUNT" field (in pounds) and divide by the number of gallons
     * in the batch.  Based on a sixty minute boil.
     * Only suitable for use with an "Extract" type, otherwise this value is ignored.
     *
     * @param float $ibuGalPerLb
     */
    public function setIbuGalPerLb($ibuGalPerLb)
    {
        $this->ibuGalPerLb = $ibuGalPerLb;
    }

    /**
     * For hopped extracts only - an estimate of the number of IBUs per pound of extract in a gallon of water.
     * To convert to IBUs we multiply this number by the "AMOUNT" field (in pounds) and divide by the number of gallons
     * in the batch.  Based on a sixty minute boil.
     * Only suitable for use with an "Extract" type, otherwise this value is ignored.
     *
     * @return float
     */
    public function getIbuGalPerLb()
    {
        return $this->ibuGalPerLb;
    }

    /**
     * The recommended maximum percentage (by weight) this ingredient should represent in a batch of beer.
     *
     * @param number $maxInBatch
     */
    public function setMaxInBatch($maxInBatch)
    {
        $this->maxInBatch = $maxInBatch;
    }

    /**
     * The recommended maximum percentage (by weight) this ingredient should represent in a batch of beer.
     *
     * @return number
     */
    public function getMaxInBatch()
    {
        return $this->maxInBatch;
    }

    /**
     * Percent moisture in the grain.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @param number $moisture
     */
    public function setMoisture($moisture)
    {
        $this->moisture = $moisture;
    }

    /**
     * Percent moisture in the grain.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @return number
     */
    public function getMoisture()
    {
        return $this->moisture;
    }

    /**
     * Name of the fermentable.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Name of the fermentable.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Textual noted describing this ingredient and its use.  May be multiline.
     *
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Textual noted describing this ingredient and its use.  May be multiline.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Country or place of origin
     *
     * @param string $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    /**
     * Country or place of origin
     *
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * The percent protein in the grain.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @param number $protein
     */
    public function setProtein($protein)
    {
        $this->protein = $protein;
    }

    /**
     * The percent protein in the grain.
     * Only appropriate for a "Grain" or "Adjunct" type, otherwise this value is ignored.
     *
     * @return number
     */
    public function getProtein()
    {
        return $this->protein;
    }

    /**
     * TRUE if it is recommended the grain be mashed, FALSE if it can be steeped.
     * A value of TRUE is only appropriate for a "Grain" or "Adjunct" types.  The default value is FALSE.
     * Note that this does NOT indicate whether the grain is mashed or not – it is only a recommendation used in recipe
     * formulation.
     *
     * @param boolean $recommendMash
     */
    public function setRecommendMash($recommendMash)
    {
        $this->recommendMash = $recommendMash;
    }

    /**
     * TRUE if it is recommended the grain be mashed, FALSE if it can be steeped.
     * A value of TRUE is only appropriate for a "Grain" or "Adjunct" types.  The default value is FALSE.
     * Note that this does NOT indicate whether the grain is mashed or not – it is only a recommendation used in recipe
     * formulation.
     *
     * @return boolean
     */
    public function getRecommendMash()
    {
        return $this->recommendMash;
    }

    /**
     * Supplier of the grain/extract/sugar
     *
     * @param string $supplier
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * Supplier of the grain/extract/sugar
     *
     * @return string
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * May be "Grain", "Sugar", "Extract", "Dry Extract" or "Adjunct".  Extract refers to liquid extract.
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * May be "Grain", "Sugar", "Extract", "Dry Extract" or "Adjunct".  Extract refers to liquid extract.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Should be set to 1 for this version of the XML standard.
     * May be a higher number for later versions but all later versions shall be backward compatible.
     *
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Should be set to 1 for this version of the XML standard.
     * May be a higher number for later versions but all later versions shall be backward compatible.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Percent dry yield (fine grain) for the grain, or the raw yield by weight if this is an extract adjunct or sugar.
     *
     * @param number $yield
     */
    public function setYield($yield)
    {
        $this->yield = $yield;
    }

    /**
     * Percent dry yield (fine grain) for the grain, or the raw yield by weight if this is an extract adjunct or sugar.
     *
     * @return number
     */
    public function getYield()
    {
        return $this->yield;
    }


}