<?php


namespace BeerXML\Parser;


interface IRecipeWriter {

    /**
     * @param number $age
     */
    public function setAge($age);

    /**
     * @param number $ageTemp
     */
    public function setAgeTemp($ageTemp);

    /**
     * @param string $asstBrewer
     */
    public function setAsstBrewer($asstBrewer);

    /**
     * @param float $batchSize
     */
    public function setBatchSize($batchSize);

    /**
     * @param float $boilSize
     */
    public function setBoilSize($boilSize);

    /**
     * @param number $boilTime
     */
    public function setBoilTime($boilTime);

    /**
     * @param string $brewer
     */
    public function setBrewer($brewer);

    /**
     * @param float $carbonation
     */
    public function setCarbonation($carbonation);

    /**
     * @param number $carbonationTemp
     */
    public function setCarbonationTemp($carbonationTemp);

    /**
     * @param string $date
     */
    public function setDate($date);

    /**
     * @param float $efficiency
     */
    public function setEfficiency($efficiency);

    /**
     * @param Equipment $equipment
     */
    public function setEquipment($equipment);

    /**
     * @param Fermentable $fermentable
     */
    public function addFermentable($fermentable);

    /**
     * @param int $fermentationStages
     */
    public function setFermentationStages($fermentationStages);

    /**
     * @param float $fg
     */
    public function setFg($fg);

    /**
     * @param boolean $forcedCarbonation
     */
    public function setForcedCarbonation($forcedCarbonation);

    /**
     * @param Hop $hop
     */
    public function addHop($hop);

    /**
     * @param float $kegPrimingFactor
     */
    public function setKegPrimingFactor($kegPrimingFactor);

    /**
     * @param MashProfile $mash
     */
    public function setMash($mash);

    /**
     * @param Misc
     */
    public function addMisc($misc);

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @param string $notes
     */
    public function setNotes($notes);

    /**
     * @param float $og
     */
    public function setOg($og);

    /**
     * @param number $primaryAge
     */
    public function setPrimaryAge($primaryAge);

    /**
     * @param number $primaryTemp
     */
    public function setPrimaryTemp($primaryTemp);

    /**
     * @param float $primingSugarEquiv
     */
    public function setPrimingSugarEquiv($primingSugarEquiv);

    /**
     * @param string $primingSugarName
     */
    public function setPrimingSugarName($primingSugarName);

    /**
     * @param number $secondaryAge
     */
    public function setSecondaryAge($secondaryAge);

    /**
     * @param number $secondaryTemp
     */
    public function setSecondaryTemp($secondaryTemp);

    /**
     * @param Style $style
     */
    public function setStyle($style);

    /**
     * @param string $tasteNotes
     */
    public function setTasteNotes($tasteNotes);

    /**
     * @param float $tasteRating
     */
    public function setTasteRating($tasteRating);

    /**
     * @param number $tertiaryAge
     */
    public function setTertiaryAge($tertiaryAge);

    /**
     * @param number $tertiaryTemp
     */
    public function setTertiaryTemp($tertiaryTemp);

    /**
     * @param string $type
     */
    public function setType($type);

    /**
     * @param int $version
     */
    public function setVersion($version);

    /**
     * @param Water
     */
    public function addWater($water);

    /**
     * @param Yeast
     */
    public function addYeast($yeast);
}