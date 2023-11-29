<?php


if (!function_exists('getImageUrl')) {

    function getImageUrl($imageString)
    {
        $images = explode(',', $imageString ?? '');
        return $images[0] ?? '';
    }
}
