<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%subject}}`
 * - `{{%test}}`
 * - `{{%user}}`
 */
class m231013_120515_create_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer(),
            'test_id' => $this->integer(),
            'text' => $this->text(),
            'status' => $this->integer(),
            'bal' => $this->double(),
            'crated_at' => $this->datetime(),
            'created_by' => $this->integer(),
        ]);

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-question-subject_id}}',
            '{{%question}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-question-subject_id}}',
            '{{%question}}',
            'subject_id',
            '{{%subject}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `test_id`
        $this->createIndex(
            '{{%idx-question-test_id}}',
            '{{%question}}',
            'test_id'
        );

        // add foreign key for table `{{%test}}`
        $this->addForeignKey(
            '{{%fk-question-test_id}}',
            '{{%question}}',
            'test_id',
            '{{%test}}',
            'id'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-question-created_by}}',
            '{{%question}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-question-created_by}}',
            '{{%question}}',
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
            '{{%fk-question-subject_id}}',
            '{{%question}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-question-subject_id}}',
            '{{%question}}'
        );

        // drops foreign key for table `{{%test}}`
        $this->dropForeignKey(
            '{{%fk-question-test_id}}',
            '{{%question}}'
        );

        // drops index for column `test_id`
        $this->dropIndex(
            '{{%idx-question-test_id}}',
            '{{%question}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-question-created_by}}',
            '{{%question}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-question-created_by}}',
            '{{%question}}'
        );

        $this->dropTable('{{%question}}');
    }
}
