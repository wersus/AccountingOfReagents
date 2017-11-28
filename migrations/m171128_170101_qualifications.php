<?php

use yii\db\Schema;

class m171128_170101_qualifications extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'qualifications', $tables))  {
          $this->createTable('qualifications', [
              'id' => $this->primaryKey(),
              'name' => $this->text(),
              'short' => $this->text(),
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."qualifications` already exists!\n";
        }
                 
    }

    public function down()
    {
        $this->dropTable('qualifications');
    }
}
