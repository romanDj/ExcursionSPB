<?php

use yii\db\Migration;

/**
 * Class m180608_092725_create_records_index
 */
class m180608_092725_create_records_index extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx-excursion','records', 'id_excursion');
        $this->createIndex('idx-user','records', 'id_user');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180608_092725_create_records_index cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180608_092725_create_records_index cannot be reverted.\n";

        return false;
    }
    */
}
