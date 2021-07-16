<?php

namespace backend\models;

use Yii;

class Menu extends \common\modelsgii\Menu
{
    /**
     * 配置model规则
     *
     * @return array
     * @author linhongtong
     * date: 2021/7/16 16:52
     */
    public function rules() {
        return [
            [['title','url'],'required'],
            [['pid', 'sort', 'hide', 'status'], 'integer'],
            [['title', 'group'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 255]
        ];
    }

    /**
     * 栏目权限检查
     *
     * @param $rule
     * @author linhongtong
     * date: 2021/7/16 16:53
     */
    public static function checkRule($rule) {
        // 超级管理员允许访问任何页面
        if (Yii::$app->params['admin'] == Yii::$app->user->id) {
            return true;
        }

        // rbac
        if (!Yii::$app->user->can($rule)) {
            return false;
        }
        return true;
    }
}
