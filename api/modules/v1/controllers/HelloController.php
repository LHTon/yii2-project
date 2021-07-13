<?php
declare(strict_types = 1);

namespace api\modules\v1\controllers;

use yii\rest\Controller;

class HelloController extends Controller
{
    protected function verbs(): array
    {
        return [
            'index' => ['GET', 'HEAD', 'OPTIONS'],
            'test'  => ['GET', 'HEAD', 'OPTIONS'],
            'add'   => ['POST', 'HEAD', 'OPTIONS'],
        ];
    }

    /**
     * @author linhongtong
     * date: 2021-01-08 19:56
     */
    public function actionIndex(): void
    {
        var_dump('进入了index');
        die;
    }

    /**
     * @author linhongtong
     * date: 2021-01-08 19:56
     */
    public function actionTest(): void
    {
        var_dump('进入了test');
        die;
    }

    public function actionAdd()
    {
        var_dump('这是添加的操作！');die;
    }
}
