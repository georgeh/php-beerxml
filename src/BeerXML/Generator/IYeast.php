<?php


namespace BeerXML\Generator;


interface IYeast
{

    /**
     * Flag denoting that this yeast was added for a secondary (or later) fermentation as opposed to the primary
     * fermentation.  Useful if one uses two or more yeast strains for a single brew (eg: Lambic).  Default value is
     * FALSE.
     *
     * @return boolean
     */
    public function getAddToSecondary();

    /**
     * The amount of yeast, measured in liters.  For a starter this is the size of the starter.  If the flag
     * AMOUNT_IS_WEIGHT is set to TRUE then this measurement is in kilograms and not liters.
     *
     * @return number
     */
    public function getAmount();

    /**
     * @return boolean
     */
    public function getAmountIsWeight();

    /**
     * Average attenuation for this yeast strain.
     *
     * @return number
     */
    public function getAttenuation();

    /**
     * Styles or types of beer this yeast strain is best suited for.
     *
     * @return string
     */
    public function getBestFor();

    /**
     * May be "Low", "Medium", "High" or "Very High"
     *
     * @return string
     */
    public function getFlocculation();

    /**
     * May be "Liquid", "Dry", "Slant" or "Culture"
     *
     * @return string
     */
    public function getForm();

    /**
     * The name of the laboratory that produced the yeast.
     *
     * @return string
     */
    public function getLaboratory();

    /**
     * Recommended of times this yeast can be reused (recultured from a previous batch)
     *
     * @return int
     */
    public function getMaxReuse();

    /**
     * The maximum recommended temperature for fermenting this yeast strain in Celsius.
     *
     * @return number
     */
    public function getMaxTemperature();

    /**
     * The minimum recommended temperature for fermenting this yeast strain in degrees Celsius.
     *
     * @return number
     */
    public function getMinTemperature();

    /**
     * Name of the yeast.
     *
     * @return string
     */
    public function getName();

    /**
     * Notes on this yeast strain.  May be a multiline entry.
     *
     * @return string
     */
    public function getNotes();

    /**
     * The manufacturer’s product ID label or number that identifies this particular strain of yeast.
     *
     * @return string
     */
    public function getProductId();

    /**
     * Number of times this yeast has been reused as a harvested culture.  This number should be zero if this is a
     * product directly from the manufacturer.
     *
     * @return int
     */
    public function getTimesCultured();

    /**
     * May be "Ale", "Lager", "Wheat", "Wine" or "Champagne"
     *
     * @return string
     */
    public function getType();

    /**
     * Version of the standard.  Should be "1" for this version.
     *
     * @return int
     */
    public function getVersion();
}