<?php

if (!function_exists('convertToNumber')) {
    function convertToNumber($value): int
    {
        return (int) str_replace(',', '', $value);
    }
}
