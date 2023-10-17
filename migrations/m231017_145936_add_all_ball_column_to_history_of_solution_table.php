<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%history_of_solution}}`.
 */
class m231017_145936_add_all_ball_column_to_history_of_solution_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%history_of_solution}}', 'all_ball', $this->double());
        $this->addColumn('{{%history_of_solution}}', 'count_question', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%history_of_solution}}', 'all_ball');
        $this->dropColumn('{{%history_of_solution}}', 'count_question');
    }
}
