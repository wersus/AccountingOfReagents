<?php

use yii\db\Schema;

class m171128_170101_concentrations extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'concentrations', $tables))  {
          $this->createTable('concentrations', [
              'id' => $this->primaryKey(),
              'name' => $this->text(),
              'short_name' => $this->text(),
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."concentrations` already exists!\n";
        }
                 
    }

    public function down()
    {
        $this->dropTable('concentrations');
    }
}
