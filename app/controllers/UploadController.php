<?php
require_once './app/models/Upload.php';
class UploadController
{
    public function actionIndex()
    {
        $images = array();
        $images = Upload::getImages(Db::getConnection());

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_FILES['file']['size'] > 0) {
                if (Db::getConnection() == true) {
                    echo 'Connect have';
                } else {
                    echo "not";
                }
                // Upload::getUpload(Db::getConnection());
            } else {
                echo 'Select image';
            }
        }

        require_once(ROOT . '/public/views/upload/index.php');

        return true;
    }
}
