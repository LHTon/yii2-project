<?php

namespace common\modelsgii;

use common\core\BaseActiveRecord;
use Yii;

/**
 * This is the model class for table "yii2_admin".
 *
 * @property int $uid
 * @property string $username 用户名
 * @property string $password 密码
 * @property string $salt 密码干扰字符
 * @property string $email 邮箱账号
 * @property string $mobile 用户手机
 * @property int $reg_time 注册时间
 * @property int $reg_ip 注册地址IP
 * @property int $last_login_time 最后一次登录时间
 * @property int $last_login_ip 最后一次登录地址ip
 * @property int $update_time 更新时间
 * @property int $status 用户状态 1正常 0禁用
 * @property int $to_uid 映射企业账号ID；0:代表中网
 */
class Admin extends BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yii2_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reg_time', 'reg_ip', 'last_login_time', 'last_login_ip', 'update_time', 'status', 'to_uid'], 'integer'],
            [['username'], 'string', 'max' => 16],
            [['password'], 'string', 'max' => 60],
            [['salt', 'email'], 'string', 'max' => 32],
            [['mobile'], 'string', 'max' => 15],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'username' => 'Username',
            'password' => 'Password',
            'salt' => 'Salt',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'reg_time' => 'Reg Time',
            'reg_ip' => 'Reg Ip',
            'last_login_time' => 'Last Login Time',
            'last_login_ip' => 'Last Login Ip',
            'update_time' => 'Update Time',
            'status' => 'Status',
            'to_uid' => 'To Uid',
        ];
    }
}
