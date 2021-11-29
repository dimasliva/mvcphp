<?php
class UploadController
{
    public function actionIndex()
    {
        require_once(ROOT . '/public/views/upload/index.php');

        return true;
    }
}
