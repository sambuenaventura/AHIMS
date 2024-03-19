<?php

if (!function_exists('decryptField')) {
    function decryptField($value)
    {
        if ($value !== null) {
            return decrypt($value);
        }
        return $value;
    }
}

// You can add more helper functions here if needed
