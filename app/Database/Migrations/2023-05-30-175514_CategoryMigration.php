<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'category_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'category_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP',
                'null' => true,
            ],
            'deleted_at' => [
                'type'    => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('category_id', true);
        $this->forge->createTable('categories');
    }

    public function down()
    {
        $this->forge->dropTable('cars');
    }
}
