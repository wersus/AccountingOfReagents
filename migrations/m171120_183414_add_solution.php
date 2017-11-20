<?php

use yii\db\Migration;

/**
 * Class m171120_183414_add_solution
 */
class m171120_183414_add_solution extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->execute('CREATE TABLE solution (
id SERIAL PRIMARY KEY,
name text,
);');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171120_183414_add_solution cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171120_183414_add_solution cannot be reverted.\n";

        return false;
    }
    */
}
