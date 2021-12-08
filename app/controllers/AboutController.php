<?php
require_once ROOT . '/app/models/About.php';
class AboutController
{
    public function actionList()
    {
        $productList = array();
        $productList = About::getProducts();
        require_once ROOT . '/public/views/about/index.php';
        return true;
    }
    public function actionView($id)
    {
        $product = About::getProductById($id);
        require_once ROOT . '/public/views/about/view.php';
        return true;
    }
}
