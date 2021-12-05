<?php
require_once './app/models/Upload.php';
class UploadController
{
    public function actionIndex()
    {
        $images = array();
        $images = Upload::getImages();
        require_once(ROOT . '/public/views/upload/index.php');

        return true;
    }

    public function actionCreate()
    {
        Upload::getUpload();

        require_once(ROOT . '/public/views/upload/create.php');

        return true;
    }

    public function actionPagination()
    {
        $pagination = Upload::pagination();
        $pagesArr = array_shift($pagination);
        $images = array_shift($pagination);
        require_once(ROOT . '/public/views/upload/index.php');
        return true;
    }
}
