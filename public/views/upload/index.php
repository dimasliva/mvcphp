<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style_upload.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500,700%7CHerr+Von+Muellerhoff:400,500,700%7CQuattrocento+Sans:400,500,700' type='text/css' media='all' />
    <link rel='stylesheet' href='css/easy-responsive-shortcodes.css' type='text/css' media='all' />
    <title>Images</title>
</head>

<body class="home page page-template page-template-template-portfolio page-template-template-portfolio-php">
    <div id="page">
        <div class="container">
            <header id="masthead" class="site-header">
                <div class="site-branding">
                    <h1 class="site-title"><a href="index.html" rel="home">Portfolio</a></h1>
                    <h2 class="site-description">Minimalist Portfolio by Dmitry Ermilov</h2>
                </div>
                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle">Menu</button>
                    <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
                    <div class="menu-menu-1-container">
                        <ul id="menu-menu-1" class="menu">
                            <li><a href="/">Home</a></li>
                            <li><a href="/news">News</a></li>
                            <li><a href="/products">Products</a></li>
                            <li><a href="/upload/create">Add image</a></li>
                            <li><a href="elements.html">Elements</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="portfolio-item.html">Portfolio Item</a></li>
                                    <li><a href="blog-single.html">Blog Article</a></li>
                                    <li><a href="shop-single.html">Shop Item</a></li>
                                    <li><a href="portfolio-category.html">Portfolio Category</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- #masthead -->
            <div id="content" class="site-content">
                <div id="primary" class="content-area column full">
                    <main id="main" class="site-main">
                        <div class="grid portfoliogrid">
                            <?php foreach ($images as $image) : ?>

                                <article class="hentry">
                                    <header class="entry-header">
                                        <div class="entry-thumbnail">
                                            <a href="portfolio-item.html">
                                                <img src="<?= './public/images/' . $image['file_name'] ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" style="object-fit: cover; height:200px;" alt="p1" /></a>
                                        </div>
                                        <h2 class="entry-title"><a href="portfolio-item.html" rel="bookmark"><?= $image['title'] ?></a></h2>
                                        <a class='portfoliotype' href='portfolio-category.html'><?= $image['uploaded_on'] ?></a>
                                    </header>
                                </article>
                            <?php endforeach; ?>


                        </div>
                        <!-- .grid -->

                        <nav class="pagination">
                            <span class="page-numbers current">1</span>
                            <a class="page-numbers" href="#">2</a>
                            <a class="next page-numbers" href="#">Next »</a>
                        </nav>
                        <br />

                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- #content -->
        </div>
        <!-- .container -->
        <footer id="colophon" class="site-footer">
            <div class="container">
                <div class="site-info">
                    <h1 style="font-family: 'Herr Von Muellerhoff';color: #ccc;font-weight:300;text-align: center;margin-bottom:0;margin-top:0;line-height:1.4;font-size: 46px;">Portfolio</h1>
                    <a href="/">&copy; Portfolio - not a commercial project</a>
                </div>
            </div>
        </footer>
        <a href="#top" class="smoothup" title="Back to top"><span class="genericon genericon-collapse"></span></a>
    </div>

    <script src='./public/js/jquery.js'></script>
    <script src='./public/js/plugins.js'></script>
    <script src='./public/js/scripts.js'></script>
    <script src='./public/js/masonry.pkgd.min.js'></script>

</body>

</html>