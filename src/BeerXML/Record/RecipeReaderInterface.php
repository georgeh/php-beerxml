<?php


namespace BeerXML\Record;


interface RecipeReaderInterface
{
    const TYPE_EXTRACT = 'Extract';
    const TYPE_PARTIAL_MASH = 'Partial Mash';
    const TYPE_ALL_GRAIN = 'All Grain';

    /**
     * The time to age the beer in days after bottling.
     *
     * @return number Time (days)
     */
    public function getAge();

    /**
     * Temperature for aging the beer after bottling.
     *
     * @return number Temperature C
     */
    public function getAgeTemp();

    /**
     * Optional name of the assistant brewer
     *
     * @return string
     */
    public function getAsstBrewer();

    /**
     *
     * @return float
     */
    public function getBatchSize();

    /**
     * @return float
     */
    public function getBoilSize();

    /**
     * @return number
     */
    public function getBoilTime();

    /**
     * @return string
     */
    public function getBrewer();

    /**
     * @return float
     */
    public function getCarbonation();

    /**
     * @return number
     */
    public function getCarbonationTemp();

    /**
     * @return string
     */
    public function getDate();

    /**
     * @return float
     */
    public function getEfficiency();

    /**
     * An equipment record is optional.  If included the BATCH_SIZE and BOIL_SIZE in the equipment record must match
     * the values in this recipe record.
     *
     * @return \BeerXML\Record\Equipment
     */
    public function getEquipment();

    /**
     * @return array
     */
    public function getFermentables();

    /**
     * @return int
     */
    public function getFermentationStages();

    /**
     * @return float
     */
    public function getFg();

    /**
     * @return boolean
     */
    public function getForcedCarbonation();

    /**
     * @return array
     */
    public function getHops();

    /**
     * @return float
     */
    public function getKegPrimingFactor();

    /**
     * @return \BeerXML\Record\MashProfile
     */
    public function getMash();

    /**
     * @return array
     */
    public function getMiscs();

    /**
     * Name of the recipe.
     *
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
    public function getOg();

    /**
     * @return number
     */
    public function getPrimaryAge();

    /**
     * @return number
     */
    public function getPrimaryTemp();

    /**
     * @return float
     */
    public function getPrimingSugarEquiv();

    /**
     * @return string
     */
    public function getPrimingSugarName();

    /**
     * @return number
     */
    public function getSecondaryAge();

    /**
     * @return number
     */
    public function getSecondaryTemp();

    /**
     * The style of the beer this recipe is associated with.  All of the required items for a valid style should be
     * between the <STYLE>…</STYLE> tags.
     *
     * @return \BeerXML\Record\Style
     */
    public function getStyle();

    /**
     * @return string
     */
    public function getTasteNotes();

    /**
     * @return float
     */
    public function getTasteRating();

    /**
     * @return number
     */
    public function getTertiaryAge();

    /**
     * @return number
     */
    public function getTertiaryTemp();

    /**
     * May be one of "Extract", "Partial Mash" or "All Grain"
     *
     * @return string
     */
    public function getType();

    /**
     * Version of the recipe record.  Should always be "1" for this version of the XML standard.
     *
     * @return int
     */
    public function getVersion();

    /**
     * @return array
     */
    public function getWaters();

    /**
     * @return array
     */
    public function getYeasts();
}