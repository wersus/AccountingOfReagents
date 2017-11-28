<?php

use yii\db\Schema;

class m171128_170101_solutions extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'solutions', $tables))  {
          $this->createTable('solutions', [
              'id' => $this->primaryKey(),
              'id_shelf_lifes' => $this->integer(),
              'name' => $this->text()->notNull()->defaultValue('NULL'),
              'id_concentrations' => $this->integer(),
              'FOREIGN KEY ([[id_concentrations]]) REFERENCES concentrations ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              'FOREIGN KEY ([[id_shelf_lifes]]) REFERENCES shelf_lifes ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."solutions` already exists!\n";
        }
                 
    }

    public function down()
    {
        $this->dropTable('solutions');
    }
}
