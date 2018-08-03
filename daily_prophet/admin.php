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
    if ($logged_user && !$logged_user['is_admin']) {
        header('Location: index.php');
        exit;
    }

    $categories = $db->query('SELECT * FROM "categories"');
    $colors = $db->query('SELECT color from available_colors');
    ?>

    <div class="container text-center">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <form action="post.php" method="post">
                        <div class="form-group">
                            <label for="headerColor">Header color</label>
                            <select name="headerColor" class="form-control" id="headerColor">
                                <?php while ($color = $colors->fetchArray()) {
                                    $color = $color['color'];
                                    echo "<option>$color</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Set</button>
                    </form>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <form action="post.php" method="post">
                        <div class="form-group row">
                            <label for="inputCat" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <input name="newCatName" type="text" required class="form-control" id="inputCat"
                                       placeholder="Category name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoryText">Category description...</label>
                            <textarea name="newCatText" required class="form-control" id="categoryText"
                                      rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">Add</button>
                    </form>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <form action="post.php" method="post">
                        <div class="form-group row">
                            <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input name="title" type="text" required class="form-control" id="inputTitle"
                                       placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" class="form-control" id="category">
                                <?php while ($cat = $categories->fetchArray()) {
                                    $cat = $cat['title'];
                                    echo "<option>$cat</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="textArea">Article text...</label>
                            <textarea name="text" required class="form-control" id="textArea" rows="10"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">Post</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<script src="common-js/jquery-3.1.1.min.js"></script>
<script src="common-js/tether.min.js"></script>
<script src="common-js/bootstrap.js"></script>
<script src="common-js/scripts.js"></script>
</body>
</html>
