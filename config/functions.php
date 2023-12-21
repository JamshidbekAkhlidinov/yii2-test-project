<?php
/*
 *   Jamshidbek Akhlidinov
 *   13 - 10 2023 16:27:34
 *   https://github.com/JamshidbekAkhlidinov
 */

if (!function_exists('app')) {
    function app()
    {
        return Yii::$app;
    }
}
if (!function_exists('controller')) {
    function controller()
    {
        return Yii::$app->controller;
    }
}

if (!function_exists('user')) {
    function user()
    {
        return Yii::$app->user;
    }
}

if (!function_exists('security')) {
    function security()
    {
        return Yii::$app->security;
    }
}
if (!function_exists('authManager')) {
    function authManager()
    {
        return Yii::$app->authManager;
    }
}

if (!function_exists('translate')) {
    function translate($text, $options = []): string
    {
        return Yii::t('app', $text, $options);
    }
}


if (!function_exists('request')) {
    function request()
    {
        return Yii::$app->request;
    }
}

if (!function_exists('response')) {
    function response()
    {
        return Yii::$app->response;
    }
}


if (!function_exists('get')) {
    function get($attribute)
    {
        return Yii::$app->request->get($attribute);
    }
}


if (!function_exists('post')) {
    function post($attribute)
    {
        return Yii::$app->request->post($attribute);
    }
}

if (!function_exists('setFlash')) {
    function setFlash($category = 'warning', $message = '')
    {
        Yii::$app->session->setFlash($category, $message);
    }
}
