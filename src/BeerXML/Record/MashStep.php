<?php


namespace BeerXML\Record;


use BeerXML\Generator\IMashStepDisplay as MashStepGetter;
use BeerXML\Parser\IMashStepDisplay as MashStepSetter;

class MashStep implements MashStepGetter, MashStepSetter
{

    const TYPE_INFUSION    = 'Infusion';
    const TYPE_TEMPERATURE = 'Temperature';
    const TYPE_DECOCTION   = 'Decoction';

    /**
     * Name of the mash step – usually descriptive text such as "Dough In" or "Conversion"
     *
     * @var string
     */
    private $name;

    /**
     * Version of the mash step record.  Should always be "1" for this version of the XML standard.
     *
     * @var int
     */
    private $version = 1;

    /**
     * May be "Infusion", "Temperature" or "Decoction" depending on the type of step.  Infusion denotes adding hot water,
     * Temperature denotes heating with an outside heat source, and decoction denotes drawing off some mash for boiling.
     *
     * @var string
     */
    private $type;

    /**
     * The volume of water in liters to infuse in this step.  Required only for infusion steps, though one may also add
     * water for temperature mash steps.  One should not have an infusion amount for decoction steps.
     *
     * @var number
     */
    private $infuseAmount;

    /**
     * The target temperature for this step in degrees Celsius.
     *
     * @var number
     */
    private $stepTemp;

    /**
     * The number of minutes to spend at this step – i.e. the amount of time we are to hold this particular step
     * temperature.
     *
     * @var number
     */
    private $stepTime;

    /**
     * Time in minutes to achieve the desired step temperature – useful particularly for temperature mashes where it may
     * take some time to achieve the step temperature.
     *
     * @var number
     */
    private $rampTime;

    /**
     * the temperature you can expect the mash to fall to after a long mash step.  Measured in degrees Celsius.
     *
     * @var number
     */
    private $endTemp;

    /** Fields from Appendix A Optional Extensions for BeerXML Display **/

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $waterGrainRatio;

    /**
     * @var string
     */
    private $decoctionAmt;

    /**
     * @var string
     */
    private $infuseTemp;

    /**
     * @var string
     */
    private $displayStepTemp;

    /**
     * @var string
     */
    private $displayInfuseAmt;

    /**
     * the temperature you can expect the mash to fall to after a long mash step.  Measured in degrees Celsius.
     *
     * @param number $endTemp
     */
    public function setEndTemp($endTemp)
    {
        $this->endTemp = $endTemp;
    }

    /**
     * the temperature you can expect the mash to fall to after a long mash step.  Measured in degrees Celsius.
     *
     * @return number
     */
    public function getEndTemp()
    {
        return $this->endTemp;
    }

    /**
     * The volume of water in liters to infuse in this step.  Required only for infusion steps, though one may also add
     * water for temperature mash steps.  One should not have an infusion amount for decoction steps.
     *
     * @param number $infuseAmount
     */
    public function setInfuseAmount($infuseAmount)
    {
        $this->infuseAmount = $infuseAmount;
    }

    /**
     * The volume of water in liters to infuse in this step.  Required only for infusion steps, though one may also add
     * water for temperature mash steps.  One should not have an infusion amount for decoction steps.
     *
     * @return number
     */
    public function getInfuseAmount()
    {
        return $this->infuseAmount;
    }

    /**
     * Name of the mash step – usually descriptive text such as "Dough In" or "Conversion"
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Name of the mash step – usually descriptive text such as "Dough In" or "Conversion"
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Time in minutes to achieve the desired step temperature – useful particularly for temperature mashes where it may
     * take some time to achieve the step temperature.
     *
     * @param number $rampTime
     */
    public function setRampTime($rampTime)
    {
        $this->rampTime = $rampTime;
    }

    /**
     * Time in minutes to achieve the desired step temperature – useful particularly for temperature mashes where it may
     * take some time to achieve the step temperature.
     *
     * @return number
     */
    public function getRampTime()
    {
        return $this->rampTime;
    }

    /**
     * The target temperature for this step in degrees Celsius.
     *
     * @param number $stepTemp
     */
    public function setStepTemp($stepTemp)
    {
        $this->stepTemp = $stepTemp;
    }

    /**
     * The target temperature for this step in degrees Celsius.
     *
     * @return number
     */
    public function getStepTemp()
    {
        return $this->stepTemp;
    }

