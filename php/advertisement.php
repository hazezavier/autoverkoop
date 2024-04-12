<?php
require_once 'auth.php';

require("classes/dbconnectie.php");
include("classes/car.php");
include("classes/bike.php");
include("classes/image.php");
include("classes/seller.php");

requireLogin();

$config = require('config.php');

$db = new Database($config);

if (isset($_GET['car_id'])) {
    $carId = $_GET['car_id'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARZILLA</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&family=Raleway:wght@400;700&display=swap" rel="stylesheet">


    <!-- script ================================================== -->
    <script src="js/modernizr.js"></script>

    <style>
    .smaller-image {
        max-height: 200px; /* Adjust as needed */
    }

    #hero {
    color: white;
}

.background-image {
    z-index: -1;
    background-size: cover; /* Ensure the background image covers the entire section */
    background-position: center; /* Center the background image */
    opacity: 0.7;
}

.boba{
        display: flex;
        justify-content: center;
        /* width: 90%; */
        height: 530px;
    }


    </style>
</head>


<body data-bs-spy="scroll" data-bs-target="#header-nav" tabindex="0" style="background-image: url('../images/MicrosoftTeams-images.png'); background-size: cover; background-position: center;">

<nav class="navbar navbar-expand-lg navbar-light container-fluid py-3">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="../images/logo.png" alt="logo" class="img-fluid" style="max-height: 80px;">
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav align-items-center justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active px-3" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="#rental">Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="#blog">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="#action">Contact</a>
                        </li>
                        <li class="nav-item me-2 mb-3">
                        <a class="nav-link px-3 py-2 text-white" href="logout.php" style="background-color: #dc3545; border: 1px solid #dc3545; border-radius: 5px; display: inline-block;">Logout</a>
                        </li>
                        <li class="nav-item me-2 mb-3">
                            <?php
                                // echo $_SESSION['username'];
                                // echo $_SESSION['id'];
                                // echo $_SESSION['email'];
                            ?>
                        </li>

                    </ul>

                    <!-- <div class="d-flex mt-5 mt-lg-0 ps-xl-5 align-items-center justify-content-center"> -->
    <!-- <ul class="navbar-nav justify-content-end align-items-center">
        <li class="nav-item">
            <a class="nav-link px-3" href="login.php">Login</a>
        </li>
    </ul>
    <button type="button" class="btn btn-outline-primary nav-button mx-3" data-bs-toggle="modal"
        data-bs-target="#exampleModal2">Register</button> -->
</div>

                        <!-- Modal -->
                
                    </div>
                </div>
            </div>
        </div>
    </nav>

   

    <!-- hero section start  -->


<!-- purchase section start  -->

<section id="buy" class="position-relative">
    <div class="container my-5">
        <h1 style="color:#0d6efd;;" class="text-center my-5">CARZILLA</span></h1>

        <!-- Swiper -->
        <div class="swiper-container" style="height: 1000px; overflow: hidden;">
            <div class="swiper-wrapper">

                <!-- First Slide -->
                <div class="swiper-slide noSwiping">
                    <div class="card">
                        <div class="boba">
                            <?php 
                                $t = new Image();
                                $t->getImage($db, $carId);
                            ?>
                        </div>
                        <!-- <img src="../images/car1.png" class="card-img-top img-fluid smaller-image" alt="BMW x3"> -->
                        <div class="card-body p-4">
                            <h4 class="card-title">
                                <?php 
                                    $car = Car::brandCarInfo($db, $carId);
                                ?>
                            </h4>
                            <div class="card-text">
                                <ul class="d-flex list-unstyled">
                                <?php
                                    $car = Car::shortCarInfo($db, $carId);
                                ?>
                                </ul>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h3 class="pt-2">
                                    <?php
                                        echo "€";
                                        $car = Car::priceCarInfo($db, $carId);
                                        echo ",-";
                                    ?> 
                                    <span class="rental-price"></span>
                                </h3>
                                <form method="post" action="process_purchase.php">
                                    <input hidden name="id" value="<?php echo $_SESSION['id']; ?>">
                                    <input hidden name="username" value="<?php echo $_SESSION['username']; ?>">
                                    <input hidden name="email" value="<?php echo $_SESSION['email']; ?>">
                                    <input hidden name="car_id" value="<?php echo 1; ?>">
                                    
                                    
                                    <button type="submit" class="btn btn-success" name="buy_car">Buy immediately</button>
                                    <button type="submit" class="btn btn-secondary" name="buy_car">Request a test drive</button>
                                    <button type="submit" class="btn btn-secondary" name="buy_car">request a trade-in proposal</button>

                                    <div id="sellersInfo" class=""> 
                                        
                                        
                                        <div class="row">
    <div class="col-auto">
        <i class="fas fa-user"></i> <!-- Font Awesome user icon -->
    </div>
    
</div>

                                        

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <br>
                        <h2>Seller information</h2>
                        <p><?php $userNa = Seller::displaySeller($db, 11);?></p>
                    </div>
                </div>
                <!-- End First Slide -->

                <!-- Additional Slides -->
                
                <!-- End Additional Slides -->

                <!-- Add more slides here as needed -->

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            
        </div>

            <div id="specifications" class="">  
                <h3 style="color:#0d6efd;" class="my-5">Specifications</span></h3>
                <p class="pt-3 col-10 col-sm-8 col-lg-5">Lorem ipsum dolor sit amet. Qui possimus cupiditate et voluptatem culpa sed voluptatum suscipit rem totam veritatis ut commodi blanditiis. Et cumque culpa sit ducimus corrupti ea mollitia error a officiis repellat et nostrum veniam. Aut quos provident sed fuga sapiente et inventore vitae quo sequi odio? Eos fugiat fugiat ea consequuntur minima sed totam magni et exercitationem adipisci quo dolore aliquam sed voluptatem quia.</span></p>
            </div>
        
            <div id="description" class="">  
                <h3 style="color:#0d6efd;" class="my-5">Description</span></h3>
                <p class="pt-3 col-10 col-sm-8 col-lg-5">Lorem ipsum dolor sit amet. Qui possimus cupiditate et voluptatem culpa sed voluptatum suscipit rem totam veritatis ut commodi blanditiis. Et cumque culpa sit ducimus corrupti ea mollitia error a officiis repellat et nostrum veniam. Aut quos provident sed fuga sapiente et inventore vitae quo sequi odio? Eos fugiat fugiat ea consequuntur minima sed totam magni et exercitationem adipisci quo dolore aliquam sed voluptatem quia.</span></p>
            </div>

       
    </div>
</section>


                  <!-- Footer Section Starts -->
    <section id="footer">
        <div class="container footer-container mt-5">
            <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 my-5 py-5 ">

                <div class=" col-md-4 mt-5 mt-md-0 ">
                    <img src="../images/process-line.png" alt="image">
                    <p class="py-3">Vel non nibh vestibulum massa ullam corper bib endum ultrices venenatis, id id sed
                        mass.</p>
                    <div class="d-flex align-items-center ">
                        <a href="#" target="_blank"><iconify-icon class="social-link-icon pe-4"
                                icon="mdi:facebook"></iconify-icon></a>
                        <a href="#" target="_blank"><iconify-icon class="social-link-icon pe-4"
                                icon="mdi:twitter"></iconify-icon></a>
                        <a href="#" target="_blank"><iconify-icon class="social-link-icon pe-4"
                                icon="mdi:instagram"></iconify-icon></a>
                        <a href="#" target="_blank"><iconify-icon class="social-link-icon pe-4"
                                icon="mdi:linkedin"></iconify-icon></a>
                        <a href="#" target="_blank"><iconify-icon class="social-link-icon pe-4"
                                icon="mdi:youtube"></iconify-icon></a>
                    </div>

                </div>

                <div class="col-md-7 offset-md-1 mt-5">
                    <ul class="footer-nav list-unstyled ">
                        <li class="nav-item me-2 mb-3">
                            <a class="nav-link px-4" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item me-2 mb-3">
                            <a class="nav-link px-4" href="#">Booking</a>
                        </li>
                        <li class="nav-item me-2 mb-3">
                            <a class="nav-link px-4" href="#">About</a>
                        </li>
                        <li class="nav-item me-2 mb-3">
                            <a class="nav-link px-4" href="#">Cars</a>
                        </li>
                        <li class="nav-item me-2 mb-3">
                            <a class="nav-link px-4" href="#">Services</a>
                        </li>
                        <li class="nav-item me-2 mb-3">
                            <a class="nav-link px-4" href="#">Contact</a>
                        </li>
                    </ul>
                </div>

            </footer>
        </div>



        <footer class="d-flex flex-wrap justify-content-between align-items-center border-top"></footer>

        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 pt-4">
                <div class="col-md-6 d-flex align-items-center">
                    <p>© 2024 CARZILLA - All rights reserved</p>

                </div>
            
            </footer>
        </div>
    </section>




    <!-- script ================================================== -->
    <script src="js/jquery-1.11.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Your custom JavaScript -->

<script>
    var swiper = new Swiper('.swiper-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        allowTouchMove: false // Disable mouse dragging
    });
</script>



</body>

</html>