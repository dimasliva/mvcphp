<?php
include_once ROOT . "/app/models/News.php";
class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();

        require_once ROOT . "/app/views/news/index.php";

        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $newsList = News::getNewsById($id);

            echo "<pre>";
            print_r($newsList);
            echo "</pre>";
            echo "$id</br>";
            return true;
        }
    }
}
