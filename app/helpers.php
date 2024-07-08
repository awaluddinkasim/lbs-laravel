<?php

if (!function_exists('convertToNumber')) {
    function convertToNumber($value)
    {
        return str_replace(',', '', $value);
    }
}
