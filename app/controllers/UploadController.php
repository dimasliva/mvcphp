<?php
require_once './app/models/Upload.php';
class UploadController
{
    public function actionIndex()
    {
        $paginationArr = Upload::getPagination();
        $pagination = array_shift($paginationArr);
        $images = array_shift($paginationArr);
        require_once(ROOT . '/public/views/upload/index.php');
        return true;
    }

    public function actionCreate()
    {
        Upload::getUpload();

        require_once(ROOT . '/public/views/upload/create.php');

        return true;
    }

    public function actionError()
    {
        header('Location:/upload/1');
    }
}
