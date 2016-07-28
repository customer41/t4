<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1469539444_createProductsTable
    extends Migration
{
    public function up()
    {
        $this->createTable('products', [
            'title' => ['type' => 'string'],
            'price' => ['type' => 'int'],
            '__category_id' => ['type' => 'link'],
        ]);
    }

    public function down()
    {
        $this->dropTable('products');
    }
}