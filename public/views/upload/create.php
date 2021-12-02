<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/upload.scss">
    <title>Document</title>
</head>

<body>

    <form method="POST" enctype="multipart/form-data">

        <h1><strong>File upload</strong> with style and pure CSS</h1>

        <div class="form-group">
            <label for="title">Title <span>Use title case to get a better result</span></label>
            <input type="text" name="title" id="title" class="form-controll" />
        </div>

        <div class="form-group file-area">
            <label for="images">Images <span>Your images should be at least 400x300 wide</span></label>
            <input type="file" name="file" id="file" multiple="multiple" />
            <div class="file-dummy">
                <div class="success">Great, your files are selected. Keep on.</div>
                <div class="default">Please select some files</div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" name='submit' onclick="uploadFile();">Upload images</button>
        </div>

    </form>

    <link href='https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700' rel='stylesheet' type='text/css'>

    <a href="/upload" class="back-to-article" target="_blank">Back to Upload</a>

    <script>
        const form = document.querySelector('form');
        fileInput = form.querySelector('#title');
    </script>
</body>

</html>