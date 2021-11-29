<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/app//template//css//style.css">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- header -->
    <header>
        <div class="navigation-container">
            <div class="top-head">
                <div class="web-name">
                    <h1>TECHNEWS</h1>
                </div>

                <div class="ham-btn">
                    <span>
                        <i class="fas fa-bars"></i>
                    </span>
                </div>

                <div class="times-btn">
                    <span>
                        <i class="fas fa-times"></i>
                    </span>
                </div>
            </div>

            <!-- nav bar -->

            <div class="nav-bar" id="nav-bar">
                <nav>
                    <ul>
                        <li><a href="#">home</a></li>
                        <li><a href="/products">products</a></li>
                        <li><a href="/upload">upload</a></li>
                        <li><a href="#">featured</a></li>
                        <li><a href="#">broadcast</a></li>
                        <li><a href="#">category</a></li>
                    </ul>
                </nav>
            </div>

            <!--social icons -->
            <div class="social-icons">
                <ul>
                    <li>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <section class="banner">
        <div class="banner-main-content">
            <h2>GET THE WORLD'S LATEST TECH NEWS</h2>
            <h3>World's Leading Tech News Portal</h3>

            <button>
                <a href="#">Know More</a>
            </button>

            <div class="current-news-head">
                <h3>Apple Glasses: What we expect, what we think we are <span>by scott stein</span></h3>

                <h3>What's it's like to have Elon Musk's old phone number <span>by abrar al-heeti</span></h3>

                <h3>Watch the exact moment Chris Pratt accidentally deletes 51, 000 emials <span>by goel fashingbauer</span></h3>

                <h3>Richard Branson's Virgin Orbit will launch a rocket from midair Sunday <span>by eric mack</span></h3>
            </div>
        </div>

        <div class="banner-sub-content">
            <?php foreach ($newsList as $newsItem) : ?>
                <div class="hot-topic">
                    <img src="/app/template/images/<?= $newsItem['image'] ?>.jpg" alt="">

                    <div class="hot-topic-content">
                        <h2><?= $newsItem['title'] ?></h2>

                        <h3>
                            <?php
                            $string = $newsItem['date'];
                            $pattern = '/([0-9]{4})-([0-9]{2})-([0-9]{2})/';
                            $replace = 'Year: $1 Month: $2 Day: $3';
                            $result = preg_replace($pattern, $replace, $string);
                            $result = mb_strcut($result, 0, 28);
                            echo $result;
                            ?>
                        </h3>
                        <p><?= $newsItem['short_content'] ?></p>
                        <a href="/news/<?= $newsItem['id'] ?>">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <hr>

    <main>
        <section class="main-container-left">
            <h2>Top Stories</h2>
            <div class="container-top-left">
                <article>
                    <img src="/public/images/top-left.jpg">

                    <div>
                        <h3>Best Used Cars Under $20, 000 for families</h3>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis ea sint, nisi rem earum fugit? Facere veritatis sapiente eveniet quibusdam.</p>

                        <a href="#">Read More <span>>></span></a>
                    </div>
                </article>
            </div>

            <div class="container-bottom-left">
                <article>
                    <img src="/public/images/bottom-left-1.jpg">
                    <div>
                        <h3>Best smart speakers for the year</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi iure modi animi cupiditate. Explicabo, nihil?</p>

                        <a href="#">Read More <span>>></span></a>
                    </div>
                </article>

                <article>
                    <img src="/public/images/bottom-left-2.jpg">
                    <div>
                        <h3>iPad Pro, reviewed: Has the iPad become my main computer now?</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi iure modi animi cupiditate. Explicabo, nihil?</p>

                        <a href="#">Read More <span>>></span></a>
                    </div>
                </article>
            </div>
        </section>

        <section class="main-container-right">
            <h2>Latest Stories</h2>

            <article>
                <h4>just in </h4>
                <div>
                    <h2>Here's how to track your stimulus check with the IRS Get My Payment Portal</h2>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, repellendus?</p>

                    <a href="#">Read More <span>>></span></a>
                </div>
                <img src="/public/images/right-1.jpg">
            </article>

            <article>
                <h4>just in </h4>
                <div>
                    <h2>The best outdoor games to play with your family</h2>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, repellendus?</p>

                    <a href="#">Read More <span>>></span></a>
                </div>
                <img src="/public/images/right-2.jpg">
            </article>

            <article>
                <h4>just in </h4>
                <div>
                    <h2>Why walk? Check out the best electric scooters and e-bikes for 2020</h2>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, repellendus?</p>

                    <a href="#">Read More <span>>></span></a>
                </div>
                <img src="/public/images/right-3.jpg">
            </article>

            <article>
                <h4>just in </h4>
                <div>
                    <h2>Disneyland Paris will stream its Lion King stage show Friday night</h2>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, repellendus?</p>

                    <a href="#">Read More <span>>></span></a>
                </div>
                <img src="/public/images/right-4.jpg">
            </article>

            <article>
                <h4>just in </h4>
                <div>
                    <h2>Looking at a phone's lock screen also requries a warrant, judge rules</h2>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, repellendus?</p>

                    <a href="#">Read More <span>>></span></a>
                </div>
                <img src="/public/images/right-5.jpg">
            </article>
        </section>
    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-left">
                <h2>TECHNEWS</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur molestias aut blanditiis totam quia enim, autem tenetur cum facere, fugit beatae at voluptas ipsum perferendis!</p>
            </div>

            <div class="footer-right">
                <h2>Newletter</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, autem!</p>

                <div>
                    <input type="text" placeholder="Email Address">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
        </div>

        <p>Copyright &copy; 2025 All rights reserved | GeekProbin</p>
    </footer>

    <script src="../../../index.php" async defer></script>
</body>

</html>