<?php
require_once ROOT . '/app/models/About.php';
class AboutController
{
    public function actionList()
    {
        $productList = array();
        $productList = About::sendEmail();
        require_once ROOT . '/public/views/about/index.php';
        return true;
    }
}
