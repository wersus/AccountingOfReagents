<?php

use yii\db\Schema;

class m171128_170101_users extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'users', $tables))  {
          $this->createTable('users', [
              'id' => $this->primaryKey(),
              'surname' => $this->text(),
              'name' => $this->text(),
              'patronymic' => $this->text(),
              'id_positions' => $this->integer(),
              'FOREIGN KEY ([[id_positions]]) REFERENCES positions ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."users` already exists!\n";
        }
                 
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
