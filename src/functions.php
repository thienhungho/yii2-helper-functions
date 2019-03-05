<?php

/**
 * Return the main application singleton
 */
if (!function_exists('app')) {
    /**
     * @return \yii\console\Application|\yii\web\Application
     */
    function app()
    {
        return \Yii::$app;
    }
}

/**
 * Check the named app component
 */
if (!function_exists('app_has')) {
    /**
     * @param $component
     * @param bool $checkInstance
     *
     * @return mixed
     */
    function app_has($component, $checkInstance = false)
    {
        return app()->has($component, $checkInstance);
    }
}

/**
 * Return named app component
 */
if (!function_exists('app_get')) {
    /**
     * @param $component
     *
     * @return null|object
     * @throws \yii\base\InvalidConfigException
     */
    function app_get($component) {
        return app()->get($component);
    }
}

/**
 * Set named app component
 */
if (!function_exists('app_set')) {
    /**
     * @param $component
     * @param null $options
     *
     * @throws \yii\base\InvalidConfigException
     */
    function app_set($component, $options = null) {
        return app()->set($component, $options);
    }
}

/**
 * Return the request object
 */
if (!function_exists('request')) {
    /**
     * @return null|object
     * @throws \yii\base\InvalidConfigException
     */
    function request() {
        return app_get('request');
    }
}
/**
 * Return the response object
 */
if (!function_exists('response')) {
    /**
     * @return null|object
     * @throws \yii\base\InvalidConfigException
     */
    function response() {
        return app_get('response');
    }
}

/**
 * Return the user object
 */
if (!function_exists('user')) {
    /**
     * @return null|object
     * @throws \yii\base\InvalidConfigException
     */
    function user() {
        return app_get('user');
    }
}

/**
 * Translation
 */
if (!function_exists('t')) {
    /**
     * @param string $category the message category.
     * @param string $message the message to be translated.
     * @param array $params the parameters that will be used to replace the corresponding placeholders in the message.
     * @param string $language the language code (e.g. `en-US`, `en`). If this is null, the current
     * [[\yii\base\Application::language|application language]] will be used.
     * @return string the translated message.
     */
    function t($category, $message, $params = [], $language = null) {
        return call_user_func_array(['\Yii', 't'], func_get_args());
    }
}

/**
 * Return the security component
 */
if (!function_exists('security')) {
    /**
     * @return \yii\base\Security
     */
    function security() {
        return app()->getSecurity();
    }
}

/**
 * Create the url
 */
if (!function_exists('url')) {
    /**
     * @param array|string $url the parameter to be used to generate a valid URL
     * @param bool|string $scheme the URI scheme to use in the generated URL:
     *
     * - `false` (default): generating a relative URL.
     * - `true`: returning an absolute base URL whose scheme is the same as that in [[\yii\web\UrlManager::$hostInfo]].
     * - string: generating an absolute URL with the specified scheme (either `http`, `https` or empty string
     *   for protocol-relative URL).
     *
     * @return string the generated URL
     * @throws InvalidParamException a relative route is given while there is no active controller
     */
    function url($url = '', $scheme = false) {
        return call_user_func_array(['\yii\helpers\Url', 'to'], func_get_args());
    }
}

/**
 * Get the auth manager
 */
if (!function_exists('auth_manager')) {
    /**
     * @return null|object
     * @throws \yii\base\InvalidConfigException
     */
    function auth_manager() {
        return app_get('authManager');
    }
}

/**
 * Get the assets bundle url
 */
if (!function_exists('asset_bundle_url')) {
    /**
     * @param string $className
     * @param string $uri
     * @return string
     */
    function asset_bundle_url($className, $uri = '') {
        return rtrim(asset_manager()->getBundle($className)->baseUrl, '/') . '/' . ltrim($uri, '/');
    }
}

/**
 * Log error
 */
if (!function_exists('log_error')) {
    /**
     * @param $message
     * @param string $category
     */
    function log_error($message, $category = 'application') {
        return \Yii::error($message, $category);
    }
}
/**
 * Log info
 */
if (!function_exists('log_info')) {
    /**
     * @param $message
     * @param string $category
     */
    function log_info($message, $category = 'application') {
        return \Yii::info($message, $category);
    }
}
/**
 * Log warning
 */
if (!function_exists('log_warning')) {
    /**
     * @param $message
     * @param string $category
     */
    function log_warning($message, $category = 'application') {
        return \Yii::warning($message, $category);
    }
}

/**
 * Get the asset manager
 */
if (!function_exists('asset_manager')) {
    /**
     * @return null|object
     * @throws \yii\base\InvalidConfigException
     */
    function asset_manager() {
        return app_get('assetManager');
    }
}

/**
 * Return the mailer component
 */
if (!function_exists('mailer')) {
    /**
     * @return null|object
     * @throws \yii\base\InvalidConfigException
     */
    function mailer() {
        return app_get('mailer');
    }
}
/**
 * Return the session component
 */
if (!function_exists('session')) {
    /**
     * @return null|object
     * @throws \yii\base\InvalidConfigException
     */
    function session() {
        return app_get('session');
    }
}
/**
 * Return the cookie component
 */
