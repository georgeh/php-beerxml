<?php


namespace BeerXML\Generator;


class Style extends Record
{
    protected $tagName = 'STYLE';

    /**
     * @var \BeerXML\Record\MashStep
     */
    protected $record;

    /**
     * <TAG> => getterMethod
     * @var array
     */
    protected $simpleValues = array(
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
    );

    /**
     * <TAG> => getterMethod
     * @var array
     */
    protected $optionalSimpleValues = array(
        'CARB_MIN'        => 'setCarbMin',
        'CARB_MAX'        => 'setCarbMax',
        'NOTES'           => 'setNotes',
        'PROFILE'         => 'setProfile',
        'INGREDIENTS'     => 'setIngredients',
        'EXAMPLES'        => 'setExamples',
    );


}