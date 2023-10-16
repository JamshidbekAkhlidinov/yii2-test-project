<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%selected_test}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m231016_121038_create_selected_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%selected_test}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'date' => $this->datetime(),
            'description' => $this->text(),
            'created_at' => $this->datetime(),
            'created_by' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-selected_test-created_by}}',
            '{{%selected_test}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-selected_test-created_by}}',
            '{{%selected_test}}',
            'created_by',
            '{{%user}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-selected_test-created_by}}',
            '{{%selected_test}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-selected_test-created_by}}',
            '{{%selected_test}}'
        );

        $this->dropTable('{{%selected_test}}');
    }
}
