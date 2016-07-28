<?php

return [
    '/news' => '//Articles/All',
    '/news/add' => '//Articles/FormAdd',
    '/news/save' => '//Articles/Add',
    '/news/last/<1>' => '//Articles/Last(num=<1>)',
    '/news/<1>' => '//Articles/One(id=<1>)',

    '/articles' => '//Admin/All',
    '/articles/add' => '//Admin/Form',
    '/articles/save/<1>' => '//Admin/Edit(id=<1>)',
    '/articles/save' => '//Admin/Add',
    '/articles/delete/<1>' => '//Admin/Delete(id=<1>)',
    '/articles/edit/<1>' => '//Admin/Form',

    '/categories' => '//AdminCategories/TreeOutPut',
    '/categories/add' => '//AdminCategories/Add',
    '/categories/save' => '//AdminCategories/Save',
    '/categories/delete' => '//AdminCategories/Delete',
    '/categories/up' => '//AdminCategories/Up',
    '/categories/down' => '//AdminCategories/Down',

    '/goods/show' => '//Products/GoodsOutput',
];