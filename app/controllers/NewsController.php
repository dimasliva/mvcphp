<?php
require_once ROOT . '/app/models/News.php';

class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNews();
        require_once ROOT . '/public/views/news/index.php';
        return true;
    }

    public function actionView($id)
    {
        $newsItem = News::getNewsItemById($id);
        require_once ROOT . '/public/views/news/view.php';

        return true;
    }
}
