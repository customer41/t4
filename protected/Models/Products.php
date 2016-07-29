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

    protected function validateTitle($val)
    {
        if (mb_strlen($val) < 3) {
            return false;
        }
        return true;
    }

    protected function sanitizeTitle($val)
    {
        return $val;
    }

    protected function validatePrice($val)
    {
        if (!preg_match('~[0-9]~', $val)) {
            return false;
        }
        if ($val <= 0) {
            return false;
        }
        return true;
    }

    protected function sanitizePrice($val)
    {
        return preg_replace('~\D+~', '', $val);
    }
}