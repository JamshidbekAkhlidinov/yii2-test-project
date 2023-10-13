<?php

use yii\db\Migration;

/**
 * Class m231013_133416_alter_column_created_at
 */
class m231013_133416_alter_column_created_at extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('{{%answer}}', 'crated_at','created_at');
        $this->renameColumn('{{%test}}', 'crated_at','created_at');
        $this->renameColumn('{{%question}}', 'crated_at','created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('{{%answer}}', 'created_at','crated_at');
        $this->renameColumn('{{%test}}', 'created_at','crated_at');
        $this->renameColumn('{{%question}}', 'created_at','crated_at');
    }

}
