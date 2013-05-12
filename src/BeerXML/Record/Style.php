<?php


namespace BeerXML\Record;


use BeerXML\Generator\IStyleDisplay as StyleGetter;
use BeerXML\Parser\IStyleDisplay as StyleSetter;

class Style implements StyleGetter, StyleSetter
{

    const TYPE_LAGER = 'Lager';
    const TYPE_ALE   = 'Ale';
    const TYPE_MEAD  = 'Mead';
    const TYPE_WHEAT = 'Wheat';
    const TYPE_MIXED = 'Mixed';
    const TYPE_CIDER = 'Cider';

    /**
     * Name of the style profile – usually this is the specific name of the style – for example "Scottish Wee Heavy Ale"
     * and not the Category which in this case might be "Scottish Ale"
     *
     * @var string
     */
    private $name;

    /**
     * Category that this style belongs to – usually associated with a group of styles such as "English Ales" or
     * "Amercian Lagers".
     *
     * @var string
     */
    private $category;

    /**
     * Version of the style record.  Should always be "1" for this version of the XML standard.
     *
     * @var int
     */
    private $version = 1;

    /**
     * Number or identifier associated with this style category.  For example in the BJCP style guide, the
     * "American Lager" category has a category number of "1".
     *
     * @var string
     */
    private $categoryNumber;

    /**
     * The specific style number or subcategory letter associated with this particular style.  For example in the BJCP
     * style guide, an American Standard Lager would be style letter "A" under the main category.  Letters should be
     * upper case.
     *
     * @var string
     */
    private $styleLetter;

    /**
     * The name of the style guide that this particular style or category belongs to.  For example "BJCP" might denote
     * the BJCP style guide, and "AHA" would be used for the AHA style guide.
     *
     * @var string
     */
    private $styleGuide;

    /**
     * May be "Lager", "Ale", "Mead", "Wheat", "Mixed" or "Cider".  Defines the type of beverage associated with this
     * category.
     *
     * @var string
     */
    private $type;

    /**
     * The minimum specific gravity as measured relative to water.  For example "1.040" might be a reasonable minimum
     * for a Pale Ale.
     *
     * @var float
     */
    private $ogMin;

    /**
     * The maximum specific gravity as measured relative to water.
     *
     * @var float
     */
    private $ogMax;

    /**
     * The minimum final gravity as measured relative to water.
     *
     * @var float
     */
    private $fgMin;

    /**
     * The maximum final gravity as measured relative to water.
     *
     * @var float
     */
    private $fgMax;

    /**
     * The recommended minimum bitterness for this style as measured in International Bitterness Units (IBUs)
     *
     * @var float
     */
    private $ibuMin;

    /**
     * The recommended maximum bitterness for this style as measured in International Bitterness Units (IBUs)
     *
     * @var float
     */
    private $ibuMax;

    /**
     * The minimum recommended color in SRM
     *
     * @var number
     */
    private $colorMin;

    /**
     * The maximum recommended color in SRM.
     *
     * @var number
     */
    private $colorMax;

    /**
     * Minimum recommended carbonation for this style in volumes of CO2
     *
     * @var float
     */
    private $carbMin;

    /**
     * The maximum recommended carbonation for this style in volumes of CO2
     *
     * @var float
     */
    private $carbMax;

    /**
     * The minimum recommended alcohol by volume as a percentage.
     *
     * @var float
     */
    private $abvMin;

    /**
     * The maximum recommended alcohol by volume as a percentage.
     *
     * @var float
     */
    private $abvMax;

    /**
     * Description of the style, history
     *
     * @var string
     */
    private $notes;

    /**
     * Flavor and aroma profile for this style
     *
     * @var string
     */
    private $profile;

    /**
     * Suggested ingredients for this style
     *
     * @var string
     */
    private $ingredients;

    /**
     * Example beers of this style.
     *
     * @var string
     */
    private $examples;

    /** Fields from Appendix A Optional Extensions for BeerXML Display **/

    /**
     * @var string
     */
    private $displayOgMin;

    /**
     * @var string
     */
    private $displayOgMax;

    /**
     * @var string
     */
    private $displayFgMin;

    /**
     * @var string
     */
    private $displayFgMax;

    /**
     * @var string
     */
    private $displayColorMin;

    /**
     * @var string
     */

    /**
     * @var string
     */
    private $displayColorMax;

    /**
     * @var string
     */
    private $ogRange;

    /**
     * @var string
     */
    private $fgRange;

    /**
     * @var string
     */
    private $ibuRange;

