<?php


if (!function_exists('getImageUrl')) {

    function getImageUrl($imageString)
    {
        $images = explode(',', $imageString ?? '');
        return $images[0] ?? '';
    }
}

if (!function_exists('getMultipleImages')) {
    function getMultipleImages($imageString)
    {
        $images = explode(',', $imageString ?? '');
        return $images;
    }
}
