<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnPegawaiTable extends Migration
{
    public function up()
    {
        $column = [
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'after' => 'telepon',
            ],
        ];
        $this->forge->addColumn('pegawai', $column);
    }

    public function down()
    {
        $this->forge->dropColumn('pegawai', 'image');
    }
}
