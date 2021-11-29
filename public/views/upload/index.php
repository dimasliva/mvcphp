<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/upload.css" />
    <title>Document</title>
</head>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['file']['size'] > 0) {

        require_once './app/models/Upload.php';
        $upload = new Upload;
        $upload::getUpload();
    } else {
        echo 'Select image';
    }
}
?>

<body>

    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <div class="file-upload">
        <form action="./upload" enctype="multipart/form-data" method="POST" target="votar">

            <button type="submit" name="submit" class="file-upload-btn">Add image</button>

            <div class="image-upload-wrap">
                <input type='file' name="file" onchange="readURL(this);" accept="image/*" class="file-upload-input" />
                <div class="drag-text">
                    <h3>Drag and drop a file or select add Image</h3>
                </div>
            </div>
        </form>
        <div class="file-upload-content">
            <img class="file-upload-image" src="#" alt="your image" />
            <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
            </div>
        </div>
    </div>


</body>

</html>