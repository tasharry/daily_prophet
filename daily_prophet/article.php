<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>TITLE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="common-css/bootstrap.css" rel="stylesheet">
    <link href="common-css/ionicons.css" rel="stylesheet">
    <link href="single-post-2/css/styles.css" rel="stylesheet">
    <link href="single-post-2/css/responsive.css" rel="stylesheet">

    <?php include 'db.php'; ?>
</head>
<body>

<?php include 'header.php'; ?>

<div class="slider"></div>

<section class="post-area">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = 1;
    }

    $article = $db->query("SELECT * FROM articles WHERE id = '$id'")->fetchArray();

    $fileSystemIterator = new FilesystemIterator('images');
    $images = array();
    foreach ($fileSystemIterator as $fileInfo) {
        $images[] = $fileInfo->getFilename();
    }

    $image = $images[$id % count($images)];
    $likes = crc32($id) % 100;
    $comments = crc32($id) % 15;
    $watching = crc32($id) % 5;
    ?>

    <div class="container">

        <div class="row">

            <div class="col-lg-1 col-md-0"></div>
            <div class="col-lg-10 col-md-12">

                <div class="main-post">

                    <div class="post-top-area">

                        <h5 class="pre-title"><?php echo $article['category'] ?></h5>

                        <h3 class="title"><a href="#"><b><?php echo $article['title'] ?></b></a></h3>


                        <p class="para">
                            <?php echo $article['text'] ?>

                            ...

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex
                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat
                            nulla pariatur. Excepteur sint
                            occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum</p>

                    </div><!-- post-top-area -->

                    <div class="post-image"><img src="images/<?php echo $image ?>" alt="Blog Image"></div>

                    <div class="post-bottom-area">
                        <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut aliquip ex
                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat
                            nulla pariatur. Excepteur sint
                            occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum</p>

                        <ul class="tags">
                            <li><a href="#">Mnual</a></li>
                            <li><a href="#">Liberty</a></li>
                            <li><a href="#">Recommendation</a></li>
                            <li><a href="#">Inspiration</a></li>
                        </ul>

                        <div class="post-icons-area">
                            <ul class="post-icons">
                                <li><a href="#"><i class="ion-heart"></i><?php echo $likes ?></a></li>
                                <li><a href="#"><i class="ion-chatbubble"></i><?php echo $comments ?></a></li>
                                <li><a href="#"><i class="ion-eye"></i><?php echo $watching ?></a></li>
                            </ul>
                        </div>

                    </div><!-- post-bottom-area -->
                </div><!-- main-post -->
            </div><!-- col-lg-8 col-md-12 -->
        </div><!-- row -->
    </div><!-- container -->
</section><!-- post-area -->

<br>

<section class="comment-section center-text">
    <div class="container">
        <h4><b>POST COMMENT</b></h4>
        <div class="row">

            <div class="col-lg-2 col-md-0"></div>

            <div class="col-lg-8 col-md-12">
                <div class="comment-form">
                    <form method="post">
                        <div class="row">

                            <div class="col-sm-6">
                                <input type="text" aria-required="true" name="contact-form-name" class="form-control"
                                       placeholder="Enter your name" aria-invalid="true" required>
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-6">
                                <input type="email" aria-required="true" name="contact-form-email" class="form-control"
                                       placeholder="Enter your email" aria-invalid="true" required>
                            </div><!-- col-sm-6 -->

                            <div class="col-sm-12">
									<textarea name="contact-form-message" rows="2" class="text-area-messge form-control"
                                              placeholder="Enter your comment" aria-required="true"
                                              aria-invalid="false"></textarea>
                            </div><!-- col-sm-12 -->
                            <div class="col-sm-12">
                                <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                            </div><!-- col-sm-12 -->

                        </div><!-- row -->
                    </form>
                </div><!-- comment-form -->

                <h4><b>COMMENTS(12)</b></h4>

                <div class="commnets-area text-left">

                    <div class="comment">

                        <div class="post-info">

                            <div class="left-area">
                                <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg"
                                                                alt="Profile Image"></a>
                            </div>

                            <div class="middle-area">
                                <a class="name" href="#"><b>Katy Liu</b></a>
                                <h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
                            </div>

                            <div class="right-area">
                                <h5 class="reply-btn"><a href="#"><b>REPLY</b></a></h5>
                            </div>

                        </div><!-- post-info -->

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
                            Ut enim ad minim veniam</p>

                    </div>

                    <div class="comment">
                        <h5 class="reply-for">Reply for <a href="#"><b>Katy Lui</b></a></h5>

                        <div class="post-info">

                            <div class="left-area">
                                <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg"
                                                                alt="Profile Image"></a>
                            </div>

                            <div class="middle-area">
                                <a class="name" href="#"><b>Katy Liu</b></a>
                                <h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
                            </div>

                            <div class="right-area">
                                <h5 class="reply-btn"><a href="#"><b>REPLY</b></a></h5>
                            </div>

                        </div><!-- post-info -->

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
                            Ut enim ad minim veniam</p>

                    </div>

                </div><!-- commnets-area -->

                <div class="commnets-area text-left">

                    <div class="comment">

                        <div class="post-info">

                            <div class="left-area">
                                <a class="avatar" href="#"><img src="images/avatar-1-120x120.jpg"
                                                                alt="Profile Image"></a>
                            </div>

                            <div class="middle-area">
                                <a class="name" href="#"><b>Katy Liu</b></a>
                                <h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
                            </div>

                            <div class="right-area">
                                <h5 class="reply-btn"><a href="#"><b>REPLY</b></a></h5>
                            </div>

                        </div><!-- post-info -->

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
                            Ut enim ad minim veniam</p>

                    </div>

                </div><!-- commnets-area -->

                <a class="more-comment-btn" href="#"><b>VIEW MORE COMMENTS</a>

            </div><!-- col-lg-8 col-md-12 -->

        </div><!-- row -->

    </div><!-- container -->
</section>

<?php include 'footer.php'; ?>

<!-- SCIPTS -->

<script src="common-js/jquery-3.1.1.min.js"></script>
<script src="common-js/tether.min.js"></script>
<script src="common-js/bootstrap.js"></script>
<script src="common-js/scripts.js"></script>
</body>
</html>
