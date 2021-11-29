<?php

class Upload
{
    public static function getUpload()
    {
        $db = Db::getConnection();
        $file = $_FILES['file']['name'];
        $arrFile = explode('.', $file);
        $nameFile = array_shift($arrFile);
        $nameFile = uniqid($nameFile);
        $typeFile = '.' . array_shift($arrFile);

        print_r($arrFile);
        $sql = "INSERT INTO image(`name`, `type`) VALUES('$nameFile', '$typeFile')";
        $result = $db->query($sql);
        if ($result) {
            move_uploaded_file($_FILES['file']['tmp_name'], './public/images/' . $nameFile . $typeFile);
        }
    }
}
