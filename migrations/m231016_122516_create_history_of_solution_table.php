<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history_of_solution}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%subject}}`
 * - `{{%test}}`
 * - `{{%selected_test}}`
 * - `{{%user}}`
 */
class m231016_122516_create_history_of_solution_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%history_of_solution}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer(),
            'test_id' => $this->integer(),
            'selected_test_id' => $this->integer(),
            'user_id' => $this->integer(),
            'date' => $this->datetime(),
            'ball' => $this->double(),
            'correct_answers_count' => $this->integer(),
            'answers' => $this->text(),
        ]);

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-history_of_solution-subject_id}}',
            '{{%history_of_solution}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-history_of_solution-subject_id}}',
            '{{%history_of_solution}}',
            'subject_id',
            '{{%subject}}',
            'id'
        );

        // creates index for column `test_id`
        $this->createIndex(
            '{{%idx-history_of_solution-test_id}}',
            '{{%history_of_solution}}',
            'test_id'
        );

        // add foreign key for table `{{%test}}`
        $this->addForeignKey(
            '{{%fk-history_of_solution-test_id}}',
            '{{%history_of_solution}}',
            'test_id',
            '{{%test}}',
            'id'
        );

        // creates index for column `selected_test_id`
        $this->createIndex(
            '{{%idx-history_of_solution-selected_test_id}}',
            '{{%history_of_solution}}',
            'selected_test_id'
        );

        // add foreign key for table `{{%selected_test}}`
        $this->addForeignKey(
            '{{%fk-history_of_solution-selected_test_id}}',
            '{{%history_of_solution}}',
            'selected_test_id',
            '{{%selected_test}}',
            'id'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-history_of_solution-user_id}}',
            '{{%history_of_solution}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-history_of_solution-user_id}}',
            '{{%history_of_solution}}',
            'user_id',
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
            '{{%fk-history_of_solution-subject_id}}',
            '{{%history_of_solution}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-history_of_solution-subject_id}}',
            '{{%history_of_solution}}'
        );

        // drops foreign key for table `{{%test}}`
        $this->dropForeignKey(
            '{{%fk-history_of_solution-test_id}}',
            '{{%history_of_solution}}'
        );

        // drops index for column `test_id`
        $this->dropIndex(
            '{{%idx-history_of_solution-test_id}}',
            '{{%history_of_solution}}'
        );

        // drops foreign key for table `{{%selected_test}}`
        $this->dropForeignKey(
            '{{%fk-history_of_solution-selected_test_id}}',
            '{{%history_of_solution}}'
        );

        // drops index for column `selected_test_id`
        $this->dropIndex(
            '{{%idx-history_of_solution-selected_test_id}}',
            '{{%history_of_solution}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-history_of_solution-user_id}}',
            '{{%history_of_solution}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-history_of_solution-user_id}}',
            '{{%history_of_solution}}'
        );

        $this->dropTable('{{%history_of_solution}}');
    }
}
