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
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
    } else {
        $login = null;
    }

    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $password = null;
    }

    if ($login && $password) {
        $user = $db->query("SELECT * FROM users WHERE login = '$login'")->fetchArray();
        if ($user) {
            if (md5($password) == $user['password']) {
                $_SESSION['logged_user'] = $user;
                header('Location: index.php');
                exit;
            }
        }
    }
    ?>

    <div class="container text-center">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <form class="form-signin" action="login.php" method="post">
                        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input name="login" type="email" id="inputEmail" class="form-control"
                               placeholder="Email address" required=""
                               autofocus="">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input name="password" type="password" id="inputPassword" class="form-control"
                               placeholder="Password"
                               required="">
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        <p class="mt-5 mb-3 text-muted">© 2018</p>
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
