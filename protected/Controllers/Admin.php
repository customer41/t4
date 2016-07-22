<?php

namespace App\Controllers;

use App\Models\Articles;
use T4\Mvc\Controller;

class Admin
    extends Controller
{
    public function actionAll()
    {
        $this->data->news = Articles::findAll(['order' => 'date desc']);
    }
    
    public function actionForm()
    {
        $path = explode('/', $this->app->request->path);
        $act = $path[2];
        switch ($act) {
            case 'add':
                $this->data->act = 'Добавление';
                break;
            case 'edit':
                $this->data->act = 'Редактирование';
                $news = Articles::findByPK($path[3]);
                $this->data->id = $path[3];
                $this->data->title = $news->title;
                $this->data->text = $news->text;
                break;
        }
    }

    public function actionAdd($title, $text)
    {
        (new Articles())
            ->setTitle($title)
            ->setText($text)
            ->setDate(date("Y-m-d H:i:s", time()))
            ->save();
        $this->redirect('/articles');
    }
    
    public function actionDelete($id)
    {
        Articles::findByPK($id)->delete();
        $this->redirect('/articles');
    }

    public function actionEdit($id, $title, $text)
    {
        Articles::findByPK($id)
            ->setTitle($title)
            ->setText($text)
            ->save();
        $this->redirect('/articles');
    }
}