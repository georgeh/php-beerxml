<?php


namespace BeerXML\Parser;


interface IStyleWriter
{

    /**
     * @param float $abvMax
     */
    public function setAbvMax($abvMax);

    /**
     * @param float $abvMin
     */
    public function setAbvMin($abvMin);

    /**
     * @param float $carbMax
     */
    public function setCarbMax($carbMax);

    /**
     * @param float $carbMin
     */
    public function setCarbMin($carbMin);

    /**
     * @param string $category
     */
    public function setCategory($category);

    /**
     * @param string $categoryNumber
     */
    public function setCategoryNumber($categoryNumber);

    /**
     * @param number $colorMax
     */
    public function setColorMax($colorMax);

    /**
     * @param number $colorMin
     */
    public function setColorMin($colorMin);

    /**
     * @param string $examples
     */
    public function setExamples($examples);

    /**
     * @param float $fgMax
     */
    public function setFgMax($fgMax);

    /**
     * @param float $fgMin
     */
    public function setFgMin($fgMin);

    /**
     * @param float $ibuMax
     */
    public function setIbuMax($ibuMax);

    /**
     * @param float $ibuMin
     */
    public function setIbuMin($ibuMin);

    /**
     * @param string $ingredients
     */
    public function setIngredients($ingredients);

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @param string $notes
     */
    public function setNotes($notes);

    /**
     * @param float $ogMax
     */
    public function setOgMax($ogMax);

    /**
     * @param float $ogMin
     */
    public function setOgMin($ogMin);

    /**
     * @param string $profile
     */
    public function setProfile($profile);

    /**
     * @param string $styleGuide
     */
    public function setStyleGuide($styleGuide);

    /**
     * @param string $styleLetter
     */
    public function setStyleLetter($styleLetter);

    /**
     * @param string $type
     */
    public function setType($type);

    /**
     * @param int $version
     */
    public function setVersion($version);
}