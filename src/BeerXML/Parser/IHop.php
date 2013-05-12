<?php


namespace BeerXML\Parser;


interface IHop
{

    /**
     * Percent alpha of hops - for example "5.5" represents 5.5% alpha
     *
     * @param number $alpha
     */
    public function setAlpha($alpha);

    /**
     * Weight in Kilograms of the hops used in the recipe
     *
     * @param number $amount
     */
    public function setAmount($amount);

    /**
     * Hop beta percentage - for example "4.4" denotes 4.4 % beta
     *
     * @param number $beta
     */
    public function setBeta($beta);

    /**
     * Caryophyllene level in percent.
     *
     * @param number $caryophyllene
     */
    public function setCaryophyllene($caryophyllene);

    /**
     * Cohumulone level in percent
     *
     * @param number $cohumulone
     */
    public function setCohumulone($cohumulone);

    /**
     * May be "Pellet", "Plug" or "Leaf"
     *
     * @param string $form
     */
    public function setForm($form);

    /**
     * Hop Stability Index - defined as the percentage of hop alpha lost in 6 months of storage
     *
     * @param number $hsi
     */
    public function setHsi($hsi);

    /**
     * Humulene level in percent.
     *
     * @param number $humulene
     */
    public function setHumulene($humulene);

    /**
     * Myrcene level in percent
     *
     * @param number $myrcene
     */
    public function setMyrcene($myrcene);

    /**
     * Name of the hops
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Textual notes about the hops, usage, substitutes.  May be a multiline entry.
     *
     * @param string $notes
     */
    public function setNotes($notes);

    /**
     * Place of origin for the hops
     *
     * @param string $origin
     */
    public function setOrigin($origin);

    /**
     * Substitutes that can be used for this hops
     *
     * @param string $substitutes
     */
    public function setSubstitutes($substitutes);

    /**
     * The time as measured in minutes.  Meaning is dependent on the "USE" field.  For "Boil" this is the boil time.
     * For "Mash" this is the mash time.  For "First Wort" this is the boil time.  For "Aroma" this is the steep time.
     * For "Dry Hop" this is the amount of time to dry hop.
     *
     * @param number $time
     */
    public function setTime($time);

    /**
     * May be "Bittering", "Aroma" or "Both"
     *
     * @param string $type
     */
    public function setType($type);

    /**
     * May be "Boil", "Dry Hop", "Mash", "First Wort" or "Aroma".  Note that "Aroma" and "Dry Hop" do not contribute to
     * the bitterness of the beer while the others do.  Aroma hops are added after the boil and do not contribute
     * substantially to beer bitterness.
     *
     * @param string $use
     */
    public function setUse($use);

    /**
     * Should be set to 1 for this version of the XML standard.  May be a higher number for later versions but all later
     * versions shall be backward compatible.
     *
     * @param int $version
     */
    public function setVersion($version);
}