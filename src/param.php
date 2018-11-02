<?php

/**
 * Return a param from application params section
 */
if (!function_exists('app_param')) {
    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function app_param($key, $default = null) {
        return array_get(app()->params, $key, $default);
    }
}
/**
 * Return a param from application view params
 */
if (!function_exists('view_param')) {
    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    function view_param($key, $default = null) {
        return array_get(app()->view->params, $key, $default);
    }
}