<?php

namespace App\Models;

use T4\Orm\Model;

/**
 * Class Articles
 * @package App\Models
 *
 * @property $text
 * @property $date
 * @property $title
 */
class Articles
    extends Model
{
    static protected $schema = [
        'table' => 'news',
        'columns' => [
            'title' => ['type' => 'string'],
            'text' => ['type' => 'text'],
            'date' => ['type' => 'datetime'],
        ],
    ];
}