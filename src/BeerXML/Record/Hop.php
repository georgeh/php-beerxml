<?php


namespace BeerXML\Record;


use BeerXML\Generator\IHopReader;
use BeerXML\Parser\IHopWriter;

class Hop implements IHopReader, IHopWriter
{

    const USE_BOIL = 'Boil';
    const USE_DRY_HOP = 'Dry Hop';
    const USE_MASH = 'Mash';
    const USE_FIRST_WORT = 'First Wort';
    const USE_AROMA = 'Aroma';
    const TYPE_BITTERING = 'Bittering';
    const TYPE_AROMA = 'Aroma';
    const TYPE_BOTH = 'Both';
    const FORM_PELLET = 'Pellet';
    const FORM_PLUG = 'Plug';
    const FORM_LEAF = 'Leaf';

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $version = 1;

    /**
     * @var number Percentage
     */
    private $alpha;

    /**
     * @var number Weight (kg)
     */
    private $amount;

    /**
     * @var string "Boil", "Dry Hop", "Mash", "First Wort" or "Aroma"
     */
    private $use;

    /**
     * @var number Time (min)
     */
    private $time;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var string "Bittering", "Aroma" or "Both"
     */
    private $type;

    /**
     * @var string "Pellet", "Plug" or "Leaf"
     */
    private $form;

    /**
     * @var number Percentage
     */
    private $beta;

    /**
     * @var number Percentage
     */
    private $hsi;

    /**
     * @var string
     */
    private $origin;

    /**
     * @var string
     */
    private $substitutes;

    /**
     * @var number Percentage
     */
    private $humulene;

    /**
     * @var number Percentage
     */
    private $caryophyllene;

    /**
     * @var number Percentage
     */
    private $cohumulone;

    /**
     * @var number Percentage
     */
    private $myrcene;

    /**
     * Percent alpha of hops - for example "5.5" represents 5.5% alpha
     *
     * @param number $alpha
     */
    public function setAlpha($alpha)
    {
        $this->alpha = $alpha;
    }

    /**
     * Percent alpha of hops - for example "5.5" represents 5.5% alpha
     *
     * @return number
     */
    public function getAlpha()
    {
        return $this->alpha;
    }

    /**
     * Weight in Kilograms of the hops used in the recipe
     *
     * @param number $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Weight in Kilograms of the hops used in the recipe
     *
     * @return number
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Hop beta percentage - for example "4.4" denotes 4.4 % beta
     *
     * @param number $beta
     */
    public function setBeta($beta)
    {
        $this->beta = $beta;
    }

    /**
     * Hop beta percentage - for example "4.4" denotes 4.4 % beta
     *
     * @return number
     */
    public function getBeta()
    {
        return $this->beta;
    }

    /**
     * Caryophyllene level in percent.
     *
     * @param number $caryophyllene
     */
    public function setCaryophyllene($caryophyllene)
    {
        $this->caryophyllene = $caryophyllene;
    }

    /**
     * Caryophyllene level in percent.
     *
     * @return number
     */
    public function getCaryophyllene()
    {
        return $this->caryophyllene;
    }

    /**
     * Cohumulone level in percent
     *
     * @param number $cohumulone
     */
    public function setCohumulone($cohumulone)
    {
        $this->cohumulone = $cohumulone;
    }

    /**
     * Cohumulone level in percent
     *
     * @return number
     */
    public function getCohumulone()
    {
        return $this->cohumulone;
    }

    /**
     * May be "Pellet", "Plug" or "Leaf"
     *
     * @param string $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }

    /**
     * May be "Pellet", "Plug" or "Leaf"
     *
     * @return string
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Hop Stability Index - defined as the percentage of hop alpha lost in 6 months of storage
     *
     * @param number $hsi
     */
    public function setHsi($hsi)
    {
        $this->hsi = $hsi;
    }

    /**
     * Hop Stability Index - defined as the percentage of hop alpha lost in 6 months of storage
     *
     * @return number
     */
    public function getHsi()
    {
        return $this->hsi;
    }

    /**
     * Humulene level in percent.
     *
     * @param number $humulene
     */
    public function setHumulene($humulene)
    {
        $this->humulene = $humulene;
    }

    /**
     * Humulene level in percent.
     *
     * @return number
     */
    public function getHumulene()
    {
        return $this->humulene;
    }

    /**
     * Myrcene level in percent
     *
     * @param number $myrcene
     */
    public function setMyrcene($myrcene)
    {
        $this->myrcene = $myrcene;
    }

    /**
     * Myrcene level in percent
     *
     * @return number
     */
    public function getMyrcene()
    {
        return $this->myrcene;
    }

    /**
     * Name of the hops
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Name of the hops
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Textual notes about the hops, usage, substitutes.  May be a multiline entry.
     *
     * @param string $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Textual notes about the hops, usage, substitutes.  May be a multiline entry.
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Place of origin for the hops
     *
     * @param string $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    /**
     * Place of origin for the hops
     *
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Substitutes that can be used for this hops
     *
     * @param string $substitutes
     */
    public function setSubstitutes($substitutes)
    {
        $this->substitutes = $substitutes;
    }

    /**
     * Substitutes that can be used for this hops
     *
     * @return string
     */
    public function getSubstitutes()
    {
        return $this->substitutes;
    }

    /**
     * The time as measured in minutes.  Meaning is dependent on the “USE" field.  For “Boil" this is the boil time.
     * For “Mash" this is the mash time.  For “First Wort" this is the boil time.  For “Aroma" this is the steep time.
     * For “Dry Hop" this is the amount of time to dry hop.
     *
     * @param number $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * The time as measured in minutes.  Meaning is dependent on the “USE" field.  For “Boil" this is the boil time.
     * For “Mash" this is the mash time.  For “First Wort" this is the boil time.  For “Aroma" this is the steep time.
     * For “Dry Hop" this is the amount of time to dry hop.
     *
     * @return number
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * May be "Bittering", "Aroma" or "Both"
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * May be "Bittering", "Aroma" or "Both"
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * May be "Boil", "Dry Hop", "Mash", "First Wort" or "Aroma".  Note that "Aroma" and "Dry Hop" do not contribute to
     * the bitterness of the beer while the others do.  Aroma hops are added after the boil and do not contribute
     * substantially to beer bitterness.
     *
     * @param string $use
     */
    public function setUse($use)
    {
        $this->use = $use;
    }

    /**
     * May be "Boil", "Dry Hop", "Mash", "First Wort" or "Aroma".  Note that "Aroma" and "Dry Hop" do not contribute to
     * the bitterness of the beer while the others do.  Aroma hops are added after the boil and do not contribute
     * substantially to beer bitterness.
     *
     * @return string
     */
    public function getUse()
    {
        return $this->use;
    }

    /**
     * Should be set to 1 for this version of the XML standard.  May be a higher number for later versions but all later
     * versions shall be backward compatible.
     *
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Should be set to 1 for this version of the XML standard.  May be a higher number for later versions but all later
     * versions shall be backward compatible.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }


}