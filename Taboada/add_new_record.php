<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbf2taboada";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the submitted form
    $Seller_ID = $_POST['Seller_ID'];
    $FirstName = $_POST['FirstName'];
    $MiddleName = $_POST['MiddleName'];
    $LastName = $_POST['LastName'];
    $Age = $_POST['Age'];


    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO tblseller (Seller_ID, FirstName, MiddleName, LastName, Age) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $Seller_ID, $FirstName, $MiddleName, $LastName, $Age);

    // Execute the SQL statement
    if ($stmt->execute()) {
        header("Location: dashboard.php"); // Redirect to dashboard.php after successful registration
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Video Game E-Commerce</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Albert+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton&amp;subset=latin-ext,vietnamese&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Antonio&amp;subset=latin-ext&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Archivo&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas+Neue&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/--mp---Multiple-items-slider-responsive-styles.css">
    <link rel="stylesheet" href="assets/css/bgfinalnmn.css">
    <link rel="stylesheet" href="assets/css/carousel.css">
    <link rel="stylesheet" href="assets/css/drone.css">
    <link rel="stylesheet" href="assets/css/glitchhover.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar-styles.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar.css">
    <link rel="stylesheet" href="assets/css/Hero-Carousel-images.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Loading-Page-Animation-Style-styles.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Brand-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/Navigation-Menu.css">
    <link rel="stylesheet" href="assets/css/News-Cards.css">
    <link rel="stylesheet" href="assets/css/pacman-final.css">
    <link rel="stylesheet" href="assets/css/pacman.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form-.css">
    <link rel="stylesheet" href="assets/css/Product-Carousel-V11-styles.css">
    <link rel="stylesheet" href="assets/css/Product-Carousel-V11.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product-swiper.min.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product-untitled.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body style="background: rgb(45,31,85);">
    <div style="width: 100%;height: 100%;background: linear-gradient(#081422 0%, #2d1f55 19%), #131313;">
        <header>
            <nav class="navbar navbar-dark navbar-expand-md d-xl-flex justify-content-xl-center align-items-xl-center" id="app-navbar" style="background: rgba(0,0,0,0);">
                <div class="container-fluid"><a class="navbar-brand d-flex d-xl-flex flex-row align-items-center justify-content-xl-center" href="homepage.php" style="background: rgba(255,255,255,0);"><img class="glitch_img" src="assets/img/HALIYA%20(7).png" width="64" height="60"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1" style="border-color: rgba(255,255,255,0);"><span class="visually-hidden">Toggle navigation</span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 27px;color: var(--bs-gray-100);">
                            <path d="M2 6C2 5.44772 2.44772 5 3 5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H3C2.44772 7 2 6.55228 2 6Z" fill="currentColor"></path>
                            <path d="M2 12.0322C2 11.4799 2.44772 11.0322 3 11.0322H21C21.5523 11.0322 22 11.4799 22 12.0322C22 12.5845 21.5523 13.0322 21 13.0322H3C2.44772 13.0322 2 12.5845 2 12.0322Z" fill="currentColor"></path>
                            <path d="M3 17.0645C2.44772 17.0645 2 17.5122 2 18.0645C2 18.6167 2.44772 19.0645 3 19.0645H21C21.5523 19.0645 22 18.6167 22 18.0645C22 17.5122 21.5523 17.0645 21 17.0645H3Z" fill="currentColor"></path>
                        </svg></button>
                    <div class="collapse navbar-collapse d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-md-end justify-content-lg-end justify-content-xl-end justify-content-xxl-end" id="navcol-1">
                        <div style="width: 109px;"></div>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="taboada_aboutme.php" style="font-size: 21PX;font-family: 'Bebas Neue', serif;">about me</a></li>
                            <li class="nav-item"><a class="nav-link" href="dashboard.php" style="font-size: 21PX;font-family: 'Bebas Neue', serif;">back</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div style="height: 37px;"></div>
            <div class="container">
                <div style="height: 953.094px;max-height: 100%;">
                    <h1 class="text-center" style="font-family: 'Bebas Neue', serif;color: var(--bs-body-bg);font-size: 58px;">add new record</h1>
                    <div style="height: 55px;"></div>
                    <div class="row register-form">
                        <div class="col-md-8 offset-md-2">
                            <form action = "add_new_record.php" method = "POST" style="border-radius: 31px;background: rgb(45,31,84);max-width: 100%;">
                                <div class="row form-group">
                                    <div><label  style="color: var(--bs-border-color);font-family: 'Bebas Neue', serif;font-size: 21px;">first name:</label></div>
                                    <div><input  type="text" name = "FirstName" style="background: #45377b;border-radius: 9px;color: rgb(255,255,255);"></div>
                                </div>
                                <div class="row form-group">
                                    <div><label  style="font-family: 'Bebas Neue', serif;font-size: 21px;color: var(--bs-border-color);">middle name:</label></div>
                                    <div><input  type="text" name = "MiddleName" style="background: #45377b;border-radius: 9px;color: rgb(255,255,255);"></div>
                                </div>
                                <div class="row form-group">
                                    <div><label  style="font-family: 'Bebas Neue', serif;font-size: 21px;color: var(--bs-border-color);">last name:</label></div>
                                    <div><input  type="text" name = "LastName" style="background: #45377b;border-radius: 9px;color: rgb(255,255,255);"></div>
                                </div>
                                <div class="row form-group">
                                    <div><label  style="font-family: 'Bebas Neue', serif;font-size: 21px;color: var(--bs-border-color);">age:</label></div>
                                    <div><input  type="number" name = "Age" style="background: #45377b;border-radius: 9px;color: rgb(255,255,255);"></div>
                                </div>
                                <br><button class="btn btn-primary" role="button" style="background: rgb(80, 59, 140); border-color: rgba(255, 255, 255, 0);" >Add New Record</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <footer class="text-center" style="background: linear-gradient(5deg, #081422, #2d1f55 46%);">
            <div class="container text-muted py-4 py-lg-5">
                <p class="mb-0">Charlotte G. Taboada BSCS-2 F2</p>
            </div>
        </footer>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/--mp---Multiple-items-slider-responsive-1.js"></script>
    <script src="assets/js/--mp---Multiple-items-slider-responsive.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Loading-Page-Animation-Style.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/Swiper-Slider-Card-For-Blog-Or-Product.js"></script>
    <script src="assets/js/untitled.js"></script>
</body>

</html>