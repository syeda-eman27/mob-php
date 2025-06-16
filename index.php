<?php
include 'header.php'; // Always include navbar

if (isset($_GET['pageid'])) {
    $page = $_GET['pageid'];
    $file_to_include = $page . '.php';
    if (file_exists($file_to_include)) {
        include $file_to_include;
    } else {
        include 'iphone.php'; 
    }
} else {
    include 'iphone.php';
}
?>
