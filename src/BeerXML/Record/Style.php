<?php


namespace BeerXML\Record;


class Style
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
     * @var string
     */
    private $name;

    /**
     * Category that this style belongs to – usually associated with a group of styles such as "English Ales" or
     * "Amercian Lagers".
     * @var string
     */
    private $category;

    /**
     * Version of the style record.  Should always be "1" for this version of the XML standard.
     * @var int
     */
    private $version = 1;

    /**
     * Number or identifier associated with this style category.  For example in the BJCP style guide, the
     * "American Lager" category has a category number of "1".
     * @var string
     */
    private $categoryNumber;

    /**
     * The specific style number or subcategory letter associated with this particular style.  For example in the BJCP
     * style guide, an American Standard Lager would be style letter "A" under the main category.  Letters should be
     * upper case.
     * @var string
     */
    private $styleLetter;

    /**
     * The name of the style guide that this particular style or category belongs to.  For example "BJCP" might denote
     * the BJCP style guide, and "AHA" would be used for the AHA style guide.
     * @var string
     */
    private $styleGuide;

    /**
     * May be "Lager", "Ale", "Mead", "Wheat", "Mixed" or "Cider".  Defines the type of beverage associated with this
     * category.
     * @var string
     */
    private $type;

    /**
     * The minimum specific gravity as measured relative to water.  For example "1.040" might be a reasonable minimum
     * for a Pale Ale.
     * @var float
     */
    private $ogMin;

    /**
     * The maximum specific gravity as measured relative to water.
     * @var float
     */
    private $ogMax;

    /**
     * The minimum final gravity as measured relative to water.
     * @var float
     */
    private $fgMin;

    /**
     * The maximum final gravity as measured relative to water.
     * @var float
     */
    private $fgMax;

    /**
     * The recommended minimum bitterness for this style as measured in International Bitterness Units (IBUs)
     * @var float
     */
    private $ibuMin;

    /**
     * The recommended maximum bitterness for this style as measured in International Bitterness Units (IBUs)
     * @var float
     */
    private $ibuMax;

    /**
     * The minimum recommended color in SRM
     * @var number
     */
    private $colorMin;

    /**
     * The maximum recommended color in SRM.
     * @var number
     */
    private $colorMax;

    /**
     * Minimum recommended carbonation for this style in volumes of CO2
     * @var float
     */
    private $carbMin;

    /**
     * The maximum recommended carbonation for this style in volumes of CO2
     * @var float
     */
    private $carbMax;

    /**
     * The minimum recommended alcohol by volume as a percentage.
     * @var float
     */
    private $abvMin;

    /**
     * The maximum recommended alcohol by volume as a percentage.
     * @var float
     */
    private $abvMax;

    /**
     * Description of the style, history
     * @var string
     */
    private $notes;

    /**
     * Flavor and aroma profile for this style
     * @var string
     */
    private $profile;

    /**
     * Suggested ingredients for this style
     * @var string
     */
    private $ingredients;

    /**
     * Example beers of this style.
     * @var string
     */
    private $examples;

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


}