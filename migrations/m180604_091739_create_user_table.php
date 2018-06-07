<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180604_091739_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'login' => $this->string(),
            'email' => $this->string(),
            'password' => $this->string(),
            'img'=> $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
