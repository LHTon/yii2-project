<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%yii2_menu}}`.
 */
class m210712_014004_create_yii2_menu_table extends Migration
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

        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(50)->notNull()->defaultValue('')->comment('类目标题'),
            'pid' => $this->integer()->notNull()->defaultValue(0)->comment('类目的父级id'),
            'sort' => $this->integer()->notNull()->defaultValue(0)->comment('排序值'),
            'url' => $this->string()->notNull()->defaultValue('')->comment('菜单对应的路径'),
            'hide' => $this->tinyInteger(1)->notNull()->defaultValue(0)->comment('是否隐藏菜，单默认为0（0/显示,1/隐藏）'),
            'group' => $this->string(50)->notNull()->defaultValue('')->comment('分组'),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1)->comment('菜单的状态，默认为1（0/已禁用,1/正常）'),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%menu}}');
    }
}
