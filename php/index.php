<?php
require_once 'auth.php';
require("classes/dbconnectie.php");
include("classes/car.php");
include("classes/bike.php");
include("classes/image.php");

requireLogin();

$config = require('config.php');
$db = new Database($config);

// Retrieve data for dropdowns from the database
$queryBrands = "SELECT brand FROM car";
$resultBrands = $db->connection->query($queryBrands);

$queryModels = "SELECT model FROM car";
$resultModels = $db->query($queryModels);

$queryYears = "SELECT YEAR(registration_date) AS year FROM car";
$resultYears = $db->query($queryYears);

$queryKilometers = "SELECT kilometers FROM car";
$resultKilometers = $db->query($queryKilometers);
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
        width: 90%;
        height: Auto;
    }
    
    .search-icon-position {
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}

    </style>

</head>

<body data-bs-spy="scroll" data-bs-target="#header-nav" tabindex="0" style="background-image: url('../images/MicrosoftTeams-image.png'); background-size: cover; background-position: center;">

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
                        <li class="nav-item me-2 mb-3 ms-5">
    <a class="nav-link px-3 py-2 text-white" href="logout.php" style="background-color: #dc3545; border: 1px solid #dc3545; border-radius: 5px; display: inline-block;">Logout</a>
</li>

                        </li>
                        <li class="nav-item me-2 mb-3">
                            <?php
                                // echo $_SESSION['username'];
                                // echo $_SESSION['id'];
                                // echo $_SESSION['email'];
                            ?>
                        </li>

                    </ul>

   
</div>

                        <!-- Modal -->
                
                    </div>
                </div>
            </div>
        </div>
    </nav>

   


    <!-- hero section start  -->
   <section id="hero" class="position-relative overflow-hidden">
    <div class="container">
        <div class="row justify-content-center align-items-center"> <!-- Center content horizontally and vertically -->
            <div class="col-md-6">
                <div class="hero-content text-center text-md-start">
                    <h1 class="text-white text-center my-5">Find your <span class="text-primary">VEHICLE</span></h1>
                    <p class="hero-paragraph text-white text-center pb-5">We have ONE of the BEST collections.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="position-absolute top-0 start-0 w-100 background-image" style="background-image: url('../images/banner-img.jpg'); height: 200px;">
    </div>
</section>


<!-- search section start -->
<section id="search">
    <div class="container search-block p-5">
        <form class="row" method="post" action="handle_search.php">
            <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                <label for="brand" class="label-style text-capitalize form-label">Brand</label>
                <div class="input-group date">
                    <select class="form-select form-control p-3" id="brand" name="brand" aria-label="Default select example" style="background-image: none;">
                        <option selected>Select Brand</option>
                        <?php
                        while ($row = $resultBrands->fetch()) {
                            echo '<option value="' . $row['brand'] . '">' . $row['brand'] . '</option>';
                        }
                        ?>
                    </select>
                    <span class="search-icon-position position-absolute p-3">
                        <iconify-icon class="search-icons" icon="solar:bus-outline"></iconify-icon>
                    </span>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                <label for="model" class="label-style text-capitalize form-label">Model</label>
                <div class="input-group date">
                    <select class="form-select form-control p-3" id="model" name="model" aria-label="Default select example" style="background-image: none;">
                        <option selected>Select Model</option>
                        <?php
                        while ($row = $resultModels->fetch()) {
                            echo '<option value="' . $row['model'] . '">' . $row['model'] . '</option>';
                        }
                        ?>
                    </select>
                    <span class="search-icon-position position-absolute p-3">
                        <iconify-icon class="search-icons" icon="solar:bus-outline"></iconify-icon>
                    </span>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                <label for="registration_date" class="label-style text-capitalize form-label">Build Year</label>
                <div class="input-group date" id="datepicker1">
                    <select class="form-select form-control p-3" id="registration_date" name="registration_date" aria-label="Default select example" style="background-image: none;">
                        <option selected>Select Build Year</option>
                        <?php
                        while ($row = $resultYears->fetch()) {
                            echo '<option value="' . $row['year'] . '">' . $row['year'] . '</option>';
                        }
                        ?>
                    </select>
                    <span class="input-group-append">
                        <span class="search-icon-position position-absolute p-3">
                            <iconify-icon class="search-icons" icon="solar:calendar-broken"></iconify-icon>
                        </span>
                    </span>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                <label for="kilometers" class="label-style text-capitalize form-label">Kilometers</label>
                <div class="input-group date" id="datepicker2">
                    <select class="form-select form-control p-3" id="kilometers" name="kilometers" aria-label="Default select example" style="background-image: none;">
                        <option selected>Select Kilometers</option>
                        <?php
                        while ($row = $resultKilometers->fetch()) {
                            echo '<option value="' . $row['kilometers'] . '">' . $row['kilometers'] . '</option>';
                        }
                        ?>
                    </select>
                    <span class="input-group-append">
                        <span class="search-icon-position position-absolute p-3">
                            <iconify-icon class="search-icons" icon="solar:calendar-broken"></iconify-icon>
                        </span>
                    </span>
                </div>
            </div>

            <!-- Add more form fields here -->

            <div class="d-grid gap-2 mt-4">
                <button class="btn btn-primary " type="submit">Find your vehicle</button>
            </div>
        </form>
    </div>
