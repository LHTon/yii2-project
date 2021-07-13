<?php

namespace backend\behaviors;


use yii\base\Behavior;
use yii\base\Controller;
use yii\widgets\Menu;

class RbacBehavior extends Behavior
{
    // 无需权限检查的action
    public $allowActions = [];

    /**
     * 功能说明
     *
     * @return string[]
     * @author linhongtong
     * date: 2021/7/7 16:47
     */
    public function events() {
        return [
            Controller::EVENT_BEFORE_ACTION => 'rbacAction',
        ];
    }

    /**
     * ---------------------------------------
     * 控制器执行前的rbac处理
     * @param $event \yii\base\ActionEvent 为什么是ActionEvent而不是Event，
     *        因为yii/base/Controller第269行，事件参数是$event = new ActionEvent($action)
     *
     * 注意：ActionEvent::$isValid参数true/false分别表示继续执行或终止执行action，
     *        所以验证成功后要$event->isValid = true，参考代码yii/base/Controller第152、270行
     * @return boolean
     * @throws
     * ---------------------------------------
     */
    public function rbacAction($event) {
        // 继续执行action
        $event->isValid = true;
        $action = $event->action;
        $rule = $action->getUniqueId();

        foreach ($this->allowActions as $allow) {
            if (substr($allow, -1) == '*') {
                if (strpos($rule, rtrim($allow, '*')) === 0) {
                    return true;
                }
            } else {
                if ($rule == $allow) {
                    return true;
                }
            }
        }

        // 权限检查
        if (Menu::checkRule($rule)) {

        }
    }
}
