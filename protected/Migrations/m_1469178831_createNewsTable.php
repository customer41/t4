<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1469178831_createNewsTable
    extends Migration
{
    public function up()
    {
        $this->createTable('news', [
            'title' => ['type' => 'string'],
            'text' => ['type' => 'text'],
            'date' => ['type' => 'datetime'],
        ]);
    }

    public function down()
    {
        $this->dropTable('news');
    }
}