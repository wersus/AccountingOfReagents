<?php

use yii\db\Schema;

class m171128_170101_solution_to_external_reagents extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'solution_to_external_reagents', $tables))  {
          $this->createTable('solution_to_external_reagents', [
              'id' => $this->primaryKey(),
              'id_solutions' => $this->integer(),
              'id_solutions_two' => $this->integer(),
              'id_methods' => $this->integer()->notNull(),
              'id_reagents' => $this->integer(),
              'part' => $this->integer(),
              'FOREIGN KEY ([[id_methods]]) REFERENCES methods ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              'FOREIGN KEY ([[id_solutions_two]]) REFERENCES solutions ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."solution_to_external_reagents` already exists!\n";
        }
                 
    }

    public function down()
    {
        $this->dropTable('solution_to_external_reagents');
    }
}