    /**
     * @var string
     */
    private $carbRange;

    /**
     * @var string
     */
    private $colorRange;

    /**
     * @var string
     */
    private $abvRange;

    /**
     * @param float $abvMax
     */
    public function setAbvMax($abvMax)
    {
        $this->abvMax = $abvMax;
    }

    /**
     * @return float
     */
    public function getAbvMax()
    {
        return $this->abvMax;
    }

    /**
     * @param float $abvMin
     */
    public function setAbvMin($abvMin)
    {
        $this->abvMin = $abvMin;
    }

    /**
     * @return float
     */
    public function getAbvMin()
    {
        return $this->abvMin;
    }

    /**
     * @param float $carbMax
     */
    public function setCarbMax($carbMax)
    {
        $this->carbMax = $carbMax;
    }

    /**
     * @return float
     */
    public function getCarbMax()
    {
        return $this->carbMax;
    }

    /**
     * @param float $carbMin
     */
    public function setCarbMin($carbMin)
    {
        $this->carbMin = $carbMin;
    }

    /**
     * @return float
     */
    public function getCarbMin()
    {
        return $this->carbMin;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $categoryNumber
     */
    public function setCategoryNumber($categoryNumber)
    {
        $this->categoryNumber = $categoryNumber;
    }

    /**
     * @return string
     */
    public function getCategoryNumber()
    {
        return $this->categoryNumber;
    }

    /**
     * @param number $colorMax
     */
    public function setColorMax($colorMax)
    {
        $this->colorMax = $colorMax;
    }

    /**
     * @return number
     */
    public function getColorMax()
    {
        return $this->colorMax;
    }

    /**
     * @param number $colorMin
     */
    public function setColorMin($colorMin)
    {
        $this->colorMin = $colorMin;
    }

    /**
     * @return number
     */
    public function getColorMin()
    {
        return $this->colorMin;
    }

    /**
     * @param string $examples
     */
    public function setExamples($examples)
    {
        $this->examples = $examples;
    }

    /**
     * @return string
     */
    public function getExamples()
    {
        return $this->examples;
    }

    /**
     * @param float $fgMax
     */
    public function setFgMax($fgMax)
    {
        $this->fgMax = $fgMax;
    }

    /**
     * @return float
     */
    public function getFgMax()
    {
        return $this->fgMax;
    }

    /**
     * @param float $fgMin
     */
    public function setFgMin($fgMin)
    {
        $this->fgMin = $fgMin;
    }

    /**
     * @return float
     */
    public function getFgMin()
    {
        return $this->fgMin;
    }

    /**
     * @param float $ibuMax
     */
    public function setIbuMax($ibuMax)
    {
        $this->ibuMax = $ibuMax;
    }

    /**
     * @return float
     */
    public function getIbuMax()
    {
        return $this->ibuMax;
    }

    /**
     * @param float $ibuMin
     */
    public function setIbuMin($ibuMin)
    {
        $this->ibuMin = $ibuMin;
    }

    /**
     * @return float
     */
    public function getIbuMin()
    {
        return $this->ibuMin;
    }

    /**
     * @param string $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return string
     */
    public function getIngredients()
    {
        return $this->ingredients;
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
     * @param float $ogMax
     */
    public function setOgMax($ogMax)
    {
        $this->ogMax = $ogMax;
    }

    /**
     * @return float
     */
    public function getOgMax()
    {
        return $this->ogMax;
    }

    /**
     * @param float $ogMin
     */
    public function setOgMin($ogMin)
    {
        $this->ogMin = $ogMin;
    }

    /**
     * @return float
     */
    public function getOgMin()
    {
        return $this->ogMin;
    }

    /**
     * @param string $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return string
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param string $styleGuide
     */
    public function setStyleGuide($styleGuide)
    {
        $this->styleGuide = $styleGuide;
    }

    /**
     * @return string
     */
    public function getStyleGuide()
    {
        return $this->styleGuide;
    }

    /**
     * @param string $styleLetter
     */
    public function setStyleLetter($styleLetter)
    {
        $this->styleLetter = $styleLetter;
    }

    /**
     * @return string
     */
    public function getStyleLetter()
    {
        return $this->styleLetter;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
     * ABV Range for this style such as "4.5-5.5%"
     *
     * @param string $abvRange
     */
    public function setAbvRange($abvRange)
    {
        $this->abvRange = $abvRange;
    }

    /**
     * ABV Range for this style such as "4.5-5.5%"
     *
     * @return string
     */
    public function getAbvRange()
    {
        return $this->abvRange;
    }

    /**
     * Carbonation range in volumes such as "2.0-2.6 vols"
     *
     * @param string $carbRange
     */
    public function setCarbRange($carbRange)
    {
        $this->carbRange = $carbRange;
    }

    /**
     * Carbonation range in volumes such as "2.0-2.6 vols"
     *
     * @return string
     */
    public function getCarbRange()
    {
        return $this->carbRange;
    }

    /**
     * Color range such as "10-20 SRM"
     *
     * @param string $colorRange
     */
    public function setColorRange($colorRange)
    {
        $this->colorRange = $colorRange;
    }

    /**
     * Color range such as "10-20 SRM"
     *
     * @return string
     */
    public function getColorRange()
    {
        return $this->colorRange;
    }

    /**
     * Maximum color in user defined units such as "20 srm"
     *
     * @param string $displayColorMax
     */
    public function setDisplayColorMax($displayColorMax)
    {
        $this->displayColorMax = $displayColorMax;
    }

    /**
     * Maximum color in user defined units such as "20 srm"
     *
     * @return string
     */
    public function getDisplayColorMax()
    {
        return $this->displayColorMax;
    }

    /**
     * Minimum color in user defined units such as "30 srm".
     *
     * @param string $displayColorMin
     */
    public function setDisplayColorMin($displayColorMin)
    {
        $this->displayColorMin = $displayColorMin;
    }

    /**
     * Minimum color in user defined units such as "30 srm".
     *
     * @return string
     */
    public function getDisplayColorMin()
    {
        return $this->displayColorMin;
    }

    /**
     * Final gravity maximum in user defined units such as "1.019 sg".
     *
     * @param string $displayFgMax
     */
    public function setDisplayFgMax($displayFgMax)
    {
        $this->displayFgMax = $displayFgMax;
    }

    /**
     * Final gravity maximum in user defined units such as "1.019 sg".
     *
     * @return string
     */
    public function getDisplayFgMax()
    {
        return $this->displayFgMax;
    }

    /**
     * Final gravity minimum in user defined units such as "1.010 sg".
     *
     * @param string $displayFgMin
     */
    public function setDisplayFgMin($displayFgMin)
    {
        $this->displayFgMin = $displayFgMin;
    }

    /**
     * Final gravity minimum in user defined units such as "1.010 sg".
     *
     * @return string
     */
    public function getDisplayFgMin()
    {
        return $this->displayFgMin;
    }

    /**
     * Original gravity max in user defined units such as "1.056 sg"
     *
     * @param string $displayOgMax
     */
    public function setDisplayOgMax($displayOgMax)
    {
        $this->displayOgMax = $displayOgMax;
    }

    /**
     * Original gravity max in user defined units such as "1.056 sg"
     *
     * @return string
     */
    public function getDisplayOgMax()
    {
        return $this->displayOgMax;
    }

    /**
     * Original gravity minimum in user defined units such as "1.036 sg".
     *
     * @param string $displayOgMin
     */
    public function setDisplayOgMin($displayOgMin)
    {
        $this->displayOgMin = $displayOgMin;
    }

    /**
     * Original gravity minimum in user defined units such as "1.036 sg".
     *
     * @return string
     */
    public function getDisplayOgMin()
    {
        return $this->displayOgMin;
    }

    /**
     * Final gravity range such as "1.010-1.015 sg"
     *
     * @param string $fgRange
     */
    public function setFgRange($fgRange)
    {
        $this->fgRange = $fgRange;
    }

    /**
     * Final gravity range such as "1.010-1.015 sg"
     *
     * @return string
     */
    public function getFgRange()
    {
        return $this->fgRange;
    }

    /**
     * Bitterness range in IBUs such as "10-20 IBU"
     *
     * @param string $ibuRange
     */
    public function setIbuRange($ibuRange)
    {
        $this->ibuRange = $ibuRange;
    }

    /**
     * Bitterness range in IBUs such as "10-20 IBU"
     *
     * @return string
     */
    public function getIbuRange()
    {
        return $this->ibuRange;
    }

    /**
     * Original gravity range for the style such as "1.030-1.040 sg"
     *
     * @param string $ogRange
     */
    public function setOgRange($ogRange)
    {
        $this->ogRange = $ogRange;
    }

    /**
     * Original gravity range for the style such as "1.030-1.040 sg"
     *
     * @return string
     */
    public function getOgRange()
    {
        return $this->ogRange;
    }

}
