<?php

namespace App\Controllers;

use App\Models\Category;
use T4\Core\MultiException;
use T4\Mvc\Controller;

class AdminCategories
    extends Controller
{
    public function actionTreeOutput()
    {
        $this->data->tree = Category::findAllTree();
    }
    
    public function actionAdd()
    {
        if (isset($this->app->flash->errors)) {
            $this->data->errors = $this->app->flash->errors;
        }
        $this->data->tree = Category::findAllTree();
    }

    public function actionSave($cat, $parent)
    {
        $category = new Category();
        $category->parent = Category::findByTitle($parent);
        try {
            $category->fill($cat);
            $category->save();
            $this->redirect('/categories/');
        } catch (MultiException $errors) {
            $this->app->flash->errors = $errors;
            $this->redirect('/categories/add');
        }
    }

    public function actionDelete($id)
    {
        $category = Category::findByPK($id);
        if ($category->hasChildren()) {
            $children = $category->findAllChildren();
            foreach ($children as $child) {
                $child->delete();
            }
        }
        $category->delete();
        $this->redirect('/categories/');
    }

    public function actionUp($id)
    {
        $item = Category::findByPK($id);
        $sibling = $item->getPrevSibling();
        if (!empty($sibling)) {
            $item->insertBefore($sibling);
        }
        $this->redirect('/categories/');
    }

    public function actionDown($id)
    {
        $item = Category::findByPK($id);
        $sibling = $item->getNextSibling();
        if (!empty($sibling)) {
            $item->insertAfter($sibling);
        }
        $this->redirect('/categories/');
    }
}