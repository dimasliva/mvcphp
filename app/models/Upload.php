<?php

class Upload
{
    public static function getUpload()
    {
        $db = Db::getConnection();

        if (isset($_POST['submit'])) {
            // Status
            $statusMsg = '';
            // Title
            $title = $_POST['title'];
            $title = htmlspecialchars($title);
            if (empty($_POST['title'])) {
                $statusMsg = "<div class='alert'>Fill the title field</div>";
            } else {
                // File
                $targetDir = ROOT . '/public/images/';
                $fileName = basename($_FILES['file']['name']);
                $targetFilePath = $targetDir . $fileName;

                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (isset($_POST['submit']) && !empty($_FILES['file']['name'])) {
                    $allowTypes = array('png', 'jpg', 'jpeg', 'gif', 'pdf');
                    if (in_array($fileType, $allowTypes)) {
                        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                            $insert = $db->query("INSERT INTO upload(`file_name`,`title`)
                        VALUES('$fileName', '$title')");
                            $insert->setFetchMode(PDO::FETCH_ASSOC);

                            if ($insert) {
                                $statusMsg = "The file " . $fileName . " has been uploaded successfully.</div>";
                            } else {
                                $statusMsg = "<div class='alert'>File upload failed, please try again.</div>";
                            }
                        } else {
                            $statusMsg = "<div class='alert'>Sorry, there was an error uploading your file.</div>";
                        }
                    } else {
                        $statusMsg = "<div class='alert'>Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.</div>";
                    }
                } else {
                    $statusMsg = "<div class='alert'>Please select a file to upload.</div>";
                }
            }
            echo $statusMsg;
        }
    }


    public static function getImages()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * from upload ORDER BY id DESC LIMIT 6');
        $result->execute();

        $images = array();
        $i = 0;

        while ($row = $result->fetch()) {
            $images[$i]['id'] = $row['id'];
            $images[$i]['file_name'] = $row['file_name'];
            $images[$i]['uploaded_on'] = $row['uploaded_on'];
            $images[$i]['title'] = $row['title'];
            $i++;
        }
        return $images;
    }
}
