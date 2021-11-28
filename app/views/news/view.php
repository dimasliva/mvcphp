<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Blog</title>
</head>

<body>

    <div>
        <div class="container m-auto mt-3 row">
            <div class="col-8">
                <div class="card mb-3">

                    <div class="card-body">
                        <h5 class="card-title"><?= $newsItem['title'] ?></h5>
                        <span class="badge bg-primary ">
                            <?php
                            $string = $newsItem['date'];
                            $pattern = '/([0-9]{4})-([0-9]{2})-([0-9]{2})/';
                            $replace = 'Year: $1 Month: $2 Day: $3';
                            $result = preg_replace($pattern, $replace, $string);
                            $result = mb_strcut($result, 0, 28);
                            echo $result;
                            ?>
                        </span>
                        <span class="badge bg-danger">Web Development</span>
                        <div class="border-bottom mt-3"></div>
                        <img src="/app/template/images/<?= $newsItem['image'] ?>.jpg" class="img-fluid mb-2 mt-2" alt="Responsive image">
                        <p class="card-text"><?= $newsItem['short_content']  ?></p>
                        <a href="/news" class="btn btn-primary">Back to news</a>

                    </div>
                </div>

            </div>


        </div>




        <nav class="navbar navbar-expand-lg navbar-light bg-light border-top">
            <div class="container m-auto">
                <a href="#" class="m-auto" style="text-decoration: none;">Developed by Dev Ninja</a>
            </div>
        </nav>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>