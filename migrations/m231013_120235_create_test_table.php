<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%subject}}`
 * - `{{%user}}`
 */
class m231013_120235_create_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer(),
            'title' => $this->string(),
            'description' => $this->text(),
            'crated_at' => $this->datetime(),
            'created_by' => $this->integer(),
        ]);

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-test-subject_id}}',
            '{{%test}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-test-subject_id}}',
            '{{%test}}',
            'subject_id',
            '{{%subject}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-test-created_by}}',
            '{{%test}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-test-created_by}}',
            '{{%test}}',
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
        // drops foreign key for table `{{%subject}}`
        $this->dropForeignKey(
            '{{%fk-test-subject_id}}',
            '{{%test}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-test-subject_id}}',
            '{{%test}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-test-created_by}}',
            '{{%test}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-test-created_by}}',
            '{{%test}}'
        );

        $this->dropTable('{{%test}}');
    }
}
