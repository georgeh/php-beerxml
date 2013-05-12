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
     *
     * @var array
     */
    protected $simpleValues = array(
        'NAME'            => 'getName',
        'VERSION'         => 'getVersion',
        'CATEGORY'        => 'getCategory',
        'CATEGORY_NUMBER' => 'getCategoryNumber',
        'STYLE_LETTER'    => 'getStyleLetter',
        'STYLE_GUIDE'     => 'getStyleGuide',
        'TYPE'            => 'getType',
        'OG_MIN'          => 'getOgMin',
        'OG_MAX'          => 'getOgMax',
        'FG_MIN'          => 'getFgMin',
        'FG_MAX'          => 'getFgMax',
        'IBU_MIN'         => 'getIbuMin',
        'IBU_MAX'         => 'getIbuMax',
        'COLOR_MIN'       => 'getColorMin',
        'COLOR_MAX'       => 'getColorMax',
        'ABV_MIN'         => 'getAbvMin',
        'ABV_MAX'         => 'getAbvMax',
    );

    /**
     * <TAG> => getterMethod
     *
     * @var array
     */
    protected $optionalSimpleValues = array(
        'CARB_MIN'    => 'getCarbMin',
        'CARB_MAX'    => 'getCarbMax',
        'NOTES'       => 'getNotes',
        'PROFILE'     => 'getProfile',
        'INGREDIENTS' => 'getIngredients',
        'EXAMPLES'    => 'getExamples',
    );

    protected $displayInterface = 'BeerXML\Generator\IStyleDisplay';

    protected $displayValues = array(
        'DISPLAY_OG_MIN'    => 'getDisplayOgMin',
        'DISPLAY_OG_MAX'    => 'getDisplayOgMax',
        'DISPLAY_FG_MIN'    => 'getDisplayFgMin',
        'DISPLAY_FG_MAX'    => 'getDisplayFgMax',
        'DISPLAY_COLOR_MIN' => 'getDisplayColorMin',
        'DISPLAY_COLOR_MAX' => 'getDisplayColorMax',
        'OG_RANGE'          => 'getOgRange',
        'FG_RANGE'          => 'getFgRange',
        'IBU_RANGE'         => 'getIbuRange',
        'CARB_RANGE'        => 'getCarbRange',
        'COLOR_RANGE'       => 'getColorRange',
        'ABV_RANGE'         => 'getAbvRange',
    );

}