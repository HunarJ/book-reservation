<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m230725_062138_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'num_of_reservations' => $this->integer()
        ]);

        $this->createTable('{{%reservations}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'book_id' => $this->integer(),
            'reserved_from' => $this->date(),
            'reserved_to' => $this->date(),
        ]);

        $this->addForeignKey('fk_reservation_users', 'reservations', 'user_id', 'users', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_reservation_books', 'reservations', 'book_id', 'books', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_reservation_users', 'reservations');
        $this->dropForeignKey('fk_reservation_books', 'reservations');

        $this->dropTable('{{%books}}');
        $this->dropTable('{{%reservations}}');

    }
}
