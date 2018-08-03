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
    <link href="common-css/style.css" rel="stylesheet">
    <link href="layout-1/css/styles.css" rel="stylesheet">
    <link href="layout-1/css/responsive.css" rel="stylesheet">

    <?php include 'db.php'; ?>
</head>
<body>

<?php include 'header.php'; ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
    <p class="text-center ln text-info">LATEST NEWS</p>
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active ">
            <img class="d-block w-50 h-20 " src="images/photo-1460925895917-afdab827c52f.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="font-weight-bold">Lorem ipsum..</h5>
                <p class="text-white bg-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-50" src="images/pexels-photo-370474.jpeg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="font-weight-bold">Lorem ipsum..</h5>
                <p class="text-white bg-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-50 h-10" src="images/marion-michele-330691.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="font-weight-bold">Lorem ipsum..</h5>
                <p class="text-white bg-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do...</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<section class="blog-area section">
    <?php
    $categories = $db->query('SELECT * FROM "categories"');
    $articles = $db->query('SELECT * FROM "articles"');
    ?>

    <div class="container">
        <p class="text-center ln text-info">CATEGORIES</p>
        <div class="row">
            <?php while ($cat = $categories->fetchArray()) {
                $cat = $cat['title'] ?>
                <ul class="list-group list-group-flush">
                    <p class="text-center text-info"><a
                                href="categories.php?category=<?php echo $cat ?>">
                            <?php echo $cat; ?>
                        </a>
                    </p>
                    <?php
                    while ($art = $articles->fetchArray()) {
                        if ($art['category'] == $cat) { ?>
                            <li class="list-group-item"><?php echo $art['title'] ?></li>
                        <?php }
                    } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
    <?php
    $categories->finalize();
    $articles->finalize();
    ?>
</section>

<?php include 'footer.php'; ?>

<script src="common-js/jquery-3.1.1.min.js"></script>
<script src="common-js/tether.min.js"></script>
<script src="common-js/bootstrap.js"></script>
<script src="common-js/scripts.js"></script>
</body>
</html>
