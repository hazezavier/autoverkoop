<?php
session_start();
<<<<<<< HEAD

=======
>>>>>>> origin/master
// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to login page
header('Location: login.php');
exit();
?>