if (!function_exists('cookie')) {
    /**
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    function cookie() {
        return request()->getCookies();
    }
}

/**
 * Return encode html string
 */
if (!function_exists('html_encode')) {
    /**
     * @param string $content the content to be encoded
     * HTML entities in `$content` will not be further encoded.
     * @return string the encoded content
     */
    function html_encode($content) {
        return \yii\helpers\Html::encode($content);
    }
}
/**
 * Return decoded html string
 */
if (!function_exists('html_decode')) {
    /**
     * @param string $content the content to be decoded
     * @return string the decoded content
     */
    function html_decode($content) {
        return \yii\helpers\Html::decode($content);
    }
}
/**
 * Return a safe html string
 */
if (!function_exists('html_purify')) {
    /**
     * @param string $content The HTML content to purify
     * @param array|\Closure|null $config The config to use for HtmlPurifier.
     * If not specified or `null` the default config will be used.
     * You can use an array or an anonymous function to provide configuration options:
     *
     * - An array will be passed to the `HTMLPurifier_Config::create()` method.
     * - An anonymous function will be called after the config was created.
     *   The signature should be: `function($config)` where `$config` will be an
     *   instance of `HTMLPurifier_Config`.
     *
     *   Here is a usage example of such a function:
     *
     *   ```php
     *   // Allow the HTML5 data attribute `data-type` on `img` elements.
     *   $content = HtmlPurifier::process($content, function ($config) {
     *     $config->getHTMLDefinition(true)
     *            ->addAttribute('img', 'data-type', 'Text');
     *   });
     * ```
     *
     * @return string the purified HTML content.
     */
    function html_purify($content, $config = null) {
        return \yii\helpers\HtmlPurifier::process($content, $config);
    }
}
/**
 * Set an alias for the app
 */
if (!function_exists('set_alias')) {
    /**
     * @param string $alias the alias name (e.g. "@yii"). It must start with a '@' character.
     * It may contain the forward slash '/' which serves as boundary character when performing
     * alias translation by [[getAlias()]].
     * @param string $path the path corresponding to the alias. If this is null, the alias will
     * be removed. Trailing '/' and '\' characters will be trimmed. This can be
     *
     * - a directory or a file path (e.g. `/tmp`, `/tmp/main.txt`)
     * - a URL (e.g. `http://www.yiiframework.com`)
     * - a path alias (e.g. `@yii/base`). In this case, the path alias will be converted into the
     *   actual path first by calling [[getAlias()]].
     *
     * @return void
     */
    function set_alias($alias, $path) {
        return \Yii::setAlias($alias, $path);
    }
}
/**
 * Return an alias from the app
 */
if (!function_exists('get_alias')) {
    /**
     * @param string $alias the alias to be translated.
     * @param bool $throwException whether to throw an exception if the given alias is invalid.
     * If this is false and an invalid alias is given, false will be returned by this method.
     * @return string|bool the path corresponding to the alias, false if the root alias is not previously registered.
     * @throws InvalidParamException if the alias is invalid while $throwException is true.
     */
    function get_alias($alias, $throwException = true) {
        return \Yii::getAlias($alias, $throwException);
    }
}
/**
 * Get App Name
 */
if (!function_exists('get_app_name')) {
    /**
     * @return mixed
     */
    function get_app_name()
    {
        return Yii::$app->name;
    }
}
/**
 * Home
 */
if (!function_exists('home')) {
    /**
     * @param $url
     *
     * @return string
     */
    function home($url)
    {
        return $_SERVER['HTTP_HOST'] . "/" . $url;
    }
}
/**
 * Get Description
 */
if (!function_exists('get_description')) {
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
}
/**
 * Controller
 */
if(!function_exists('controller')) {
    /**
     * @return \yii\console\Controller|\yii\web\Controller
     */
    function controller()
    {
        return \Yii::$app->controller;
    }
}
/**
 * View
 */
if(!function_exists('view')) {
    /**
     * @return \yii\base\View|\yii\web\View
     */
    function view()
    {
        return \Yii::$app->view;
    }
}
/**
 * Get Current Url
 */
if(!function_exists('get_current_url')) {
    /**
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    function get_current_url()
    {
        return request()->hostInfo . request()->url;
    }
}
/**
 * Get Primary Language
 */
if(!function_exists('get_primary_language')) {
    /**
     * @return mixed
     */
    function get_primary_language()
    {
        return require \Yii::getAlias('@common') . '/config/language.php';
    }
}
/**
 * Begin Body
 */
if(!function_exists('begin_body')) {
    /**
     *
     */
    function begin_body()
    {
        echo view()->beginBody();
    }
}
/**
 * End Body
 */
if(!function_exists('end_body')) {
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
}
/**
 * End Page
 */
if(!function_exists('end_page')) {
    /**
     *
     */
    function end_page()
    {
        echo view()->endPage();
    }
}
/**
 * Is Home
 */
if(!function_exists('is_home')) {
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
}
/**
 * Is Enabled Plugin
 */
if(!function_exists('is_enabled_plugin')) {
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
}
