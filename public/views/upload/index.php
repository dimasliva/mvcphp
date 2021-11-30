<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/upload.css" />
    <title>Document</title>
</head>

<body>

    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <div class="file-upload">
        <form enctype="multipart/form-data" method="POST" target="votar">

            <button type="submit" name="submit" class="file-upload-btn">Add image</button>

            <div class="image-upload-wrap" onclick="loadImg()">
                <input type='file' name="file" onchange="readURL(this);" accept="image/*" class="file-upload-input" />
                <div class="drag-text">
                    <h3>Drag and drop a file or select add</h3>
                    <img class="file-upload-image" src="#" alt="your image" id="blah" />
                </div>
                <p id="parap"></p>

            </div>
        </form>
        <!-- 
            <div class="file-upload-content">
            <img class="file-upload-image" src="#" alt="your image" id="blah" />
            <div class="image-title-wrap">
                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
            </div>
        </div>
     -->
        `
    </div>
    <?php
    foreach ($images as $image) :
    ?>
        <div>
            <img src="/public//images/<?= $image['name'] . $image['type']; ?>">
        </div>
    <?php
    endforeach;
    ?>
    <!-- JS -->
    <script>
        var img = document.getElementById('blah');
        img.style.display = "none";

        function loadImg() {
            var p = document.getElementById('parap');
            p.innerHTML += img.style.display + ' ';

            if (input.files && input.files[0]) {
                img.style.display = "block";
                p.innerHTML += img.style.display + ' ';
            }


        }
        p.innerHTML = img.style.display;

        if (img.style.display = "none") {

        }
        img.style.display = "none";


        function readURL(input) {
            var img = document.getElementById('blah');
            document.getElementById('dasdas').innerHTML = image;
            img.style.display = "block";

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>