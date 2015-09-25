<?php
function getStylePatch($patch)
{
    echo '<link href="' . $patch . 'css/roboto.min.css" rel="stylesheet"/>'
        . '<link href="' . $patch . 'css/bootstrap.min.css" rel="stylesheet"/>'
        . '<link href ="' . $patch . 'css/material.min.css" rel = "stylesheet" />'
        . '<link href ="' . $patch . 'css/ripples.min.css" rel = "stylesheet" />'
        . '<link href ="' . $patch . 'css/font-awesome.min.css" rel = "stylesheet" />'
        . '<link href ="' . $patch . 'css/custom_style.css" rel = "stylesheet" />';
}

function getSctiptPatch($patch)
{
    echo '<script type="application/javascript" src="' . $patch . 'js/jquery.js?v=1"></script>'
        . '<script type="application/javascript" src="' . $patch . 'js/material.min.js?v=1"></script>'
        . '<script type="application/javascript" src="' . $patch . 'js/bootstrap.min.js?v=1"></script>'
        . '<script type="application/javascript" src="' . $patch . 'js/angular.min.js?v=1"></script>'
        . '<script type="application/javascript" src="' . $patch . 'js/parallax.min.js?v=1"></script>';
}

?>