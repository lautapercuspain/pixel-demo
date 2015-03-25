<?php
//Process user input
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 7);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pixel_id'])) {

    $pixel_id  = intval($_POST['pixel_id']);
    $_SESSION['url'][$pixel_id] = trim($_POST['url']);
    $_SESSION['color'][$pixel_id] = trim($_POST['color']);
    $_SESSION['description'][$pixel_id] = trim($_POST['description']);
    session_write_close();
}

exit(); 
