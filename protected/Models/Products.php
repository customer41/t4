<?php

namespace App\Models;

use T4\Orm\Model;

class Products
    extends Model
{
    protected static $schema = [
        'table' => 'products',
        'columns' => [
            'title' => ['type' => 'string'],
            'price' => ['type' => 'int'],
            ],
        'relations' => [
            'category' => ['type' => self::BELONGS_TO, 'model' => Category::class],
        ],
    ];
}