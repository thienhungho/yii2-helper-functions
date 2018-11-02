<?php
/**
 * @return \yii\console\Application|\yii\web\Application
 */
function app()
{
    return Yii::$app;
}

/**
 * @return mixed
 */
function get_app_name()
{
    return Yii::$app->name;
}

/**
 * @param $url
 *
 * @return string
 */
function home($url)
{
    return $_SERVER['HTTP_HOST'] . "/" . $url;
}

/**
 * @param $content
 * @param $word_limit
 *
 * @return string
 */
function get_description($content, $word_limit)
{
    $text = strip_tags($content);
    if (str_word_count($text, 0) > $word_limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$word_limit]) . '...';
    }

    return $text;
}

/**
 * @return \yii\console\Request|\yii\web\Request
 */
function request()
{
    return Yii::$app->request;
}

/**
 * @return \yii\console\Response|\yii\web\Response
 */
function response()
{
    return Yii::$app->response;
}

/**
 * @return \yii\console\Controller|\yii\web\Controller
 */
function controller()
{
    return Yii::$app->controller;
}

/**
 * @return \yii\base\View|\yii\web\View
 */
function view()
{
    return Yii::$app->view;
}

/**
 * @return mixed
 */
function get_current_url()
{
    return request()->hostInfo . request()->url;
}

/**
 * @return mixed
 */
function get_primary_language()
{
    return require Yii::getAlias('@common') . '/config/language.php';
}

/**
 *
 */
function begin_body()
{
    echo view()->beginBody();
}

/**
 *
 */
function end_body()
{
    echo view()->endBody();
    view()->registerJs(
        get_setting_value('template_configuration', 'custom_script_code', '')
    );
    echo get_setting_value('site_configuration', 'google_analytics_tracking_code', '');
}

/**
 *
 */
function end_page()
{
    echo view()->endPage();
}

/**
 * @return bool
 */
function is_home()
{
    $controller = controller();
    $default_controller = Yii::$app->defaultRoute;

    return (($controller->id === $default_controller)
        && ($controller->action->id === $controller->defaultAction)) ? true : false;
}

/**
 * @param $name
 *
 * @return mixed
 */
function is_enabled_plugin($name)
{
    $data = get_setting_value(
        'plugin_configuration',
        $name,
        \backend\modules\PluginConfiguration\PluginForm::STATUS_DISABLED
    );
    if ($data == \backend\modules\PluginConfiguration\PluginForm::STATUS_DISABLED) {
        return false;
    }

    return true;
}
