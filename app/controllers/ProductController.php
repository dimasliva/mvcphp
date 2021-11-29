<?php
require_once ROOT . '/app/models/Products.php';
class ProductController
{
    public function actionList()
    {
        $productList = array();
        $productList = Products::getProducts();
        require_once ROOT . '/public/views/products/index.php';
        return true;
    }
    public function actionView($id)
    {
        $product = Products::getProductById($id);
        require_once ROOT . '/public/views/products/view.php';
        return true;
    }
}
