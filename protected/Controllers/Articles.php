<?php

namespace App\Controllers;

use App\Models\Article;
use T4\Mvc\Controller;
use App\Models\News;

class Articles
    extends Controller
{
    public function actionAll()
    {
        $this->data->news = (new News(ROOT_PATH_PROTECTED . '/newsDb.php'))->findAll();
    }

    public function actionOne(int $id = 0)
    {
        $this->data->article = (new News(ROOT_PATH_PROTECTED . '/newsDb.php'))->findOne($id);
    }
    
    public function actionLast(int $num = 1)
    {
        $this->data->news = (new News(ROOT_PATH_PROTECTED . '/newsDb.php'))->findLast($num);
    }

    public function actionFormAdd()
    {
        
    }

    public function actionAdd(Article $data)
    {
        $db = new News(ROOT_PATH_PROTECTED . '/newsDb.php');
        $count = count($db) + 1;
        if ('' == $data->img) {
            $data->img = '/Layouts/images/image' . $count . '.jpg';
        }
        $db->$count = $data;
        $db->save();
        $this->redirect('/news/');
    }
}