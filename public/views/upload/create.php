<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/upload.scss">
    <title>Upload image</title>
    <style>
        .alert-success {
            display: block;
            width: 400px;
            text-align: center;
            padding: 6px;
            margin: auto;
            background-color: #44ba16;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <form method="POST" enctype="multipart/form-data">

        <h1><strong>File upload</strong> with style and pure CSS</h1>

        <div class="form-group">
            <label for="title">Title <span>Use title case to get a better result</span></label>
            <input type="text" name="title" id="title" class="form-controll" />
        </div>

        <div class="form-group file-area">
            <div class="file-dummy">
                <div class="success" style="display:none;margin:0px 0px 10px auto; color:chartreuse;">Great, your files are selected. Keep on.</div>
                <div class="default" style="margin:0px 0px 10px auto;">Please select some files</div>
            </div> <input type="file" name="file" id="file" multiple="multiple" />

        </div>

        <div class="form-group">
            <button type="submit" name='submit' onclick="uploadFile();">Upload images</button>
        </div>

    </form>

    <link href='https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700' rel='stylesheet' type='text/css'>

    <a href="/upload/1" class="back-to-article" target="_blank">Back to Upload</a>

    <script>
        const form = document.querySelector('form');
        fileTitle = form.querySelector('#title');
        fileFile = form.querySelector('#file');
        success = form.querySelector('.success');
        selectFiles = form.querySelector('.default');

        fileFile.onchange = ({
            target
        }) => {
            let file = target.files[0];
            if (file) {
                selectFiles.style.display = 'none';
                success.style.display = 'block';
            }
        }
    </script>
</body>

</html>