</section>


    </div>
</section>




    
    <!-- process section start  -->
    <section id="process">
        <div class=" process-content container">
            <h2 class=" text-center my-5 pb-5">Find the right <span class="text-primary"> WHIP </span> </h2>
            <hr class="progress-line">
            <div class="row process-block">
                <div class="col-6 col-lg-3 text-start my-4">
                    <div class="bullet"></div>
                    <h5 class="text-uppercase mt-5"> Choose a vehicle </h5>
                    <p>Sed euismod mauris corper libero.</p>
                </div>

                <div class="col-6 col-lg-3 text-start my-4">
                    <div class="bullet"></div>
                    <h5 class="text-uppercase mt-5"> Pick location & date </h5>
                    <p>Nisi maecenas fermentum neque.</p>
                </div>

                <div class="col-6 col-lg-3 text-start my-4">
                    <div class="bullet"></div>
                    <h5 class="text-uppercase mt-5"> Book your car </h5>
                    <p>Mauris corper accumsan urna sed.</p>
                </div>

                <div class="col-6 col-lg-3 text-start my-4">
                    <div class="bullet"></div>
                    <h5 class="text-uppercase mt-5"> Finish process </h5>
                    <p>Orci duis ut lectus metus nam sette.</p>
                </div>

            </div>


        </div>
    </section>

   

    <section id="rental" class="position-relative">
    <div class="container my-5 py-5">
        <h2 class="text-center my-5">NEWEST <span class="text-primary">Arrival</span></h2>

        <!-- Swiper -->
        <div class="swiper-container" style="height: 750px; overflow: hidden;">
            <div class="swiper-wrapper">

                <!-- First Slide -->
                <div class="swiper-slide noSwiping">
                    <div class="card">
                        <div class="boba">
                            <?php 
                                $t = new Image();
                                $t->getImage($db, 1);
                            ?>
                        </div>
                        <!-- <img src="../images/car1.png" class="card-img-top img-fluid smaller-image" alt="BMW x3"> -->
                        <div class="card-body p-4">
                            <h4 class="card-title">
                                <?php 
                                    $car = Car::brandCarInfo($db, 1);
                                ?>
                            </h4>
                            <div class="card-text">
                                <ul class="d-flex list-unstyled">
                                <?php
                                    $car = Car::shortCarInfo($db, 1);
                                ?>
                                </ul>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h3 class="pt-2">
                                    <?php
                                        echo "€";
                                        $car = Car::priceCarInfo($db, 1);
                                        echo ",-";
                                    ?> 
                                    <span class="rental-price"></span>
                                </h3>
                                <form method="post" action="process_purchase.php">
                                    <input hidden name="id" value="<?php echo $_SESSION['id']; ?>">
                                    <input hidden name="username" value="<?php echo $_SESSION['username']; ?>">
                                    <input hidden name="email" value="<?php echo $_SESSION['email']; ?>">
                                    <input hidden name="car_id" value="<?php echo 1; ?>">
                                    
                                    <button type="submit" name="buy_car" class="btn btn-primary">Buy Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End First Slide -->

                <!-- Additional Slides -->
                <div class="swiper-slide noSwiping">
                    <div class="card">
                        <div class="boba">
                            <?php 
                                $t = new Image();
                                $t->getImage($db, 3);
                            ?>
                        </div>
                    
                        <div class="card-body p-4">
                            <h4 class="card-title">
                                <?php 
                                    $car = Car::brandCarInfo($db, 2);
                                ?>
                            </h4>
                            <div class="card-text">
                                <ul class="d-flex list-unstyled">
                                <?php
                                    $car = Car::shortCarInfo($db, 2);
                                ?>
                                </ul>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <h3 class="pt-2">
                                    <?php
                                        echo "€";
                                        $car = Car::priceCarInfo($db, 2);
                                        echo ",-";
                                    ?> 
                                    <span class="rental-price"></span>
                                </h3>
                                <form method="post" action="process_purchase.php">
                                    <input hidden name="id" value="<?php echo $_SESSION['id']; ?>">
                                    <input hidden name="username" value="<?php echo $_SESSION['username']; ?>">
                                    <input hidden name="email" value="<?php echo $_SESSION['email']; ?>">
                                    <input hidden name="car_id" value="<?php echo 1; ?>">
                                    
                                    <button type="submit" name="buy_car" class="btn btn-primary">Buy Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Additional Slides -->

                <!-- Add more slides here as needed -->

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

    </div>
