<?php

if (!function_exists('constant_list')) {
    function constant_list(string $class): array
    {
        if (!class_exists($class)) {
            return [];
        }

        $reflection = new \ReflectionClass($class);
        $constants = $reflection->getConstants();

        $result = [];
        foreach ($constants as $name => $value) {
            // Make label from constant name: FASHION => Fashion
            $label = ucwords(strtolower(str_replace('_', ' ', $name)));
            $result[$value] = $label;
        }

        return $result;
    }
}

if (!function_exists('image_to_base64')) {
    function image_to_base64($url)
    {
        $image = file_get_contents($url);
        return base64_encode($image);
    }
}
