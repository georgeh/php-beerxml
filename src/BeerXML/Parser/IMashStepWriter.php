<?php


namespace BeerXML\Parser;


interface IMashStepWriter {

    /**
     * the temperature you can expect the mash to fall to after a long mash step.  Measured in degrees Celsius.
     *
     * @param number $endTemp
     */
    public function setEndTemp($endTemp);

    /**
     * The volume of water in liters to infuse in this step.  Required only for infusion steps, though one may also add
     * water for temperature mash steps.  One should not have an infusion amount for decoction steps.
     *
     * @param number $infuseAmount
     */
    public function setInfuseAmount($infuseAmount);

    /**
     * Name of the mash step – usually descriptive text such as "Dough In" or "Conversion"
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Time in minutes to achieve the desired step temperature – useful particularly for temperature mashes where it may
     * take some time to achieve the step temperature.
     *
     * @param number $rampTime
     */
    public function setRampTime($rampTime);

    /**
     * The target temperature for this step in degrees Celsius.
     *
     * @param number $stepTemp
     */
    public function setStepTemp($stepTemp);

    /**
     * The number of minutes to spend at this step – i.e. the amount of time we are to hold this particular step
     * temperature.
     *
     * @param number $stepTime
     */
    public function setStepTime($stepTime);

    /**
     * May be "Infusion", "Temperature" or "Decoction" depending on the type of step.  Infusion denotes adding hot water,
     * Temperature denotes heating with an outside heat source, and decoction denotes drawing off some mash for boiling.
     *
     * @param string $type
     */
    public function setType($type);

    /**
     * Version of the mash step record.  Should always be "1" for this version of the XML standard.
     *
     * @param int $version
     */
    public function setVersion($version);
}