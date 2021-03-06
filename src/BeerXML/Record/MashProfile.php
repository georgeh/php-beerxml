<?php


namespace BeerXML\Record;


use BeerXML\Generator\IMashProfileDisplay as MashProfileGetter;
use BeerXML\Parser\IMashProfileDisplay as MashProfileSetter;

class MashProfile implements MashProfileGetter, MashProfileSetter
{
    /**
     * Name of the mash profile.
     *
     * @var string
     */
    private $name;

    /**
     * Version of the mash record.  Should always be "1" for this version of the XML standard.
     *
     * @var int
     */
    private $version = 1;

    /**
     * The temperature of the grain before adding it to the mash in degrees Celsius.
     *
     * @var number
     */
    private $grainTemp;

    /**
     * Record set that starts the list of <MASH_STEP> records.  All MASH_STEP records should appear between the
     * <MASH_STEPS> … </MASH_STEPS> pair.
     *
     * @var array
     */
    private $mashSteps = array();

    /**
     * Notes associated with this profile – may be multiline.
     *
     * @var string
     */
    private $notes;

    /**
     * Grain tun temperature – may be used to adjust the infusion temperature for equipment if the program supports it.
     * Measured in degrees C.
     *
     * @var number
     */
    private $tunTemp;

    /**
     * Temperature of the sparge water used in degrees Celsius.
     *
     * @var number
     */
    private $spargeTemp;

    /**
     * PH of the sparge.
     *
     * @var float
     */
    private $pH;

    /**
     * Weight of the mash tun in kilograms
     *
     * @var float
     */
    private $tunWeight;

    /**
     * Specific heat of the tun material in calories per gram-degree C.
     *
     * @var float
     */
    private $tunSpecificHeat;

    /**
     * If TRUE, mash infusion and decoction calculations should take into account the temperature effects of the
     * equipment (tun specific heat and tun weight).  If FALSE, the tun is assumed to be pre-heated.  Default is FALSE.
     *
     * @var bool
     */
    private $equipAdjust = false;

    /** Fields from Appendix A Optional Extensions for BeerXML Display **/

    /**
     * @var string
     */
    private $displayGrainTemp;

    /**
     * @var string
     */
    private $displayTunTemp;

    /**
     * @var string
     */
    private $displaySpargeTemp;

    /**
     * @var string
     */
    private $displayTunWeight;

    /**
     * @param boolean $equipAdjust
     */
    public function setEquipAdjust($equipAdjust)
    {
        $this->equipAdjust = $equipAdjust;
    }

    /**
     * @return boolean
     */
    public function getEquipAdjust()
    {
        return $this->equipAdjust;
    }

    /**
     * @param number $grainTemp
     */
    public function setGrainTemp($grainTemp)
    {
        $this->grainTemp = $grainTemp;
    }

    /**
     * @return number
     */
    public function getGrainTemp()
    {
        return $this->grainTemp;
    }

    /**
     * @param MashStep $mashStep
     */
    public function addMashStep($mashStep)
    {
        $this->mashSteps[] = $mashStep;
    }

    /**
     * @return MashStep[]
     */
    public function getMashSteps()
    {
        return $this->mashSteps;
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
     * @param float $pH
     */
    public function setPH($pH)
    {
        $this->pH = $pH;
    }

    /**
     * @return float
     */
    public function getPH()
    {
        return $this->pH;
    }

    /**
     * @param number $spargeTemp
     */
    public function setSpargeTemp($spargeTemp)
    {
        $this->spargeTemp = $spargeTemp;
    }

    /**
     * @return number
     */
    public function getSpargeTemp()
    {
        return $this->spargeTemp;
    }

    /**
     * @param float $tunSpecificHeat
     */
    public function setTunSpecificHeat($tunSpecificHeat)
    {
        $this->tunSpecificHeat = $tunSpecificHeat;
    }

    /**
     * @return float
     */
    public function getTunSpecificHeat()
    {
        return $this->tunSpecificHeat;
    }

    /**
     * @param number $tunTemp
     */
    public function setTunTemp($tunTemp)
    {
        $this->tunTemp = $tunTemp;
    }

    /**
     * @return number
     */
    public function getTunTemp()
    {
        return $this->tunTemp;
    }

    /**
     * @param float $tunWeight
     */
    public function setTunWeight($tunWeight)
    {
        $this->tunWeight = $tunWeight;
    }

    /**
     * @return float
     */
    public function getTunWeight()
    {
        return $this->tunWeight;
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

    /**
     * Grain temperature in user display units with the units.  For example: "72 F".
     *
     * @param string $displayGrainTemp
     */
    public function setDisplayGrainTemp($displayGrainTemp)
    {
        $this->displayGrainTemp = $displayGrainTemp;
    }

    /**
     * Grain temperature in user display units with the units.  For example: "72 F".
     *
     * @return string
     */
    public function getDisplayGrainTemp()
    {
        return $this->displayGrainTemp;
    }

    /**
     * Sparge temperature in user defined units.  For example "178 F"
     *
     * @param string $displaySpargeTemp
     */
    public function setDisplaySpargeTemp($displaySpargeTemp)
    {
        $this->displaySpargeTemp = $displaySpargeTemp;
    }

    /**
     * Sparge temperature in user defined units.  For example "178 F"
     *
     * @return string
     */
    public function getDisplaySpargeTemp()
    {
        return $this->displaySpargeTemp;
    }

    /**
     * Tun temperature in user display units.  For example "68 F"
     *
     * @param string $displayTunTemp
     */
    public function setDisplayTunTemp($displayTunTemp)
    {
        $this->displayTunTemp = $displayTunTemp;
    }

    /**
     * Tun temperature in user display units.  For example "68 F"
     *
     * @return string
     */
    public function getDisplayTunTemp()
    {
        return $this->displayTunTemp;
    }

    /**
     * Tun weight in user defined units – for example "10 lb"
     *
     * @param string $displayTunWeight
     */
    public function setDisplayTunWeight($displayTunWeight)
    {
        $this->displayTunWeight = $displayTunWeight;
    }

    /**
     * Tun weight in user defined units – for example "10 lb"
     *
     * @return string
     */
    public function getDisplayTunWeight()
    {
        return $this->displayTunWeight;
    }


}