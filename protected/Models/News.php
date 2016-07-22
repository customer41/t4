<?php

namespace App\Models;

use T4\Core\Config;

class News
    extends Config
{
    public function findAll()
    {
        $arrNews = [];
        foreach ($this as $k => $v) {
            $arrNews[$k] = new Article($v->toArray());
        }
        return $arrNews;
    }

    public function findOne($id)
    {
        return $this->findAll()[$id];
    }

    public function findLast($num)
    {
        if ($num < 1) {
            return [];
        }
        
        $arrNews = $this->findAll();
        $count = count($arrNews);
        if ($num > $count) {
            return $arrNews;
        }
        
        $num = $count - $num;
        while (0 != $num) {
            unset($arrNews[$num]);
            $num--;
        }
        return $arrNews;
    }
}