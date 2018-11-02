<?php

/**
 * Return the cache component
 */
if (!function_exists('cache')) {
    /**
     * @return \yii\caching\Cache
     */
    function cache() {
        return app_get('cache');
    }
}