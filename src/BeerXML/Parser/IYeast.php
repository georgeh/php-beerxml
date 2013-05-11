<?php


namespace BeerXML\Parser;


interface IYeast
{

    /**
     * Flag denoting that this yeast was added for a secondary (or later) fermentation as opposed to the primary
     * fermentation.  Useful if one uses two or more yeast strains for a single brew (eg: Lambic).  Default value is
     * FALSE.
     *
     * @param boolean $addToSecondary
     */
    public function setAddToSecondary($addToSecondary);

    /**
     * The amount of yeast, measured in liters.  For a starter this is the size of the starter.  If the flag
     * AMOUNT_IS_WEIGHT is set to TRUE then this measurement is in kilograms and not liters.
     *
     * @param number $amount
     */
    public function setAmount($amount);

    /**
     * @param boolean $amountIsWeight
     */
    public function setAmountIsWeight($amountIsWeight);

    /**
     * Average attenuation for this yeast strain.
     *
     * @param number $attenuation
     */
    public function setAttenuation($attenuation);

    /**
     * Styles or types of beer this yeast strain is best suited for.
     *
     * @param string $bestFor
     */
    public function setBestFor($bestFor);

    /**
     * May be "Low", "Medium", "High" or "Very High"
     *
     * @param string $flocculation
     */
    public function setFlocculation($flocculation);

    /**
     * May be "Liquid", "Dry", "Slant" or "Culture"
     *
     * @param string $form
     */
    public function setForm($form);

    /**
     * The name of the laboratory that produced the yeast.
     *
     * @param string $laboratory
     */
    public function setLaboratory($laboratory);

    /**
     * Recommended of times this yeast can be reused (recultured from a previous batch)
     *
     * @param int $maxReuse
     */
    public function setMaxReuse($maxReuse);

    /**
     * The maximum recommended temperature for fermenting this yeast strain in Celsius.
     *
     * @param number $maxTemperature
     */
    public function setMaxTemperature($maxTemperature);

    /**
     * The minimum recommended temperature for fermenting this yeast strain in degrees Celsius.
     *
     * @param number $minTemperature
     */
    public function setMinTemperature($minTemperature);

    /**
     * Name of the yeast.
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Notes on this yeast strain.  May be a multiline entry.
     *
     * @param string $notes
     */
    public function setNotes($notes);

    /**
     * The manufacturer’s product ID label or number that identifies this particular strain of yeast.
     *
     * @param string $productId
     */
    public function setProductId($productId);

    /**
     * Number of times this yeast has been reused as a harvested culture.  This number should be zero if this is a
     * product directly from the manufacturer.
     *
     * @param int $timesCultured
     */
    public function setTimesCultured($timesCultured);

    /**
     * May be "Ale", "Lager", "Wheat", "Wine" or "Champagne"
     *
     * @param string $type
     */
    public function setType($type);

    /**
     * Version of the standard.  Should be "1" for this version.
     *
     * @param int $version
     */
    public function setVersion($version);
}