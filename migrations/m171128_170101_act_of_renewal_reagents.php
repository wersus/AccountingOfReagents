<?php

use yii\db\Schema;

class m171128_170101_act_of_renewal_reagents extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'act_of_renewal_reagents', $tables))  {
          $this->createTable('act_of_renewal_reagents', [
              'id' => $this->primaryKey(),
              'id_external_reagents' => $this->integer(),
              'best_before' => $this->date(),
              'date' => $this->date(),
              'id_shelf_lifes' => $this->integer(),
              'id_methods' => $this->integer()->notNull(),
              'relative_error' => $this->integer(),
              'id_users' => $this->integer(),
              'id_measurements' => $this->integer(),
              'conclusion' => $this->text(),
              'FOREIGN KEY ([[id_external_reagents]]) REFERENCES external_reagents ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              'FOREIGN KEY ([[id_methods]]) REFERENCES methods ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              'FOREIGN KEY ([[id_shelf_lifes]]) REFERENCES shelf_lifes ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              'FOREIGN KEY ([[id_users]]) REFERENCES users ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."act_of_renewal_reagents` already exists!\n";
        }
                 
    }

    public function down()
    {
        $this->dropTable('act_of_renewal_reagents');
    }
}
