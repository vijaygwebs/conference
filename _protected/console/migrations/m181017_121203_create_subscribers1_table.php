<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subscribers1`.
 */
class m181017_121203_create_subscribers1_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subscribers1', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('subscribers1');
    }
}
