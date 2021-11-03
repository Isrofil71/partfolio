<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%worker}}`.
 */
class m211103_155248_add_hobbie_column_profesion_column_to_worker_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%worker}}', 'hobbie', $this->text());
        $this->addColumn('{{%worker}}', 'profession_id', $this->integer());

        $this->createIndex(
            '{{%profession_id_profession_id}}',
            '{{%profession}}',
            'id'
        );

        // add foreign key for table `{{%worker}}`
        $this->addForeignKey(
            '{{%fk_profession_id_profession_id}}',
            '{{%worker}}',
            'profession_id',
            '{{%profession}}',
            'id',
            'CASCADE'
        );  
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%worker}}', 'hobbie');
        $this->dropColumn('{{%worker}}', 'profession');
    }
}
