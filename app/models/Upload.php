<?php

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

    public static function pagination()
    {
        $db = Db::getConnection();

        $pageUri = explode('/', $_SERVER['REQUEST_URI']);
        $page = end($pageUri);
        $pageCount = floor(count($images) / $page);
        echo $page;



        // try {
        //     $total = $db->query('SELECT COUNT(*) from upload')->fetchColumn();
        //     $limit = 1;
        //     $pages = ceil($total / $limit);
        //     $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        //         'options' => array(
        //             'default' => 1,
        //             'min_range' => 1,
        //         ),
        //     )));
        //     $offset = ($page - 1) * $limit;
        //     $start = $offset + 1;
        //     $end = min(($offset + $limit), $total);

        //     $prevlink = ($page > 1)
        //         ? '<a href="/upload/1" title="First page">&laquo;</a> <a href="/upload/'
        //         . ($page - 1) . '" title="Previous page">&lsaquo;</a>'
        //         : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

        //     $nextlink = ($page < $pages)
        //         ? '<a href="/upload/' . ($page + 1)
        //         . '" title="Next page">&rsaquo;</a> <a href="/upload/'
        //         . $pages . '" title="Last page">&raquo;</a>'
        //         : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

        //     echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';
        //     $stmt = $db->prepare('SELECT * FROM upload ORDER BY id DESC LIMIT :limit OFFSET :offset');

        //     $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        //     $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        //     $stmt->execute();

        //     if ($stmt->rowCount() > 0) {
        //         $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //         $iterator = new IteratorIterator($stmt);
        //         foreach ($iterator as $row) {
        //             echo '<p>', $row['title'], '</p>';
        //         };
        //     }
        // } catch (Exception $e) {
        //     echo '<p>', $e->getMessage(), '</p>';
        // }
    }
}
