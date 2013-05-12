<?php


namespace BeerXML\Generator;


interface IStyleDisplay extends IStyle
{

    /**
     * ABV Range for this style such as "4.5-5.5%"
     *
     * @return string
     */
    public function getAbvRange();

    /**
     * Carbonation range in volumes such as "2.0-2.6 vols"
     *
     * @return string
     */
    public function getCarbRange();

    /**
     * Color range such as "10-20 SRM"
     *
     * @return string
     */
    public function getColorRange();

    /**
     * Maximum color in user defined units such as "20 srm"
     *
     * @return string
     */
    public function getDisplayColorMax();

    /**
     * Minimum color in user defined units such as "30 srm".
     *
     * @return string
     */
    public function getDisplayColorMin();

    /**
     * Final gravity maximum in user defined units such as "1.019 sg".
     *
     * @return string
     */
    public function getDisplayFgMax();

    /**
     * Final gravity minimum in user defined units such as "1.010 sg".
     *
     * @return string
     */
    public function getDisplayFgMin();

    /**
     * Original gravity max in user defined units such as "1.056 sg"
     *
     * @return string
     */
    public function getDisplayOgMax();

    /**
     * Original gravity minimum in user defined units such as "1.036 sg".
     *
     * @return string
     */
    public function getDisplayOgMin();

    /**
     * Final gravity range such as "1.010-1.015 sg"
     *
     * @return string
     */
    public function getFgRange();

    /**
     * Bitterness range in IBUs such as "10-20 IBU"
     *
     * @return string
     */
    public function getIbuRange();

    /**
     * Original gravity range for the style such as "1.030-1.040 sg"
     *
     * @return string
     */
    public function getOgRange();
}