<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%admin}}`.
 */
class m210713_055630_create_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%admin}}', [
            'uid'             => $this->primaryKey(),
            'username'        => $this->string(16)->notNull()->unique()->defaultValue('')->comment('用户名'),
            'password'        => $this->string(60)->notNull()->defaultValue('')->comment('密码'),
            'salt'            => $this->string(32)->notNull()->defaultValue('')->comment('密码干扰字符'),
            'email'           => $this->string(32)->notNull()->unique()->defaultValue('')->comment('邮箱账号'),
            'mobile'          => $this->string(15)->notNull()->defaultValue('')->comment('用户手机'),
            'reg_time'        => $this->integer()->notNull()->defaultValue(0)->comment('注册时间'),
            'reg_ip'          => $this->bigInteger()->notNull()->defaultValue(0)->comment('注册地址IP'),
            'last_login_time' => $this->integer()->notNull()->defaultValue(0)->comment('最后一次登录时间'),
            'last_login_ip'   => $this->bigInteger()->notNull()->defaultValue(0)->comment('最后一次登录地址ip'),
            'update_time'     => $this->integer()->notNull()->defaultValue(0)->comment('更新时间'),
            'status'          => $this->smallInteger()->notNull()->defaultValue(0)->comment('用户状态 1正常 0禁用'),
            'to_uid'          => $this->integer()->notNull()->defaultValue(0)->comment('映射企业账号ID；0:代表中网'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%admin}}');
    }
}
