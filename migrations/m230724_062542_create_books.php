<?php

use yii\db\Migration;

/**
 * Class m230724_062542_create_books
 */
class m230724_062542_create_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Create the table
        $this->createTable('books', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),
            'num_reservations' => $this->integer()->defaultValue(0),
            'booked' => $this->boolean(),
            'booked_from' => $this->dateTime(),
            'booked_to' => $this->dateTime(),
            'booked_by' => $this->integer()->defaultValue(0)
        ]);
        // Add a foreign key constraint
        $this->addForeignKey(
            'fk_constraint_bookedBooks',
            'users', // Child table
            'id', // Child table column
            'books', // Parent table
            'booked_by', // Parent table column
            'CASCADE',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the foreign key constraint
        $this->dropForeignKey('fk_constraint_bookedBooks', 'books');
        // Drop the table
        $this->dropTable('books');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230724_062542_create_books cannot be reverted.\n";

        return false;
    }
    */
}
