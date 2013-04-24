<?php


namespace BeerXML\Record;


class Yeast
{
    const TYPE_LAGER             = 'Lager';
    const TYPE_ALE               = 'Ale';
    const TYPE_WHEAT             = 'Wheat';
    const TYPE_WINE              = 'Wine';
    const TYPE_CHAMPAGNE         = 'Champagne';
    const FORM_LIQUID            = 'Liquid';
    const FORM_DRY               = 'Dry';
    const FORM_SLANT             = 'Slant';
    const FORM_CULTURE           = 'Culture';
    const FLOCCULATION_LOW       = 'Low';
    const FLOCCULATION_MEDIUM    = 'Medium';
    const FLOCCULATION_HIGH      = 'High';
    const FLOCCULATION_VERY_HIGH = 'Very High';


    /**
     * Name of the yeast.
     * @var string
     */
    private $name;

    /**
     * Version of the standard.  Should be "1” for this version.
     * @var int
     */
    private $version = 1;

    /**
     * May be "Ale”, "Lager”, "Wheat”, "Wine” or "Champagne”
     * @var string
     */
    private $type;

    /**
     * May be "Liquid”, "Dry”, "Slant” or "Culture”
     * @var string
     */
    private $form;

    /**
     * The amount of yeast, measured in liters.  For a starter this is the size of the starter.  If the flag
     * AMOUNT_IS_WEIGHT is set to TRUE then this measurement is in kilograms and not liters.
     * @var number
     */
    private $amount;

    /**
     * TRUE if the amount measurement is a weight measurement and FALSE if the amount is a volume measurement.  Default
     * value (if not present) is assumed to be FALSE – therefore the yeast measurement is a liquid amount by default.
     * @var bool
     */
    private $amountIsWeight = false;

    /**
     * The name of the laboratory that produced the yeast.
     * @var string
     */
    private $laboratory;

    /**
     * The manufacturer’s product ID label or number that identifies this particular strain of yeast.
     * @var string
     */
    private $productId;

    /**
     * The minimum recommended temperature for fermenting this yeast strain in degrees Celsius.
     * @var number
     */
    private $minTemperature;

    /**
     * The maximum recommended temperature for fermenting this yeast strain in Celsius.
     * @var number
     */
    private $maxTemperature;

    /**
     * May be "Low”, "Medium”, "High” or "Very High”
     * @var string
     */
    private $flocculation;

    /**
     * Average attenuation for this yeast strain.
     * @var number
     */
    private $attenuation;

    /**
     * Notes on this yeast strain.  May be a multiline entry.
     * @var string
     */
    private $notes;

    /**
     * Styles or types of beer this yeast strain is best suited for.
     * @var string
     */
    private $bestFor;

    /**
     * Number of times this yeast has been reused as a harvested culture.  This number should be zero if this is a
     * product directly from the manufacturer.
     * @var int
     */
    private $timesCultured;

    /**
     * Recommended of times this yeast can be reused (recultured from a previous batch)
     * @var int
     */
    private $maxReuse;

    /**
     * Flag denoting that this yeast was added for a secondary (or later) fermentation as opposed to the primary
     * fermentation.  Useful if one uses two or more yeast strains for a single brew (eg: Lambic).  Default value is
     * FALSE.
     * @var bool
     */
    private $addToSecondary = false;

    /**
     * @param boolean $addToSecondary
     */
    public function setAddToSecondary($addToSecondary)
    {
        $this->addToSecondary = $addToSecondary;
    }

    /**
     * @return boolean
     */
    public function getAddToSecondary()
    {
        return $this->addToSecondary;
    }

    /**
     * @param number $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
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
     * @param number $attenuation
     */
    public function setAttenuation($attenuation)
    {
        $this->attenuation = $attenuation;
    }

    /**
     * @return number
     */
    public function getAttenuation()
    {
        return $this->attenuation;
    }

    /**
     * @param string $bestFor
     */
    public function setBestFor($bestFor)
    {
        $this->bestFor = $bestFor;
    }

    /**
     * @return string
     */
    public function getBestFor()
    {
        return $this->bestFor;
    }

    /**
     * @param string $flocculation
     */
    public function setFlocculation($flocculation)
    {
        $this->flocculation = $flocculation;
    }

    /**
     * @return string
     */
    public function getFlocculation()
    {
        return $this->flocculation;
    }

    /**
     * @param string $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }

    /**
     * @return string
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param string $laboratory
     */
    public function setLaboratory($laboratory)
    {
        $this->laboratory = $laboratory;
    }

    /**
     * @return string
     */
    public function getLaboratory()
    {
        return $this->laboratory;
    }

    /**
     * @param int $maxReuse
     */
    public function setMaxReuse($maxReuse)
    {
        $this->maxReuse = $maxReuse;
    }

    /**
     * @return int
     */
    public function getMaxReuse()
    {
        return $this->maxReuse;
    }

    /**
     * @param number $maxTemperature
     */
    public function setMaxTemperature($maxTemperature)
    {
        $this->maxTemperature = $maxTemperature;
    }

    /**
     * @return number
     */
    public function getMaxTemperature()
    {
        return $this->maxTemperature;
    }

    /**
     * @param number $minTemperature
     */
    public function setMinTemperature($minTemperature)
    {
        $this->minTemperature = $minTemperature;
    }

    /**
     * @return number
     */
    public function getMinTemperature()
    {
        return $this->minTemperature;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param int $timesCultured
     */
    public function setTimesCultured($timesCultured)
    {
        $this->timesCultured = $timesCultured;
    }

    /**
     * @return int
     */
    public function getTimesCultured()
    {
        return $this->timesCultured;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }


}