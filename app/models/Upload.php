<?php
use app\components;

class Upload
{
    public static function getUpload()
    {
        $db = Db::getConnection();
        if (isset($_POST['submit'])) {

            // Title
            $title = $_POST['title'];
            $title = htmlspecialchars($title);
            if (empty($title)) {
                $statusMsg = "<div class='alert'>Fill the title field</div>";
            } else {
                // File
                $targetDir = ROOT . '/public/images/';

                $fileName = basename($_FILES['file']['name']);
                $fileName = uniqid() . $_FILES['file']['name'];

                $targetFilePath = $targetDir . $fileName;

                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                //  Date
                $date = date('Y-m-d H:i:s');

                if (isset($_POST['submit']) && !empty($_FILES['file']['name'])) {
                    $allowTypes = array('png', 'jpg', 'jpeg', 'gif', 'pdf');
                    if (in_array($fileType, $allowTypes)) {
                        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {

                            $insert = $db->query("INSERT INTO upload(`file_name`, `uploaded_on`,`title`)
                            VALUES('$fileName', '$date', '$title')");
                            $insert->setFetchMode(PDO::FETCH_ASSOC);

                            if ($insert) {
                                $statusMsg = "<div class='alert-success'>The file " . $fileName . " has been uploaded successfully.</div>";
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

    public static function getPagination()
    {
        $db = Db::getConnection();

        $sql = "SELECT COUNT(id) FROM `upload`;";
        $query = $db->query($sql);
        $row = $query->fetchColumn();

        $rows = $row[0];
        $pageRows = 6;

        $last = ceil($rows / $pageRows);
        if ($last < 1) {
            $last = 1;
        }

        $pagenum = 1;

        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('/', $uri);
        $uriNum = end($uri);
        // Get pagenum from URL vars if it is present, else it is = 1
        if (isset($uriNum)) {
            $pagenum = preg_replace('[0-9+]', '', $uriNum);
        }

        if ($pagenum < 0) {
            $pagenum = 1;
        } else if ($pagenum > $last) {
            $pagenum = $last;
            header('Location:/upload/' . $pagenum);
        }
        $limit = 'LIMIT ' . ($pagenum - 1) * $pageRows . ',' . $pageRows;
        $sql = 'SELECT * FROM upload ORDER BY id DESC ' . $limit . ';';
        $result = $db->query($sql);
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


        $paginumCtrls = '';
        if ($last != 1) {
            $previous = $pagenum - 1;
            if ($previous == 0) {
                $paginumCtrls .= null;
            } else {

                $paginumCtrls .= '<a class="page-numbers" href="/upload/' . $previous
                    . '">Previous</a> ';
            }

            for ($i = $pagenum - 4; $i < $pagenum; $i++) {
                if ($i > 0) {
                    $paginumCtrls .= '<a href="/upload/' . $i . '">' . $i
                        . '</a>';
                }
            }
        }
        $paginumCtrls .= '<span class="page-numbers current">' . $pagenum  . '</span>';

        for ($i = $pagenum + 1; $i <= $last; $i++) {
            $paginumCtrls .= '<a class="page-numbers" href="/upload/' . $i . '">' . $i . '</a>';
            if ($i >= $pagenum) {
                break;
            }
        }

        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginumCtrls .= '<a class="page-numbers" href="/upload/' . $next . '">Next</a> ';
        }
        return array($paginumCtrls, $images);
        // $imageResult = $db->query('SELECT * from upload');
        // $imageResult->execute();

        // $imageResult->fetchColumn(PDO::FETCH_ASSOC);


        // return array($pages, $images, $currentPage);
    }
}
