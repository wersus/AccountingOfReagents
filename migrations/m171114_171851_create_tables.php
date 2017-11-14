<?php

use yii\db\Migration;

/**
 * Class m171114_171851_create_tables
 */
class m171114_171851_create_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function Up()
    {
        $this->execute('CREATE table IF NOT EXISTS manufacturer ("id" SERIAL PRIMARY KEY, "title" TEXT NOT NULL);');
        $this->execute('create index IF NOT EXISTS manufacturer_index on manufacturer using btree (id);');

        $this->execute('Create table if NOT EXISTS classification ("id" SERIAL PRIMARY KEY, "title" TEXT NOT NULL, "short_title" TEXT)');
        $this->execute('create index IF NOT EXISTS classification_index on classification using btree (id);');

        $this->execute('CREATE TABLE IF NOT EXISTS concentration ("id" seRial PRIMARY KEY, "title" text not null);');
        $this->execute('create index IF NOT EXISTS concentration_index on concentration using btree (id);');

        $this->execute('CREATE TABLE IF NOT EXISTS method ("id" serial PRIMARY KEY, "number" text not NULL, "name" text not null);');
        $this->execute("create index IF NOT EXISTS method_index on method using btree (id);");

        $this->execute('CREATE TABLE IF NOT EXISTS reagents( 
"id" SERIAL PRIMARY KEY,
"name" TEXT NOT NULL,
"reagent_id" INT,
"manufacturer_id" INT REFERENCES manufacturer(id) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL,
"classification_id" int REFERENCES classification(id) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL,
"concentration_id" INT REFERENCES concentration(id) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL,
"method_id" INT REFERENCES method(id) ON DELETE CASCADE ON UPDATE CASCADE NOT NULL,
"create_date" TIMESTAMP WITH TIME ZONE NOT NULL,
"amount" int NOT NULL,
"formula" text, 
"best_before" TIMESTAMP WITH TIME ZONE,
"density" FLOAT, 
"reagent_type" bool DEFAULT FALSE,
"liquid" bool DEFAULT FALSE,
"description" text 
);');

        $this->execute('CREATE TABLE IF NOT EXISTS reagents_to_reagents ("id" serial PRIMARY KEY, "reagent" INT REFERENCES reagents(id), "reagent_id" INT REFERENCES reagents(id));');

        $this->execute('ALTER TABLE reagents ADD CONSTRAINT reagents_to_reagents_fk FOREIGN KEY (reagent_id) REFERENCES reagents_to_reagents(id);');

    }


    /**
     * @inheritdoc
     */
    public function Down()
    {
        $this->execute('DROP table IF EXISTS manufacturer');
        $this->execute('DROP table IF EXISTS classification');
        $this->execute('DROP table IF EXISTS concentration');
        $this->execute('DROP table IF EXISTS method');
        $this->execute('DROP table IF EXISTS reagents_to_reagents');
        $this->execute('DROP table IF EXISTS reagents');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171114_171851_create_tables cannot be reverted.\n";

        return false;
    }
    */
}
