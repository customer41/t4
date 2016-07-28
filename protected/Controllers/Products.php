<?php

namespace App\Controllers;

use App\Models\Category;
use T4\Mvc\Controller;

class Products
    extends Controller
{
    public function actionGoodsOutput($cat)
    {
        $mainCat = Category::findByTitle($cat);
        $subCats = $mainCat->findAllChildren();
        $this->data->mainCat = $mainCat;
        $this->data->subCats = $subCats;
    }
}