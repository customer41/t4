<?php

namespace App\Controllers;

use T4\Mvc\Controller;

class Index
    extends Controller
{

    public function actionDefault()
    {
        $this->data->title = $this->app->config->title;
    }
    
    public function actionAbout()
    {
        
    }

}