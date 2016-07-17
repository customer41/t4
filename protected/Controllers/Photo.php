<?php

namespace App\Controllers;

use T4\Mvc\Controller;

class Photo
    extends Controller
{
    public function actionDefault()
    {
        $this->data->all = 'Здесь должны быть все фотографии';
    }

    public function actionLast()
    {
        
    }
}