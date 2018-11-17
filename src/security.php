<?php

if (!function_exists('get_csrf_token')) {
    /**
     * @return mixed
     */
    function get_csrf_token()
    {
        return Yii::$app->request->csrfToken;
    }
}


if (!function_exists('get_csrf_input')) {
    /**
     * @return string
     */
    function get_csrf_input()
    {
        $scrf_token = get_csrf_token();
        $csrf_param = Yii::$app->request->csrfParam;

        return <<<HTML
<input id="$csrf_param" type="hidden" name="$csrf_param" value="$scrf_token"/>
HTML;

    }
}