    /**
     * The number of minutes to spend at this step – i.e. the amount of time we are to hold this particular step
     * temperature.
     *
     * @param number $stepTime
     */
    public function setStepTime($stepTime)
    {
        $this->stepTime = $stepTime;
    }

    /**
     * The number of minutes to spend at this step – i.e. the amount of time we are to hold this particular step
     * temperature.
     *
     * @return number
     */
    public function getStepTime()
    {
        return $this->stepTime;
    }

    /**
     * May be "Infusion", "Temperature" or "Decoction" depending on the type of step.  Infusion denotes adding hot water,
     * Temperature denotes heating with an outside heat source, and decoction denotes drawing off some mash for boiling.
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * May be "Infusion", "Temperature" or "Decoction" depending on the type of step.  Infusion denotes adding hot water,
     * Temperature denotes heating with an outside heat source, and decoction denotes drawing off some mash for boiling.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Version of the mash step record.  Should always be "1" for this version of the XML standard.
     *
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Version of the mash step record.  Should always be "1" for this version of the XML standard.
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Calculated volume of mash to decoct.  Only applicable for a decoction step.  Includes the units as in "7.5 l" or
     * "2.3 gal"
     *
     * @param string $decoctionAmt
     */
    public function setDecoctionAmt($decoctionAmt)
    {
        $this->decoctionAmt = $decoctionAmt;
    }

    /**
     * Calculated volume of mash to decoct.  Only applicable for a decoction step.  Includes the units as in "7.5 l" or
     * "2.3 gal"
     *
     * @return string
     */
    public function getDecoctionAmt()
    {
        return $this->decoctionAmt;
    }

    /**
     * Textual description of this step such as "Infuse 4.5 gal of water at 170 F" – may be either generated by the
     * program or input by the user.
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Textual description of this step such as "Infuse 4.5 gal of water at 170 F" – may be either generated by the
     * program or input by the user.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Infusion amount along with the volume units as in "20 l" or "13 qt"
     *
     * @param string $displayInfuseAmt
     */
    public function setDisplayInfuseAmt($displayInfuseAmt)
    {
        $this->displayInfuseAmt = $displayInfuseAmt;
    }

    /**
     * Infusion amount along with the volume units as in "20 l" or "13 qt"
     *
     * @return string
     */
    public function getDisplayInfuseAmt()
    {
        return $this->displayInfuseAmt;
    }

    /**
     * Step temperature in user defined temperature units.  For example "154F" or "68 C"
     *
     * @param string $displayStepTemp
     */
    public function setDisplayStepTemp($displayStepTemp)
    {
        $this->displayStepTemp = $displayStepTemp;
    }

    /**
     * Step temperature in user defined temperature units.  For example "154F" or "68 C"
     *
     * @return string
     */
    public function getDisplayStepTemp()
    {
        return $this->displayStepTemp;
    }

    /**
     * The calculated infusion temperature based on the current step, grain, and other settings.  Applicable only for an
     * infusion step.  Includes the units as in "154 F" or "68 C"
     *
     * @param string $infuseTemp
     */
    public function setInfuseTemp($infuseTemp)
    {
        $this->infuseTemp = $infuseTemp;
    }

    /**
     * The calculated infusion temperature based on the current step, grain, and other settings.  Applicable only for an
     * infusion step.  Includes the units as in "154 F" or "68 C"
     *
     * @return string
     */
    public function getInfuseTemp()
    {
        return $this->infuseTemp;
    }

    /**
     * The total ratio of water to grain for this step AFTER the infusion along with the units, usually expressed in
     * qt/lb or l/kg.
     *
     * Note this value must be consistent with the required infusion amount and amounts added in earlier steps and is
     * only relevant as part of a <MASH> profile.  For example "1.5 qt/lb" or "3.0 l/kg"
     *
     * @param string $waterGrainRatio
     */
    public function setWaterGrainRatio($waterGrainRatio)
    {
        $this->waterGrainRatio = $waterGrainRatio;
    }

    /**
     * The total ratio of water to grain for this step AFTER the infusion along with the units, usually expressed in
     * qt/lb or l/kg.
     *
     * Note this value must be consistent with the required infusion amount and amounts added in earlier steps and is
     * only relevant as part of a <MASH> profile.  For example "1.5 qt/lb" or "3.0 l/kg"
     * @return string
     */
    public function getWaterGrainRatio()
    {
        return $this->waterGrainRatio;
    }

}
