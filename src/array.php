<?php

/**
 * Get a value from an array
 */
if (!function_exists('array_get')) {
    /**
     * @param array $source
     * @param $key
     * @param null $default
     * @return mixed
     */
    function array_get(array $source = array(), $key, $default = null) {
        return \yii\helpers\ArrayHelper::getValue($source, $key, $default);
    }
}