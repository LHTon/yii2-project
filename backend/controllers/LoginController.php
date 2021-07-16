<?php
declare(strict_types=1);


namespace backend\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class LoginController extends Controller
{
    public $layout = false;

    public $enableCsrfValidation =false;

    public $defaultAction = 'login';

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rule' => [
                    [
                        'actions' => ['login', 'error', 'logout'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionLogin()
    {
        var_dump('login');die;
    }
}
