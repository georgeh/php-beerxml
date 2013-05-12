<?php


namespace BeerXML\Parser;


interface IStyleDisplay extends IStyle
{

    /**
     * ABV Range for this style such as “4.5-5.5%”
     *
     * @param string $abvRange
     */
    public function setAbvRange($abvRange);

    /**
     * Carbonation range in volumes such as “2.0-2.6 vols”
     *
     * @param string $carbRange
     */
    public function setCarbRange($carbRange);

    /**
     * Color range such as “10-20 SRM”
     *
     * @param string $colorRange
     */
    public function setColorRange($colorRange);

    /**
     * Maximum color in user defined units such as “20 srm”
     *
     * @param string $displayColorMax
     */
    public function setDisplayColorMax($displayColorMax);

    /**
     * Minimum color in user defined units such as “30 srm”.
     *
     * @param string $displayColorMin
     */
    public function setDisplayColorMin($displayColorMin);

    /**
     * Final gravity maximum in user defined units such as “1.019 sg”.
     *
     * @param string $displayFgMax
     */
    public function setDisplayFgMax($displayFgMax);

    /**
     * Final gravity minimum in user defined units such as “1.010 sg”.
     *
     * @param string $displayFgMin
     */
    public function setDisplayFgMin($displayFgMin);

    /**
     * Original gravity max in user defined units such as “1.056 sg”
     *
     * @param string $displayOgMax
     */
    public function setDisplayOgMax($displayOgMax);

    /**
     * Original gravity minimum in user defined units such as “1.036 sg”.
     *
     * @param string $displayOgMin
     */
    public function setDisplayOgMin($displayOgMin);

    /**
     * Final gravity range such as “1.010-1.015 sg”
     *
     * @param string $fgRange
     */
    public function setFgRange($fgRange);

    /**
     * Bitterness range in IBUs such as “10-20 IBU”
     *
     * @param string $ibuRange
     */
    public function setIbuRange($ibuRange);

    /**
     * Original gravity range for the style such as “1.030-1.040 sg”
     *
     * @param string $ogRange
     */
    public function setOgRange($ogRange);
}