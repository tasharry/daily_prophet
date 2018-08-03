<?php

if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $sql = "SELECT title FROM categories WHERE title LIKE '$query'";

    echo "<script>console.log($sql)</script>";

    $result = $db->query($query);

    $array = array();
    while ($row = $result->fetchArray()) {
        $array[] = array(
            'label' => $row['title'],
            'value' => $row['title'],
        );
    }

    echo json_encode($array);
}
