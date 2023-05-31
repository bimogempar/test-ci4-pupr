<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CarMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'car_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'car_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'price' => [
                'type'       => 'INT',
            ],
            'year' => [
                'type'       => 'INT',
                'constraint' => '4',
            ],
            'image_url' => [
                'type'       => 'VARCHAR',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'category_id' => [
                'type' => 'INT',
                'unsigned' => true,
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
        $this->forge->addForeignKey('category_id', 'categories', 'category_id');
        $this->forge->addKey('car_id', true);
        $this->forge->createTable('cars');
    }

    public function down()
    {
        $this->forge->dropForeignKey('categories', 'category_id');
        $this->forge->dropTable('cars');
    }
}
