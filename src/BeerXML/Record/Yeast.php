<?php


namespace BeerXML\Record;


class Yeast
{
    const TYPE_LAGER = 'Lager';
    const TYPE_ALE = 'Ale';
    const TYPE_WHEAT = 'Wheat';
    const TYPE_WINE = 'Wine';
    const TYPE_CHAMPAGNE = 'Champagne';
    const FORM_LIQUID = 'Liquid';
    const FORM_DRY = 'Dry';
    const FORM_SLANT = 'Slant';
    const FORM_CULTURE = 'Culture';
    const FLOCCULATION_LOW = 'Low';
    const FLOCCULATION_MEDIUM = 'Medium';
    const FLOCCULATION_HIGH = 'High';
    const FLOCCULATION_VERY_HIGH = 'Very High';


    /**
     * Name of the yeast.
     *
     * @var string
     */
    private $name;

    /**
     * Version of the standard.  Should be "1" for this version.
     *
     * @var int
     */
    private $version = 1;

    /**
     * May be "Ale", "Lager", "Wheat", "Wine" or "Champagne"
     *
     * @var string
     */
    private $type;

    /**
     * May be "Liquid", "Dry", "Slant" or "Culture"
     *
     * @var string
     */
    private $form;

    /**
     * The amount of yeast, measured in liters.  For a starter this is the size of the starter.  If the flag
     * AMOUNT_IS_WEIGHT is set to TRUE then this measurement is in kilograms and not liters.
     *
     * @var number
     */
    private $amount;

    /**
     * TRUE if the amount measurement is a weight measurement and FALSE if the amount is a volume measurement.  Default
     * value (if not present) is assumed to be FALSE – therefore the yeast measurement is a liquid amount by default.
     *
     * @var bool
     */
    private $amountIsWeight = false;

    /**
     * The name of the laboratory that produced the yeast.
     *
     * @var string
     */
    private $laboratory;

    /**
     * The manufacturer’s product ID label or number that identifies this particular strain of yeast.
     *
     * @var string
     */
    private $productId;

    /**
     * The minimum recommended temperature for fermenting this yeast strain in degrees Celsius.
     *
     * @var number
     */
    private $minTemperature;

    /**
     * The maximum recommended temperature for fermenting this yeast strain in Celsius.
     *
     * @var number
     */
    private $maxTemperature;

    /**
     * May be "Low", "Medium", "High" or "Very High"
     *
     * @var string
     */
    private $flocculation;

    /**
     * Average attenuation for this yeast strain.
     *
     * @var number
     */
    private $attenuation;

    /**
     * Notes on this yeast strain.  May be a multiline entry.
     *
     * @var string
     */
    private $notes;

    /**
     * Styles or types of beer this yeast strain is best suited for.
     *
     * @var string
     */
    private $bestFor;

    /**
     * Number of times this yeast has been reused as a harvested culture.  This number should be zero if this is a
     * product directly from the manufacturer.
     *
     * @var int
     */
    private $timesCultured;

    /**
     * Recommended of times this yeast can be reused (recultured from a previous batch)
     *
     * @var int
     */
    private $maxReuse;

    /**
     * Flag denoting that this yeast was added for a secondary (or later) fermentation as opposed to the primary
     * fermentation.  Useful if one uses two or more yeast strains for a single brew (eg: Lambic).  Default value is
     * FALSE.
     *
     * @var bool
     */
    private $addToSecondary = false;

    /**
     * Flag denoting that this yeast was added for a secondary (or later) fermentation as opposed to the primary
     * fermentation.  Useful if one uses two or more yeast strains for a single brew (eg: Lambic).  Default value is
     * FALSE.
     *
     * @param boolean $addToSecondary
     */
    public function setAddToSecondary($addToSecondary)
    {
        $this->addToSecondary = $addToSecondary;
    }

    /**
     * Flag denoting that this yeast was added for a secondary (or later) fermentation as opposed to the primary
     * fermentation.  Useful if one uses two or more yeast strains for a single brew (eg: Lambic).  Default value is
     * FALSE.
     *
     * @return boolean
     */
    public function getAddToSecondary()
    {
        return $this->addToSecondary;
    }

    /**
     * The amount of yeast, measured in liters.  For a starter this is the size of the starter.  If the flag
     * AMOUNT_IS_WEIGHT is set to TRUE then this measurement is in kilograms and not liters.
     *
     * @param number $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * The amount of yeast, measured in liters.  For a starter this is the size of the starter.  If the flag
     * AMOUNT_IS_WEIGHT is set to TRUE then this measurement is in kilograms and not liters.
     *
     * @return number
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param boolean $amountIsWeight
     */
    public function setAmountIsWeight($amountIsWeight)
    {
        $this->amountIsWeight = $amountIsWeight;
    }

