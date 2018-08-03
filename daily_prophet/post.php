<?php
require 'db.php';

if (isset($_POST['title'])) {
    $title = $_POST['title'];
} else {
    $title = null;
}

if (isset($_POST['category'])) {
    $category = $_POST['category'];
} else {
    $category = null;
}

if (isset($_POST['text'])) {
    $text = $_POST['text'];
} else {
    $text = null;
}

if ($title && $category && $text) {
    $query = "INSERT INTO articles (title, text, category) VALUES ('$title', '$text', '$category')";
    $result = $db->exec($query);
    $id = $db->lastInsertRowID();
    if ($id) {
        header("Location: article.php?id=$id");
        exit;
    }
}

if (isset($_POST['newCatName'])) {
    $new_category = $_POST['newCatName'];
} else {
    $new_category = null;
}

if ($new_category) {
    $query = "INSERT INTO categories (title) VALUES ('$new_category')";
    $result = $db->exec($query);
    $id = $db->lastInsertRowID();
    if ($id) {
        header("Location: admin.php");
        exit;
    }
}

if (isset($_POST['headerColor'])) {
    $color = $_POST['headerColor'];
    $query = "UPDATE colors SET color = '$color' WHERE element = 'header'";
    $db->exec($query);
    header("Location: admin.php");
    exit;
}

if (isset($_POST['backgroundColor'])) {
    $color = $_POST['backgroundColor'];
    $query = "UPDATE colors SET color = '$color' WHERE element = 'background'";
    $db->exec($query);
    header("Location: admin.php");
    exit;
}

header("Location: index.php");
exit;
