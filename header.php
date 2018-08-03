<?php
include 'popup.php';
include 'colors.php';
?>

<header style="background-color: <?php echo $headerColor ?>">
    <div class="container-fluid position-relative no-side-padding">
        <a href="#" class="logo">Daily Prophet</a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="index.php">Home</a></li>
            <?php
            session_start();

            if (isset($_SESSION['logged_user'])) {
                $logged_user = $_SESSION['logged_user'];
                echo "<li><a href='#'>Hello, ${logged_user['name']}</a></li>";
                echo "<li><a href='logout.php'>Logout</a></li>";
            } else {
                $logged_user = null;
                echo "<li><a href='login.php'>Login</a></li>";
            }

            if ($logged_user && $logged_user['is_admin']) {
                echo "<li><a href='admin.php'>Admin</a></li>";
            }
            ?>
        </ul>

        <div class="src-area">
            <form>
                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                <input type="text" name="search" class="src-input" placeholder="Categories">
            </form>
        </div>
    </div>
</header>
