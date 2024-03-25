<?php
function isUserLoggedIn() {
    return isset($_SESSION['username']);
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