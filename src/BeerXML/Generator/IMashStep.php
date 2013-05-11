<?php


namespace BeerXML\Generator;


interface IMashStep
{

    /**
     * the temperature you can expect the mash to fall to after a long mash step.  Measured in degrees Celsius.
     *
     * @return number
     */
    public function getEndTemp();

    /**
     * The volume of water in liters to infuse in this step.  Required only for infusion steps, though one may also add
     * water for temperature mash steps.  One should not have an infusion amount for decoction steps.
     *
     * @return number
     */
    public function getInfuseAmount();

    /**
     * Name of the mash step – usually descriptive text such as "Dough In" or "Conversion"
     *
     * @return string
     */
    public function getName();

    /**
     * Time in minutes to achieve the desired step temperature – useful particularly for temperature mashes where it may
     * take some time to achieve the step temperature.
     *
     * @return number
     */
    public function getRampTime();

    /**
     * The target temperature for this step in degrees Celsius.
     *
     * @return number
     */
    public function getStepTemp();

    /**
     * The number of minutes to spend at this step – i.e. the amount of time we are to hold this particular step
     * temperature.
     *
     * @return number
     */
    public function getStepTime();

    /**
     * May be "Infusion", "Temperature" or "Decoction" depending on the type of step.  Infusion denotes adding hot water,
     * Temperature denotes heating with an outside heat source, and decoction denotes drawing off some mash for boiling.
     *
     * @return string
     */
    public function getType();

    /**
     * Version of the mash step record.  Should always be "1" for this version of the XML standard.
     *
     * @return int
     */
    public function getVersion();
}