<?php

use yii\db\Migration;

/**
 * Class m180606_083602_add_column_admin
 */
class m180606_083602_add_column_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'isAdmin','integer AFTER `img`');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180606_083602_add_column_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180606_083602_add_column_admin cannot be reverted.\n";

        return false;
    }
    */
}
