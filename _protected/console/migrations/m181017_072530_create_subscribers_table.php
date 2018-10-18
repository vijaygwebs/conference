<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subscribers`.
 */
class m181017_072530_create_subscribers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subscribers', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('subscribers');
    }
}
