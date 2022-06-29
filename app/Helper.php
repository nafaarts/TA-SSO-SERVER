<?php

function random_color()
{
    $hex = "#";
    for ($i = 0; $i < 3; $i++) {
        $hex .= str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    };
    return $hex;
}
