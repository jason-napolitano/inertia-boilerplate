<?php

// ---------------------------------------------------
// If the function doesn't exist, let's create it!
if (!function_exists('uc_first')) {
    /**
     * Enhanced version of ucfirst() where the
     * first `n` characters are capitalized
     *
     * @param string $string
     * @param int    $n
     *
     * @return string
     */
    function uc_first(string $string, int $n = 1): string
    {
        $result = substr($string, 0, $n);
        return strtoupper($result) . substr($string, $n);
    }
}
