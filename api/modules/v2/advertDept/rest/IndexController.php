<?php
declare(strict_types=1);


namespace api\modules\v2\advertDept\rest;


use yii\rest\Controller;

class IndexController extends Controller
{
    protected function verbs(): array
    {
        return [
            'index' => ['GET', 'HEAD', 'OPTIONS'],
            'test'  => ['GET', 'HEAD', 'OPTIONS'],
        ];
    }


    public function actionIndex(): void
    {
        var_dump('这是V2模块的index');die;
    }
}
