<?php


namespace BeerXML\Parser;


class Style extends Record
{
    protected $tagName = 'STYLE';

    /**
     * @var \XMLReader
     */
    protected $xmlReader;

    /**
     * Tags that map to simple values and the corresponding setter method on the record class
     *
     * @var array
     */
    protected $simpleProperties = array(
        'NAME'            => 'setName',
        'VERSION'         => 'setVersion',
        'CATEGORY'        => 'setCategory',
        'CATEGORY_NUMBER' => 'setCategoryNumber',
        'STYLE_LETTER'    => 'setStyleLetter',
        'STYLE_GUIDE'     => 'setStyleGuide',
        'VERSION'         => 'setVersion',
        'TYPE'            => 'setType',
        'OG_MIN'          => 'setOgMin',
        'OG_MAX'          => 'setOgMax',
        'FG_MIN'          => 'setFgMin',
        'FG_MAX'          => 'setFgMax',
        'IBU_MIN'         => 'setIbuMin',
        'IBU_MAX'         => 'setIbuMax',
        'COLOR_MIN'       => 'setColorMin',
        'COLOR_MAX'       => 'setColorMax',
        'ABV_MIN'         => 'setAbvMin',
        'ABV_MAX'         => 'setAbvMax',
        'CARB_MIN'        => 'setCarbMin',
        'CARB_MAX'        => 'setCarbMax',
        'NOTES'           => 'setNotes',
        'PROFILE'         => 'setProfile',
        'INGREDIENTS'     => 'setIngredients',
        'EXAMPLES'        => 'setExamples',
    );

    /**
     * @return \BeerXML\Record\Style
     */
    protected function createRecord()
    {
        return new \BeerXML\Record\Style();
    }

}