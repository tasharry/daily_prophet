<?php

require 'db.php';

$headerColor = $db->query("SELECT color FROM colors WHERE element = 'header'")->fetchArray()['color'];
$backgroundColor = $db->query("SELECT color FROM colors WHERE element = 'background'")->fetchArray()['color'];
