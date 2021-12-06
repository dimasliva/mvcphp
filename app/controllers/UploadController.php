<?php
require_once './app/models/Upload.php';
class UploadController
{
    public function actionIndex()
    {
        $pagination = Upload::getImages();
        $pagesArr = array_shift($pagination);
        $images = array_shift($pagination);
        require_once(ROOT . '/public/views/upload/index.php');
        return true;
    }

    public function actionCreate()
    {
        Upload::getUpload();

        require_once(ROOT . '/public/views/upload/create.php');

        return true;
    }
}
