<?php


namespace BeerXML\Parser;


class Style extends Record
{
    protected $tagName = 'STYLE';

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
     * @return IStyle
     */
    protected function createRecord()
    {
        $style = $this->recordFactory->getStyle();
        if ($style instanceof IStyleDisplay) {
            $this->simpleProperties = array_merge(
                $this->simpleProperties,
                array(
                    'DISPLAY_OG_MIN'    => 'setDisplayOgMin',
                    'DISPLAY_OG_MAX'    => 'setDisplayOgMax',
                    'DISPLAY_FG_MIN'    => 'setDisplayFgMin',
                    'DISPLAY_FG_MAX'    => 'setDisplayFgMax',
                    'DISPLAY_COLOR_MIN' => 'setDisplayColorMin',
                    'DISPLAY_COLOR_MAX' => 'setDisplayColorMax',
                    'OG_RANGE'          => 'setOgRange',
                    'FG_RANGE'          => 'setFgRange',
                    'IBU_RANGE'         => 'setIbuRange',
                    'CARB_RANGE'        => 'setCarbRange',
                    'COLOR_RANGE'       => 'setColorRange',
                    'ABV_RANGE'         => 'setAbvRange',
                )
            );
        }
        return $style;
    }

}