<?php

class Upload
{
    public static function getUpload($db)
    {

        $file = $_FILES['file']['name'];
        $arrFile = explode('.', $file);
        $nameFile = array_shift($arrFile);
        $nameFile = uniqid($nameFile);
        $typeFile = '.' . array_shift($arrFile);

        $sql = "INSERT INTO image(`name`, `type`) VALUES('$nameFile', '$typeFile')";
        $result = $db->query($sql);
        if ($result) {
            move_uploaded_file($_FILES['file']['tmp_name'], './public/images/' . $nameFile . $typeFile);
        }
    }
    public static function getImages($db)
    {

        $result = $db->query('SELECT * from image');
        $result->execute();
        $images = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $images[$i]['id'] = $row['id'];
            $images[$i]['name'] = $row['name'];
            $images[$i]['type'] = $row['type'];
            $i++;
        }
        return $images;
    }
}
