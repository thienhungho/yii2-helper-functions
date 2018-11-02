Yii2 Helper Funtions
====================
Helper functions for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist thienhungho/yii2-helper-functions "*"
```

or add

```
"thienhungho/yii2-helper-functions": "*"
```

to the require section of your `composer.json` file.

Usage
------------

```php

/**
 * @return \yii\console\Application|\yii\web\Application
 */
app();

/**
 * @return string
 */
get_app_name();

/**
 * @param $url
 *
 * @return string
 */
home($url);

/**
 * @param $content
 * @param $word_limit
 *
 * @return string
 */
get_description($content, $word_limit);

/**
 * @return \yii\console\Request|\yii\web\Request
 */
request();

/**
 * @return \yii\console\Response|\yii\web\Response
 */
response();

/**
 * @return \yii\console\Controller|\yii\web\Controller
 */
controller();

/**
 * @return \yii\base\View|\yii\web\View
 */
view();

/**
 * @return mixed
 */
get_current_url();

/**
 * @return mixed
 */
get_primary_language();

/**
 *
 */
begin_body();

/**
 *
 */
end_body();

/**
 *
 */
end_page();

/**
 * @return bool
 */
is_home();

/**
 * @param $name
 *
 * @return mixed
 */
is_enabled_plugin($name);

```