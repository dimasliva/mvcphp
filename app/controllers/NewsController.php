<?php

class NewsController
{
    public function actionIndex()
    {
        $string = '04-01-2002';
        $pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
        $replace = 'Год: $3 Mouth: $2 Day: $1';
        $match = preg_replace($pattern, $replace, $string);
        echo 'Список новостей ' . $match;
        return true;
    }

    public function actionView($category, $id)
    {
        echo 'Просмотр 1 новости ';
        echo '<br>';
        print_r($category);
        echo '<br>';
        print_r($id);
        return true;
    }
}
