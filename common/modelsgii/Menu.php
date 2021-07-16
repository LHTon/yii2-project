<?php

namespace common\modelsgii;

use common\core\BaseActiveRecord;
use Yii;

/**
 * This is the model class for table "yii2_menu".
 *
 * @property int $id
 * @property string $title 类目标题
 * @property int $pid 类目的父级id
 * @property int $sort 排序值
 * @property string $url 菜单对应的路径
 * @property int $hide 是否隐藏菜，单默认为0（0/显示,1/隐藏）
 * @property string $group 分组
 * @property int $status 菜单的状态，默认为1（0/已禁用,1/正常）
 */
class Menu extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yii2_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'sort', 'hide', 'status'], 'integer'],
            [['title', 'group'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'pid' => 'Pid',
            'sort' => 'Sort',
            'url' => 'Url',
            'hide' => 'Hide',
            'group' => 'Group',
            'status' => 'Status',
        ];
    }
}
