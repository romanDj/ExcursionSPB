<?php

use yii\db\Migration;

/**
 * Handles the creation of table `records`.
 */
class m180604_094400_create_records_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('records', [
            'id' => $this->primaryKey(),
            'id_excursion' => $this->integer(),
            'id_user' => $this->integer(),
        ]);

        $this->createIndex('idx-records-excursion','records','id_excursion');
        $this->createIndex('idx-records-user','records','id_user');

        $this->addForeignKey('fx-excursion','records','id_excursion','excursion','id');
        $this->addForeignKey('fx-user','records','id_user','user','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('records');
    }
}