</section>






    <!-- testimonial section start  -->
    <section id="testimonial" class=" position-relative">
    <div class="pattern-overlay pattern-right position-absolute">
        <img src="../images/testimonial-pattern.png" alt="pattern" class="img-fluid" style="max-width: 70%;">
    </div>
        <div class="container my-5 py-5">
            <div class="swiper testimonial-swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide text-center">
                        <div class="offset-2 col-8">
                            <iconify-icon icon="mdi:format-quote-open" class="testimonial-icon"></iconify-icon>
                            <p class="testimonial-paragraph">Coming together is a beginning. Keeping together is progress. Working together is success
                            </p>
                            <h5>Herny Ford</h5>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination position-unset mt-4"></div>
            </div>
        </div>



    </section>

  
    <!-- blog section start  -->
    <section id="blog">

        <div class="container  py-5 my-5">
            <div class="row py-5 ">
                <div class="  pt-3 col-10 col-sm-8 col-lg-5">
                    <h2 class="">Our <span class="text-primary">Recent Posts</span> </h2>
                    <a href="#" class="btn btn-primary mt-4">Read Blogs </a>


                </div>
                <div class=" mt-5 mt-lg-0 col-lg-7">
                    <div class=" pt-3 d-flex">
                        <div class="">
                            <h3>Jan 2 <br> 2023</h3>
                        </div>
                        <div class="ms-5">
                            <p>Tips</p>
                            <a href="#" class="blog-title">2 door? less whores</a>
                        </div>
                    </div>
                    <hr>
                    <div class=" pt-3 d-flex">
                        <div class="">
                            <h3>Jan 5<br> 2023</h3>
                        </div>
                        <div class="ms-5">
                            <p>Best car of the year</p>
                            <a href="#" class="blog-title">Audi RS3 is one of the fastest........ read more</a>
                        </div>
                    </div>
                    <hr>
                    <div class=" pt-3 d-flex">
                        <div class="">
                            <h3>Jan 8 <br> 2023</h3>
                        </div>
                        <div class="ms-5">
                            <p>Tricks</p>
                            <a href="#" class="blog-title">1-2-3-4-5- R is for racing mode!</a>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>

        </div>

    </section>

    <!-- call-to-action section start  -->
    <section id="action" class="position-relative">

    <div class="pattern-overlay pattern-right position-absolute">
        <img src="../images/call-to-action-pattern.png" alt="pattern" class="img-fluid" style="max-width: 70%;">
    </div>

        <div class="container  py-5 my-5">
            <div class="row py-5 ">
                <div class=" col-10 col-sm-8 col-lg-6">
                    <h2 class="">Let’s begin with <span class="text-primary">CARZILLA</span> </h2>
                </div>
                <div class=" col-lg-6">
                    <p>We're more than just a destination to buy cars and motorcycles; we're your gateway to automotive dreams. Born from a passion for exceptional vehicles, CARZILLA stands as a beacon for enthusiasts and everyday drivers alike. Our commitment extends beyond transactions; we're here to ignite your automotive journey with unparalleled selection, expert guidance, and a seamless purchasing experience. With CARZILLA, discover more than just vehicles; embrace a community united by a love for the road and the thrill of the ride. Welcome to CARZILLA, where your automotive aspirations roar to life.</p>
                    <a href="#" class="btn btn-primary mt-2">Contact us at CARZILLA@cza.nl</a>
                </div>
            </div>

        </div>

    </section>

    <!-- Footer Section Starts -->
    <section id="footer">
        <div class="container footer-container mt-5">
            <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 my-5 py-5 ">

                <div class=" col-md-4 mt-5 mt-md-0 ">
                    <img src="../images/process-line.png" alt="image">
                    <p class="py-3">Follow us on social media for our newest arrivals!</p>
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