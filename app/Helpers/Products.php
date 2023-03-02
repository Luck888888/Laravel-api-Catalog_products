<?php

if (!function_exists('get_product_allowed_filter_fields')) {
    /**
     * @param false $implode
     *
     * @return array|string
     */
    function get_product_allowed_filter_fields(bool $implode = false)
    {
        $allowed_filter_fields = collect(config("app.filters.products", []));
        return $implode ? $allowed_filter_fields->implode(',') : $allowed_filter_fields->toArray();
    }
}

