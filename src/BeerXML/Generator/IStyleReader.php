<?php


namespace BeerXML\Generator;


interface IStyleReader {

    /**
     * @return float
     */
    public function getAbvMax();

    /**
     * @return float
     */
    public function getAbvMin();

    /**
     * @return float
     */
    public function getCarbMax();

    /**
     * @return float
     */
    public function getCarbMin();

    /**
     * @return string
     */
    public function getCategory();

    /**
     * @return string
     */
    public function getCategoryNumber();

    /**
     * @return number
     */
    public function getColorMax();

    /**
     * @return number
     */
    public function getColorMin();

    /**
     * @return string
     */
    public function getExamples();

    /**
     * @return float
     */
    public function getFgMax();

    /**
     * @return float
     */
    public function getFgMin();

    /**
     * @return float
     */
    public function getIbuMax();

    /**
     * @return float
     */
    public function getIbuMin();

    /**
     * @return string
     */
    public function getIngredients();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getNotes();

    /**
     * @return float
     */
    public function getOgMax();

    /**
     * @return float
     */
    public function getOgMin();

    /**
     * @return string
     */
    public function getProfile();

    /**
     * @return string
     */
    public function getStyleGuide();

    /**
     * @return string
     */
    public function getStyleLetter();

    /**
     * @return string
     */
    public function getType();

    /**
     * @return int
     */
    public function getVersion();
}