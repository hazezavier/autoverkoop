<?php
function isUserLoggedIn() {
    session_start();
    return isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['email']);
}

function requireLogin() {
    if (!isUserLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

function requireNotLoggedIn() {
    if (isUserLoggedIn()) {
        header('Location: index.php');
        exit();
    }
}