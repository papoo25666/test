<?php

class Style
{
    static function getStylePatch($patch)
    {
        echo '<link href="' . $patch . 'css/bootstrap.min.css" rel="stylesheet"/>'
            . '<link href ="' . $patch . 'css/font-awesome.min.css" rel = "stylesheet" />'
            . '<link href ="' . $patch . 'css/custom_style.css" rel = "stylesheet" />';
    }

    static function getSctiptPatch($patch)
    {

    }
}

?>