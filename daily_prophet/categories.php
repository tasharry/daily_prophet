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

<section class="blog-area section">
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    if (isset($_GET['category'])) {
        $category = $_GET['category'];
    } else {
        $category = 'Politics';
    }

    $max_records = 6;
    $offset = ($page - 1) * $max_records;
    $total_rows = $db->query("SELECT COUNT(*) FROM articles WHERE category='$category'")->fetchArray()[0];
    $total_pages = ceil($total_rows / $max_records);
    $articles = $db->query("SELECT * FROM articles WHERE category = '$category' LIMIT $offset, $max_records");

    $fileSystemIterator = new FilesystemIterator('images');
    $images = array();
    foreach ($fileSystemIterator as $fileInfo) {
        $images[] = $fileInfo->getFilename();
    }
    ?>

    <div class="container">
        <div class="row">
            <?php while ($art = $articles->fetchArray()) {
                $id = $art['id'];
                $image = $images[$id % count($images)];
                $likes = crc32($id) % 100;
                $comments = crc32($id) % 15;
                $watching = crc32($id) % 5;
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="single-post post-style-1">
                            <div class="blog-image"><img src="images/<?php echo $image ?>" alt="">
                            </div>
                            <div class="blog-info">
                                <h4 class="title">
                                    <a href="article.php?id=<?php echo $art['id'] ?>">
                                        <b><?php echo $art['title'] ?></b>
                                    </a>
                                </h4>

                                <ul class="post-footer">
                                    <li><a href="#"><i class="ion-heart"></i><?php echo $likes ?></a></li>
                                    <li><a href="#"><i class="ion-chatbubble"></i><?php echo $comments ?></a></li>
                                    <li><a href="#"><i class="ion-eye"></i><?php echo $watching ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>


        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php for ($p = 1; $p <= $total_pages; $p++) { ?>
                    <li class="page-item"><a class="page-link"
                                             href="?<?php echo "page=$p&category=$category" ?>">
                            <?php echo $p ?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
</section>

<?php include 'footer.php'; ?>

<script src="common-js/jquery-3.1.1.min.js"></script>
<script src="common-js/tether.min.js"></script>
<script src="common-js/bootstrap.js"></script>
<script src="common-js/scripts.js"></script>
</body>
</html>