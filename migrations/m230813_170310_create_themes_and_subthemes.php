<?php

use yii\db\Migration;

class m230813_170310_create_themes_and_subthemes extends Migration
{
    public function safeUp()
    {
        // Create themes table
        $this->createTable('{{%themes}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
        ]);

        // Create subthemes table
        $this->createTable('{{%subthemes}}', [
            'id' => $this->primaryKey(),
            'theme_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text(),
        ]);

        // Add foreign key for subthemes.theme_id -> themes.id
        $this->addForeignKey(
            'fk-subthemes-theme_id',
            '{{%subthemes}}',
            'theme_id',
            '{{%themes}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // Insert demo data into themes
        $this->batchInsert('{{%themes}}', ['title'], [
            ['Тема 1'],
            ['Тема 2']
        ]);

        // Insert demo data into subthemes
        $this->batchInsert('{{%subthemes}}', ['theme_id', 'title', 'text'], [
            [1, 'Подтема 1.1', 'Некий текст, привязанный к Подтеме 1.1'],
            [1, 'Подтема 1.2', 'Некий текст, привязанный к Подтеме 1.2'],
            [2, 'Подтема 2.1', 'Некий текст, привязанный к Подтеме 2.1'],
            [2, 'Подтема 2.2', 'Некий текст, привязанный к Подтеме 2.2'],
            [2, 'Подтема 2.3', 'Некий текст, привязанный к Подтеме 2.3'],
        ]);
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-subthemes-theme_id', '{{%subthemes}}');
        $this->dropTable('{{%subthemes}}');
        $this->dropTable('{{%themes}}');
    }
}