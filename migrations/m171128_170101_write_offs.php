<?php

use yii\db\Schema;

class m171128_170101_write_offs extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'write_offs', $tables))  {
          $this->createTable('write_offs', [
              'id' => $this->primaryKey(),
              'id_external_reagents' => $this->integer(),
              'id_internal_solutions' => $this->integer(),
              'id_internal_solutions_two' => $this->integer(),
              'volume' => $this->integer(),
              'weight' => $this->integer(),
              'reason' => $this->text(),
              'id_users' => $this->integer(),
              'FOREIGN KEY ([[id_external_reagents]]) REFERENCES external_reagents ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              'FOREIGN KEY ([[id_users]]) REFERENCES users ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."write_offs` already exists!\n";
        }
                 
    }

    public function down()
    {
        $this->dropTable('write_offs');
    }
}
