<?php

use yii\db\Schema;

class m171128_170101_external_reagents extends \yii\db\Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        if (!in_array(Yii::$app->db->tablePrefix.'external_reagents', $tables))  {
          $this->createTable('external_reagents', [
              'id' => $this->primaryKey(),
              'id_manufacturers' => $this->integer(),
              'create_date' => $this->date(),
              'id_reagents' => $this->integer(),
              'document' => $this->text(),
              'best_before' => $this->date(),
              'batch' => $this->integer(),
              'weight' => $this->integer(),
              'volume' => $this->integer(),
              'id_qualifications' => $this->integer(),
              'description' => $this->text(),
              'id_users' => $this->integer(),
              'id_shelf_lifes' => $this->integer(),
              'FOREIGN KEY ([[id_manufacturers]]) REFERENCES manufacturers ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              'FOREIGN KEY ([[id_qualifications]]) REFERENCES qualifications ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              'FOREIGN KEY ([[id_shelf_lifes]]) REFERENCES shelf_lifes ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              'FOREIGN KEY ([[id_users]]) REFERENCES users ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
              ], $tableOptions);
                } else {
          echo "\nTable `".Yii::$app->db->tablePrefix."external_reagents` already exists!\n";
        }
                 
    }

    public function down()
    {
        $this->dropTable('external_reagents');
    }
}
