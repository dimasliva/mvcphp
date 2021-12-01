<?php

class Upload
{
    public static function getUpload()
    {
        $db = Db::getConnection();
        if (!empty($_FILES)) {
            $targetDir = ROOT . '/public/images/';
            $fileName = basename($_FILES['file']['name']);
            $targetFilePath = $targetDir . $fileName;

            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (isset($_POST['submit']) && !empty($_FILES['file']['name'])) {
                $allowTypes = array('png', 'jpg', 'jpeg', 'gif', 'pdf');
                if (in_array($fileType, $allowTypes)) {
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                        $result = $db->query("INSERT INTO image(`file_name`)
                        VALUES('" . $fileName . "')");
                        $result->setFetchMode(PDO::FETCH_ASSOC);
                        header('Location:/upload');
                    }
                }
            };
        }
    }


    public static function getImages()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * from image ORDER BY id DESC LIMIT 6');
        $result->execute();

        $images = array();
        $i = 0;

        while ($row = $result->fetch()) {
            $images[$i]['id'] = $row['id'];
            $images[$i]['file_name'] = $row['file_name'];
            $images[$i]['uploaded_on'] = $row['uploaded_on'];
            $i++;
        }
        return $images;
    }
}
