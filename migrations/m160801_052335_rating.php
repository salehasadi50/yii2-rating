<?php

use yii\db\Migration;

class m160801_052335_rating extends Migration
{
    public function safeup()
    {
        $this->createTable('{{%rating}}', [
            'id' => $this->primaryKey(),
            'value' => $this->string(64)->notNull(),
            'service_id' => $this->integer(11)->notNull(),
            'item_id' => $this->integer(11)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'update_time' => $this->timestamp()->notNull(),
        ]);
            $this->addForeignKey('rating_user_id_user', '{{%rating}}', 'user_id', '{{%user}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%rating}}');
        $this->removeForeignKey('rating_user_id_user', '{{%rating}}');
    }

}
