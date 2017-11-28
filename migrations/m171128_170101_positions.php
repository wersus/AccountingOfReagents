<?php

use yii\db\Schema;

class m171128_170101_positions extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'positions', $tables))  {
          $this->createTable('positions', [
              'id' => $this->primaryKey(),
              'name' => $this->text(),
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."positions` already exists!\n";
        }
                 
    }

    public function down()
    {
        $this->dropTable('positions');
    }
}
