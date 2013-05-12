<?php


namespace BeerXML\Generator;


interface IHop
{

    /**
     * Percent alpha of hops - for example "5.5" represents 5.5% alpha
     *
     * @return number
     */
    public function getAlpha();

    /**
     * Weight in Kilograms of the hops used in the recipe
     *
     * @return number
     */
    public function getAmount();

    /**
     * Hop beta percentage - for example "4.4" denotes 4.4 % beta
     *
     * @return number
     */
    public function getBeta();

    /**
     * Caryophyllene level in percent.
     *
     * @return number
     */
    public function getCaryophyllene();

    /**
     * Cohumulone level in percent
     *
     * @return number
     */
    public function getCohumulone();

    /**
     * May be "Pellet", "Plug" or "Leaf"
     *
     * @return string
     */
    public function getForm();

    /**
     * Hop Stability Index - defined as the percentage of hop alpha lost in 6 months of storage
     *
     * @return number
     */
    public function getHsi();

    /**
     * Humulene level in percent.
     *
     * @return number
     */
    public function getHumulene();

    /**
     * Myrcene level in percent
     *
     * @return number
     */
    public function getMyrcene();

    /**
     * Name of the hops
     *
     * @return string
     */
    public function getName();

    /**
     * Textual notes about the hops, usage, substitutes.  May be a multiline entry.
     *
     * @return string
     */
    public function getNotes();

    /**
     * Place of origin for the hops
     *
     * @return string
     */
    public function getOrigin();

    /**
     * Substitutes that can be used for this hops
     *
     * @return string
     */
    public function getSubstitutes();

    /**
     * The time as measured in minutes.  Meaning is dependent on the "USE" field.  For "Boil" this is the boil time.
     * For "Mash" this is the mash time.  For "First Wort" this is the boil time.  For "Aroma" this is the steep time.
     * For "Dry Hop" this is the amount of time to dry hop.
     *
     * @return number
     */
    public function getTime();

    /**
     * May be "Bittering", "Aroma" or "Both"
     *
     * @return string
     */
    public function getType();

    /**
     * May be "Boil", "Dry Hop", "Mash", "First Wort" or "Aroma".  Note that "Aroma" and "Dry Hop" do not contribute to
     * the bitterness of the beer while the others do.  Aroma hops are added after the boil and do not contribute
     * substantially to beer bitterness.
     *
     * @return string
     */
    public function getUse();

    /**
     * Should be set to 1 for this version of the XML standard.  May be a higher number for later versions but all later
     * versions shall be backward compatible.
     *
     * @return int
     */
    public function getVersion();
}