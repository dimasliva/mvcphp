<?php
require_once ROOT . '/app/models/Home.php';
class HomeController
{
    public function actionIndex()
    {
        require_once(ROOT . '/public/views/index.php');

        return true;
    }
}
