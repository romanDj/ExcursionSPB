<?php

use yii\db\Migration;

/**
 * Handles the creation of table `excursion`.
 */
class m180604_094332_create_excursion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('excursion', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'date' => $this->date(),
            'place' => $this->integer(),
            'img' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('excursion');
    }
}
