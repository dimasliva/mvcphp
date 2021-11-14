<?php
include_once ROOT . "/app/models/News.php";
class NewsController
{
    public function actionIndex()
    {
        echo "News list";
        return true;
    }

    public function actionView($view, $id)
    {
        echo "</br>Param one: " . $view;
        echo "</br>Param two:" . $id;
        return true;
    }
}
