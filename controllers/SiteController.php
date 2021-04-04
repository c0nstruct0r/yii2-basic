<?php

namespace app\controllers;

use app\actions\site\AboutAction;
use app\actions\site\ContactAction;
use app\actions\site\IndexAction;
use app\actions\site\LoginAction;
use app\actions\site\LogoutAction;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'about' => AboutAction::class,
            'contact' => ContactAction::class,
            'index' => IndexAction::class,
            'login' => LoginAction::class,
            'logout' => LogoutAction::class,
            'error' => 'yii\web\ErrorAction',
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

}