    /**
     * @return boolean
     */
    public function getAmountIsWeight()
    {
        return $this->amountIsWeight;
    }

    /**
     * Average attenuation for this yeast strain.
     *
     * @param number $attenuation
     */
    public function setAttenuation($attenuation)
    {
        $this->attenuation = $attenuation;
    }

    /**
     * Average attenuation for this yeast strain.
     *
     * @return number
     */
    public function getAttenuation()
    {
        return $this->attenuation;
    }

    /**
     * Styles or types of beer this yeast strain is best suited for.
     *
     * @param string $bestFor
     */
    public function setBestFor($bestFor)
    {
        $this->bestFor = $bestFor;
    }

    /**
     * Styles or types of beer this yeast strain is best suited for.
     *
     * @return string
     */
    public function getBestFor()
    {
        return $this->bestFor;
    }

    /**
     * May be "Low", "Medium", "High" or "Very High"
     *
     * @param string $flocculation
     */
    public function setFlocculation($flocculation)
    {
        $this->flocculation = $flocculation;
    }

    /**
     * May be "Low", "Medium", "High" or "Very High"
     *
     * @return string
     */
    public function getFlocculation()
    {
        return $this->flocculation;
    }

    /**
     * May be "Liquid", "Dry", "Slant" or "Culture"
     *
     * @param string $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }

    /**
     * May be "Liquid", "Dry", "Slant" or "Culture"
     *
     * @return string
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * The name of the laboratory that produced the yeast.
     *
     * @param string $laboratory
     */
    public function setLaboratory($laboratory)
    {
        $this->laboratory = $laboratory;
    }

    /**
     * The name of the laboratory that produced the yeast.
     *
     * @return string
     */
    public function getLaboratory()
    {
        return $this->laboratory;
    }

    /**
     * Recommended of times this yeast can be reused (recultured from a previous batch)
     *
     * @param int $maxReuse
     */
    public function setMaxReuse($maxReuse)
    {
        $this->maxReuse = $maxReuse;
    }

    /**
     * Recommended of times this yeast can be reused (recultured from a previous batch)
     *
     * @return int
     */
    public function getMaxReuse()
    {
        return $this->maxReuse;
    }

    /**
     * The maximum recommended temperature for fermenting this yeast strain in Celsius.
     *
     * @param number $maxTemperature
     */
    public function setMaxTemperature($maxTemperature)
    {
        $this->maxTemperature = $maxTemperature;
    }

    /**
     * The maximum recommended temperature for fermenting this yeast strain in Celsius.
     *
     * @return number
     */
    public function getMaxTemperature()
    {
        return $this->maxTemperature;
    }

    /**
     * The minimum recommended temperature for fermenting this yeast strain in degrees Celsius.
     *
     * @param number $minTemperature
     */
    public function setMinTemperature($minTemperature)
    {
        $this->minTemperature = $minTemperature;
    }

    /**
     * The minimum recommended temperature for fermenting this yeast strain in degrees Celsius.
     *
     * @return number
     */
    public function getMinTemperature()
    {
        return $this->minTemperature;
    }

    /**
     * Name of the yeast.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Name of the yeast.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Notes on this yeast strain.  May be a multiline entry.
     *
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Notes on this yeast strain.  May be a multiline entry.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * The manufacturer’s product ID label or number that identifies this particular strain of yeast.
     *
     * @param string $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * The manufacturer’s product ID label or number that identifies this particular strain of yeast.
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Number of times this yeast has been reused as a harvested culture.  This number should be zero if this is a
     * product directly from the manufacturer.
     *
     * @param int $timesCultured
     */
    public function setTimesCultured($timesCultured)
    {
        $this->timesCultured = $timesCultured;
    }

    /**
     * Number of times this yeast has been reused as a harvested culture.  This number should be zero if this is a
     * product directly from the manufacturer.
     *
     * @return int
     */
    public function getTimesCultured()
    {
        return $this->timesCultured;
    }

    /**
     * May be "Ale", "Lager", "Wheat", "Wine" or "Champagne"
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * May be "Ale", "Lager", "Wheat", "Wine" or "Champagne"
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Version of the standard.  Should be "1" for this version.
     *
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Version of the standard.  Should be "1" for this version.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }


}