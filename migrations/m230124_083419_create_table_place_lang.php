<?php

use yii\db\Migration;

/**
 * Class m230124_083419_create_table_place_lang
 */
class m230124_083419_create_table_place_lang extends Migration
{
    /**
     * {@inheritdoc}
     */



    // Use up()/down() to run migration code without a transaction.
    public function up() {
        $this->createTable('place', [
            'id' => $this->primaryKey()->unsigned(),
            'place_id' => $this->string(45)->notNull(),
            'lat' => $this->string(45)->notNull(),
            'lng' => $this->string(45)->notNull(),
            'country_code' => $this->string(2)->notNull(),
            'is_country' => $this->boolean()->notNull()
        ]);
    }

    public function down() {
        $this->dropTable('place');
    }

}
