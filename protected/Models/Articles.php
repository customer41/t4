<?php

namespace App\Models;

use T4\Orm\Model;

/**
 * Class Articles
 * @package App\Models
 *
 * @property string $text
 * @property string $date
 * @property string $title
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