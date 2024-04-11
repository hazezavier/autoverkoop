<?php

require "classes/dbconnectie.php";
require_once 'auth.php';

requireNotLoggedIn();

$config = require('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];


    try {
        $db = new Database($config);

        $query = "SELECT * FROM user WHERE username = :username";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':username', $usernameInput);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);


        if ($user && password_verify($passwordInput, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            echo "test";
            header('Location: index.php');
            exit();
        } else {
            echo "Invalid username or password";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<section class="vh-100" style="background-color: #007bff;"> <!-- Changed the background color to blue -->
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">

              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <div class="image-container" style="border-radius: 1rem 0 0 1rem; overflow: hidden;">
                  <img src="../images/login_jdm.png" alt="login form" class="img-fluid" style="width: 100%; height: auto;" />
                </div>
              </div>

            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post" action="">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">CARZILLA</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="text" id="form2Example17" class="form-control form-control-lg" name="username" required>
                    <label class="form-label" for="form2Example17">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="password" required>
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit" value="LOGIN" name="btnsubmit">Login</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php" style="color: #393f81;">Register here</a></p>
                  
                  <div class="text-center"> <!-- Center the anchor elements -->
                    <a href="#!" class="small text-muted">All kinds of machine.</a>
                    <a href="#!" class="small text-muted">Carzilla Inc.</a>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
