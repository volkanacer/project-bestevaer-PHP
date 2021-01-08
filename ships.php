<?php

function GetShip($name)
{
    $ships = array(
        "hermes" => array(
            "photo" => "<img src=img/hermes.jpg",
            "GT"  => 3806,
            "M3" => 6842.8,
            "naam" => "Hermes"
        ),
        "lucky" => array(
            "photo" => "<img src=img/lucky.jpg",
            "GT"  => 4178,
            "M3" => 7527.7,
            "naam" => "Lucky Star"
        ),
        "nsangela" => array(
            "photo" => "<img src=img/nsangela.jpg",
            "GT"  => 3806,
            "M3" => 6842.8,
            "naam" => "NS Angela"
        ),
        "sabrina" => array(
            "photo" => "<img src=img/sabrina.jpg",
            "GT"  => 6278,
            "M3" => 12416,
            "naam" => "Sabrina"
        ),
        "triumph" => array(
            "photo" => "<img src=img/triumph.jpg",
            "GT" => 4039,
            "M3" => 8262,
            "naam" => "Triumph IV"
        ),
    );
    return $ships[$name];
}

?>