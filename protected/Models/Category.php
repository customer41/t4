<?php

namespace App\Models;


use T4\Core\Exception;
use T4\Orm\Model;

/**
 * Class Category
 * @package App\Models
 *
 * @property string $title
 */
class Category
    extends Model
{
    static protected $schema = [
        'table' => 'categories',
        'columns' => [
            'title' => ['type' => 'string'],
        ],
        'relations' => [
            'products' => ['type' => self::HAS_MANY, 'model' => Products::class],
        ]
    ];

    static protected $extensions = ['tree'];

    protected function validateTitle($val)
    {
        if (mb_strlen($val) < 3) {
            throw new Exception('Слишком короткое название'); 
        }
        return true;
    }

    protected function sanitizeTitle($val)
    {
        return $val;
    }

    protected function afterDelete()
    {
        foreach ($this->products as $product) {
            $product->delete();
        }
    }
}