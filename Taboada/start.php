<?php
session_start(); // start session

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbf2taboada";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// handle login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  // query database for user with matching username and password
  $sql = "SELECT * FROM tbluseraccount WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  // if user is found, set session variables and redirect to dashboard page
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["user_id"] = $row["id"];
    $_SESSION["username"] = $row["username"];
    header("Location: homepage.php");
    exit;
  } else {
    // if user is not found, display error message
    $login_error = "Invalid username or password";
  }
}

  // handle logout
if (isset($_GET["logout"])) {
  // destroy session and redirect to login page
  session_unset();
  session_destroy();
  header("Location: homepage.php");
  exit();
}

    // Close the statement and connection
    mysqli_close($conn);
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
    <link rel="stylesheet" href="assets/css/aos.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
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
    <link rel="stylesheet" href="assets/css/Product-Carousel-V11-styles.css">
    <link rel="stylesheet" href="assets/css/Product-Carousel-V11.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product-swiper.min.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product-untitled.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body class="d-xxl-flex justify-content-xxl-center align-items-xxl-center body-2" style="border-color: rgb(71,71,71);background: #131313;">
    <div class="flash animated bg-container"><div style="color: #FFFFFF" class="la-pacman la-3x">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div></div>
    <div data-aos="fade-up" data-aos-delay="3000" style="width: 100%;height: 100%;background: linear-gradient(#081422 0%, #2d1f55 19%), #131313;">
        <header>
            <nav class="navbar navbar-dark navbar-expand-md d-xl-flex justify-content-xl-center align-items-xl-center" id="app-navbar" style="background: rgba(0,0,0,0);">
                <div class="container-fluid"><a class="navbar-brand d-flex d-xl-flex flex-row align-items-center justify-content-xl-center" href="start.php" style="background: rgba(255,255,255,0);"><img class="glitch_img" src="assets/img/HALIYA%20(7).png" width="64" height="60"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1" style="border-color: rgba(255,255,255,0);"><span class="visually-hidden">Toggle navigation</span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 27px;color: var(--bs-gray-100);">
                            <path d="M2 6C2 5.44772 2.44772 5 3 5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H3C2.44772 7 2 6.55228 2 6Z" fill="currentColor"></path>
                            <path d="M2 12.0322C2 11.4799 2.44772 11.0322 3 11.0322H21C21.5523 11.0322 22 11.4799 22 12.0322C22 12.5845 21.5523 13.0322 21 13.0322H3C2.44772 13.0322 2 12.5845 2 12.0322Z" fill="currentColor"></path>
                            <path d="M3 17.0645C2.44772 17.0645 2 17.5122 2 18.0645C2 18.6167 2.44772 19.0645 3 19.0645H21C21.5523 19.0645 22 18.6167 22 18.0645C22 17.5122 21.5523 17.0645 21 17.0645H3Z" fill="currentColor"></path>
                        </svg></button>

<?php
// Check if the user is logged in
if (isset($_SESSION['username'])) {
  // User is logged in
  $username = $_SESSION['username'];
  echo "<p><br><label style='color: var(--bs-border-color);font-family: Bebas Neue, serif;font-size: 30px;'>HELLO <span class='dropdown-trigger'>$username!</span></label></p>";
} else {
  // User is not logged in
  echo "<p><br><label style='color: var(--bs-border-color);font-family: Bebas Neue, serif;font-size: 30px;'>HELLO Guest!</label></p>";
}

// Logout functionality
if (isset($_POST['logout'])) {
  session_unset(); // Unset all session variables
  session_destroy(); // Destroy the session
  header("Location: start.php"); // Redirect the user to the homepage
  exit;
}
?>

<!-- Dropdown Menu -->
<div class="dropdown">
  <ul class="dropdown-menu">
    <?php if (isset($_SESSION['username'])) : ?>
        
        <a class="btn btn-primary" role="button" style="border: 1px white;color: black; background: white;border-radius: 20px;font-family: 'Bebas Neue', serif;font-size: 23px;" href="editprofile.php">Edit Profile</a>
    
      <li>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                            <button href="index.php" class="btn btn-light submit-button" type="submit" name="logout" value="Logout" style="background: white;border-radius: 20px;font-family: 'Bebas Neue', serif;font-size: 23px;">LOGOUT</button>
                         </form>
                        </li>
    <?php endif; ?>
  </ul>
</div>

<!-- Script to handle dropdown functionality -->
<script>
  var dropdownTrigger = document.querySelector('.dropdown-trigger');
  var dropdownMenu = document.querySelector('.dropdown-menu');

  dropdownTrigger.addEventListener('click', function() {
    dropdownMenu.classList.toggle('show');
  });

  window.addEventListener('click', function(event) {
    if (!dropdownTrigger.contains(event.target)) {
      dropdownMenu.classList.remove('show');
    }
  });
</script>


                    <div class="collapse navbar-collapse d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-md-end justify-content-lg-end justify-content-xl-end justify-content-xxl-end" id="navcol-1">
                        <div style="width: 109px;"></div>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="registration.php" style="font-size: 21PX;font-family: 'Bebas Neue', serif;">Register</a></li>
                            <li class="nav-item"><a class="nav-link" href="login.php" style="font-size: 21PX;font-family: 'Bebas Neue', serif;">Log In</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="carousel slide" data-bs-ride="carousel" id="carousel-1" style="height: 625px;">
                <div class="carousel-inner h-100">
                    <div class="carousel-item active h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/8322540.jpg" alt="Slide Image" style="z-index: -1;">
                        <div class="container d-flex flex-column justify-content-center h-100">
                            <div class="row">
                                <div class="col-md-6 col-xl-4 col-xxl-5 offset-md-2 d-xxl-flex justify-content-xxl-start align-items-xxl-center">
                                    <div class="d-flex flex-column justify-content-center align-items-start" style="max-width: 350px;"><img src="assets/img/logo-stray.png" style="width: 30vw;">
                                        <div style="height: 52px;"></div><a class="btn btn-primary btn-lg d-flex d-xxl-flex align-items-center align-items-xxl-center me-2" role="button" href="#" style="background: var(--bs-black);width: 238px;border-style: none;border-color: var(--bs-border-color-translucent);"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-8 0 512 512" width="1em" height="1em" fill="currentColor" style="font-size: 44px;">
                                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                <path d="M496 256c0 137-111.2 248-248.4 248-113.8 0-209.6-76.3-239-180.4l95.2 39.3c6.4 32.1 34.9 56.4 68.9 56.4 39.2 0 71.9-32.4 70.2-73.5l84.5-60.2c52.1 1.3 95.8-40.9 95.8-93.5 0-51.6-42-93.5-93.7-93.5s-93.7 42-93.7 93.5v1.2L176.6 279c-15.5-.9-30.7 3.4-43.5 12.1L0 236.1C10.2 108.4 117.1 8 247.6 8 384.8 8 496 119 496 256zM155.7 384.3l-30.5-12.6a52.79 52.79 0 0 0 27.2 25.8c26.9 11.2 57.8-1.6 69-28.4 5.4-13 5.5-27.3.1-40.3-5.4-13-15.5-23.2-28.5-28.6-12.9-5.4-26.7-5.2-38.9-.6l31.5 13c19.8 8.2 29.2 30.9 20.9 50.7-8.3 19.9-31 29.2-50.8 21zm173.8-129.9c-34.4 0-62.4-28-62.4-62.3s28-62.3 62.4-62.3 62.4 28 62.4 62.3-27.9 62.3-62.4 62.3zm.1-15.6c25.9 0 46.9-21 46.9-46.8 0-25.9-21-46.8-46.9-46.8s-46.9 21-46.9 46.8c.1 25.8 21.1 46.8 46.9 46.8z"></path>
                                            </svg><span style="font-family: 'Bebas Neue', serif;font-size: 29px;">&nbsp;DOWNLOAD NOW</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/1236775.jpg" alt="Slide Image" style="z-index: -1;">
                        <div class="container d-flex flex-column justify-content-center h-100">
                            <div class="row">
                                <div class="col-md-6 col-xl-4 col-xxl-6 offset-md-2 d-xxl-flex justify-content-xxl-start">
                                    <div style="max-width: 350px;"><img src="assets/img/f1be3ad90345f56fd97fcf282a265902.png" width="546" height="293" style="width: 35vw;height: 19vw;">
                                        <div style="height: 52px;"></div><a class="btn btn-primary btn-lg d-flex d-xxl-flex align-items-center align-items-xxl-center me-2" role="button" href="#" style="border-color: rgba(0,0,0,0);background: var(--bs-black);width: 238px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-8 0 512 512" width="1em" height="1em" fill="currentColor" style="font-size: 44px;">
                                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                <path d="M496 256c0 137-111.2 248-248.4 248-113.8 0-209.6-76.3-239-180.4l95.2 39.3c6.4 32.1 34.9 56.4 68.9 56.4 39.2 0 71.9-32.4 70.2-73.5l84.5-60.2c52.1 1.3 95.8-40.9 95.8-93.5 0-51.6-42-93.5-93.7-93.5s-93.7 42-93.7 93.5v1.2L176.6 279c-15.5-.9-30.7 3.4-43.5 12.1L0 236.1C10.2 108.4 117.1 8 247.6 8 384.8 8 496 119 496 256zM155.7 384.3l-30.5-12.6a52.79 52.79 0 0 0 27.2 25.8c26.9 11.2 57.8-1.6 69-28.4 5.4-13 5.5-27.3.1-40.3-5.4-13-15.5-23.2-28.5-28.6-12.9-5.4-26.7-5.2-38.9-.6l31.5 13c19.8 8.2 29.2 30.9 20.9 50.7-8.3 19.9-31 29.2-50.8 21zm173.8-129.9c-34.4 0-62.4-28-62.4-62.3s28-62.3 62.4-62.3 62.4 28 62.4 62.3-27.9 62.3-62.4 62.3zm.1-15.6c25.9 0 46.9-21 46.9-46.8 0-25.9-21-46.8-46.9-46.8s-46.9 21-46.9 46.8c.1 25.8 21.1 46.8 46.9 46.8z"></path>
                                            </svg><span style="font-family: 'Bebas Neue', serif;font-size: 29px;">&nbsp;DOWNLOAD NOW</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/1123842.jpg" alt="Slide Image" style="z-index: -1;">
                        <div class="container d-flex flex-column justify-content-center h-100">
                            <div class="row">
                                <div class="col-md-6 col-xl-4 offset-md-2">
                                    <div style="max-width: 350px;"><img src="assets/img/eldenring_new.png" style="width: 50vw;height: 19vw;"><a class="btn btn-primary btn-lg d-flex d-xxl-flex align-items-center align-items-xxl-center From Center" role="button" href="#" style="border-color: rgba(0,0,0,0);background: var(--bs-black);width: 238px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-8 0 512 512" width="1em" height="1em" fill="currentColor" style="font-size: 44px;">
                                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                <path d="M496 256c0 137-111.2 248-248.4 248-113.8 0-209.6-76.3-239-180.4l95.2 39.3c6.4 32.1 34.9 56.4 68.9 56.4 39.2 0 71.9-32.4 70.2-73.5l84.5-60.2c52.1 1.3 95.8-40.9 95.8-93.5 0-51.6-42-93.5-93.7-93.5s-93.7 42-93.7 93.5v1.2L176.6 279c-15.5-.9-30.7 3.4-43.5 12.1L0 236.1C10.2 108.4 117.1 8 247.6 8 384.8 8 496 119 496 256zM155.7 384.3l-30.5-12.6a52.79 52.79 0 0 0 27.2 25.8c26.9 11.2 57.8-1.6 69-28.4 5.4-13 5.5-27.3.1-40.3-5.4-13-15.5-23.2-28.5-28.6-12.9-5.4-26.7-5.2-38.9-.6l31.5 13c19.8 8.2 29.2 30.9 20.9 50.7-8.3 19.9-31 29.2-50.8 21zm173.8-129.9c-34.4 0-62.4-28-62.4-62.3s28-62.3 62.4-62.3 62.4 28 62.4 62.3-27.9 62.3-62.4 62.3zm.1-15.6c25.9 0 46.9-21 46.9-46.8 0-25.9-21-46.8-46.9-46.8s-46.9 21-46.9 46.8c.1 25.8 21.1 46.8 46.9 46.8z"></path>
                                            </svg><span style="font-family: 'Bebas Neue', serif;font-size: 29px;">&nbsp;DOWNLOAD NOW</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="background: rgba(255,255,255,0);"><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev" style="background: rgba(255,255,255,0);"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next" style="background: rgba(255,255,255,0);"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
                </ol>
            </div>
        </header>
        <main style="background: linear-gradient(-3deg, #081422, #2d1f55);">
            <div class="d-flex d-xl-flex justify-content-center align-items-end justify-content-xl-center align-items-xl-end" style="height: 117px;">
                <hr class="d-xl-flex align-items-xl-end" style="border-color: var(--bs-gray-100);width: 83vw;">
            </div>
            <div class="container">
                <h1 class="d-flex d-sm-flex flex-row-reverse justify-content-end justify-content-sm-end justify-content-md-end justify-content-lg-end justify-content-xl-end justify-content-xxl-end" style="color: #ded8d8;font-family: 'Bebas Neue', serif;font-size: 47px;">game spotlight</h1>
            </div>
            <section class="flex-column py-4 py-xl-5" style="height: 536px;">
                <div class="container flex-row-reverse">
                    <div class="bg-dark border rounded border-0 border-dark overflow-hidden">
                        <div class="row g-0 flex-row-reverse">
                            <div class="col-md-6 flex-row-reverse" style="font-size: 27px;">
                                <div class="text-white flex-column-reverse p-4 p-md-5" style="background: linear-gradient(#1b3048, #37295e);">
                                    <h2 class="fw-bold text-white mb-3" style="font-size: 5VW;text-align: center;font-family: Antonio, sans-serif;">ELDEN RING</h2>
                                    <p class="mb-4" style="font-family: 'Albert Sans', sans-serif;text-align: center;font-size: 2VW;">BANDAI NAMCO/FROMSOFTWARE</p>
                                    <hr>
                                    <h1 style="font-family: 'Bebas Neue', serif;font-size: 5VW;text-align: center;">GAME OF THE YEAR WINNER</h1>
                                </div>
                            </div>
                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;"><img class="w-100 h-100 fit-cover" src="assets/img/394636-elden-ring-game-poster-4k-pc-wallpaper.jpg"></div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <main style="background: linear-gradient(#081422, #2d1f55);">
            <div class="d-flex d-xl-flex justify-content-center align-items-end justify-content-xl-center align-items-xl-end" style="height: 117px;">
                <hr class="d-xl-flex align-items-xl-end" style="border-color: var(--bs-gray-100);width: 83vw;">
            </div>
            <div class="container" style="width: 100%;height: 100%;">
                <h1 style="color: #ded8d8;font-family: 'Bebas Neue', serif;font-size: 47px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none" style="color: var(--bs-danger);font-size: 49px;">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3945 2.55279C12.2662 2.29624 12.034 2.10713 11.7568 2.03351C11.4795 1.95988 11.184 2.00885 10.9454 2.16795C10.5995 2.39858 10.3314 2.72608 10.1229 3.04791C9.90855 3.37854 9.71986 3.76148 9.553 4.16366C9.21939 4.96773 8.93911 5.93195 8.71375 6.89778C8.42752 8.12448 8.21568 9.41687 8.10004 10.4776C7.61585 10.1512 7.33491 9.78527 7.15481 9.41104C6.82729 8.73046 6.75736 7.8772 6.75736 6.75739C6.75736 6.35292 6.51372 5.98829 6.14004 5.83351C5.76637 5.67872 5.33625 5.76428 5.05025 6.05028C3.68361 7.41692 3 9.21013 3 11C3 12.7899 3.68361 14.5831 5.05025 15.9498C7.78392 18.6834 12.2161 18.6834 14.9497 15.9498C16.3164 14.5831 17 12.7899 17 11C17 9.21013 16.3164 7.41692 14.9497 6.05028C14.3584 5.45889 13.9696 5.06453 13.6021 4.5828C13.239 4.10688 12.8781 3.51991 12.3945 2.55279ZM12.1213 15.1213C10.9497 16.2929 9.05025 16.2929 7.87868 15.1213C7.29289 14.5355 7 13.7678 7 13C7 13 7.87868 13.5 9.50005 13.5C9.50005 12.5 10 9.5 10.75 9C11.25 10 11.5355 10.2929 12.1213 10.8787C12.7071 11.4645 13 12.2322 13 13C13 13.7678 12.7071 14.5355 12.1213 15.1213Z" fill="currentColor"></path>
                    </svg>popular games</h1>
            </div>
            <div class="container py-4 py-xl-5">
                <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3 d-md-flex d-lg-flex justify-content-md-center justify-content-lg-center">
                    <div class="col">
                        <div class="card" style="background: rgba(255,255,255,0);">
                            <div class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex flex-column align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center justify-content-xxl-center align-items-xxl-center p-4" style="background: linear-gradient(#1b3048, #37295e);border-radius: 26px;"><img class="fit-cover" style="height: 352px;background: rgba(255,255,255,0);width: 281px;" src="assets/img/-cx9xxjhpkdw.jpg" width="351" height="352">
                                <h4 class="card-title" style="color: rgb(244,244,244);font-family: 'Bebas Neue', serif;font-size: 46px;">CULT OF THE LAMB</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="background: rgba(255,255,255,0);">
                            <div class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex flex-column align-items-center justify-content-sm-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center justify-content-xxl-center align-items-xxl-center p-4" style="background: linear-gradient(#1b3048, #37295e);border-radius: 26px;height: 463.2px;"><img class="d-sm-flex justify-content-sm-center align-items-sm-center fit-cover" style="height: 352px;background: rgba(255,255,255,0);width: 281px;" src="assets/img/6110RSDn3PL.jpg" width="387" height="352">
                                <h4 class="text-center card-title" style="color: rgb(244,244,244);font-family: 'Bebas Neue', serif;font-size: 46px;">elden ring&nbsp;</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="background: rgba(255,255,255,0);">
                            <div class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex flex-column align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center justify-content-xxl-center align-items-xxl-center p-4" style="background: linear-gradient(#1b3048, #37295e);border-radius: 26px;"><img class="fit-cover" style="height: 352PX;background: rgba(255,255,255,0);width: 281px;" src="assets/img/god_of_war_ragnarok_kratos_poster_by_akithefull_dfkt0my-fullview.jpg" width="384" height="385">
                                <h4 class="text-center d-flex justify-content-center card-title" style="color: rgb(244,244,244);font-family: 'Bebas Neue', serif;font-size: 43px;">god of war ragnarok</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <main style="background: linear-gradient(-3deg, #081422, #2d1f55);">
            <div class="d-flex d-xl-flex justify-content-center align-items-end justify-content-xl-center align-items-xl-end" style="height: 117px;">
                <hr class="d-xl-flex align-items-xl-end" style="border-color: var(--bs-gray-100);width: 83vw;">
            </div>
            <div class="container" style="width: 100%;height: 100%;">
                <h1 style="color: #ded8d8;font-family: 'Bebas Neue', serif;font-size: 47px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color: var(--bs-danger);font-size: 49px;">
                        <path d="M15.4695 11.2929C15.0789 10.9024 14.4458 10.9024 14.0553 11.2929C13.6647 11.6834 13.6647 12.3166 14.0553 12.7071C14.4458 13.0976 15.0789 13.0976 15.4695 12.7071C15.86 12.3166 15.86 11.6834 15.4695 11.2929Z" fill="currentColor"></path>
                        <path d="M16.1766 9.17156C16.5671 8.78103 17.2003 8.78103 17.5908 9.17156C17.9813 9.56208 17.9813 10.1952 17.5908 10.5858C17.2003 10.9763 16.5671 10.9763 16.1766 10.5858C15.7861 10.1952 15.7861 9.56208 16.1766 9.17156Z" fill="currentColor"></path>
                        <path d="M19.7121 11.2929C19.3216 10.9024 18.6885 10.9024 18.2979 11.2929C17.9074 11.6834 17.9074 12.3166 18.2979 12.7071C18.6885 13.0976 19.3216 13.0976 19.7121 12.7071C20.1027 12.3166 20.1027 11.6834 19.7121 11.2929Z" fill="currentColor"></path>
                        <path d="M16.1766 13.4142C16.5671 13.0237 17.2003 13.0237 17.5908 13.4142C17.9813 13.8048 17.9813 14.4379 17.5908 14.8284C17.2003 15.219 16.5671 15.219 16.1766 14.8284C15.7861 14.4379 15.7861 13.8048 16.1766 13.4142Z" fill="currentColor"></path>
                        <path d="M6 13H4V11H6V9H8V11H10V13H8V15H6V13Z" fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 5C3.13401 5 0 8.13401 0 12C0 15.866 3.13401 19 7 19H17C20.866 19 24 15.866 24 12C24 8.13401 20.866 5 17 5H7ZM17 7H7C4.23858 7 2 9.23858 2 12C2 14.7614 4.23858 17 7 17H17C19.7614 17 22 14.7614 22 12C22 9.23858 19.7614 7 17 7Z" fill="currentColor"></path>
                    </svg>&nbsp;indie game picks</h1>
            </div>
            <div class="container py-4 py-xl-5">
                <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3 d-md-flex d-lg-flex justify-content-md-center justify-content-lg-center">
                    <div class="col">
                        <div class="card" style="background: rgba(255,255,255,0);">
                            <div class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex flex-column align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center justify-content-xxl-center align-items-xxl-center p-4" style="background: linear-gradient(#1b3048, #37295e);border-radius: 26px;"><img class="fit-cover" style="height: 352px;background: rgba(255,255,255,0);width: 281px;" src="assets/img/MV5BZWVmYmE0MGYtMzYwNi00ZDBhLTllZjctMjc5ODU5MjkxNzM3XkEyXkFqcGdeQXVyNTgyNTA4MjM@._V1_FMjpg_UX1000_.jpg" width="351" height="352">
                                <h4 class="card-title" style="color: rgb(244,244,244);font-family: 'Bebas Neue', serif;font-size: 46px;">stray</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="background: rgba(255,255,255,0);">
                            <div class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex flex-column align-items-center justify-content-sm-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center justify-content-xxl-center align-items-xxl-center p-4" style="background: linear-gradient(#1b3048, #37295e);border-radius: 26px;height: 463.2px;"><img class="d-sm-flex justify-content-sm-center align-items-sm-center fit-cover" style="height: 352px;background: rgba(255,255,255,0);width: 281px;" src="assets/img/download-inscryption-offer-yiwav.jpg" width="387" height="352">
                                <h4 class="text-center card-title" style="color: rgb(244,244,244);font-family: 'Bebas Neue', serif;font-size: 46px;">inscryption</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="background: rgba(255,255,255,0);">
                            <div class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex flex-column align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center justify-content-xxl-center align-items-xxl-center p-4" style="background: linear-gradient(#1b3048, #37295e);border-radius: 26px;"><img class="fit-cover" style="height: 352PX;background: rgba(255,255,255,0);width: 281px;" src="assets/img/61VrzWU4OrL._AC_UF894,1000_QL80_.jpg" width="384" height="385">
                                <h4 class="text-center d-flex justify-content-center card-title" style="color: rgb(244,244,244);font-family: 'Bebas Neue', serif;font-size: 43px;">the stanley parable</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <main style="background: linear-gradient(-177deg, #081422, #2d1f55);">
            <div class="d-flex d-xl-flex justify-content-center align-items-end justify-content-xl-center align-items-xl-end" style="height: 117px;">
                <hr class="d-xl-flex align-items-xl-end" style="border-color: var(--bs-gray-100);width: 83vw;">
            </div>
            <div class="container" style="width: 100%;height: 100%;">
                <h1 style="color: #ded8d8;font-family: 'Bebas Neue', serif;font-size: 47px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color: var(--bs-danger);font-size: 49px;">
                        <path d="M15.4695 11.2929C15.0789 10.9024 14.4458 10.9024 14.0553 11.2929C13.6647 11.6834 13.6647 12.3166 14.0553 12.7071C14.4458 13.0976 15.0789 13.0976 15.4695 12.7071C15.86 12.3166 15.86 11.6834 15.4695 11.2929Z" fill="currentColor"></path>
                        <path d="M16.1766 9.17156C16.5671 8.78103 17.2003 8.78103 17.5908 9.17156C17.9813 9.56208 17.9813 10.1952 17.5908 10.5858C17.2003 10.9763 16.5671 10.9763 16.1766 10.5858C15.7861 10.1952 15.7861 9.56208 16.1766 9.17156Z" fill="currentColor"></path>
                        <path d="M19.7121 11.2929C19.3216 10.9024 18.6885 10.9024 18.2979 11.2929C17.9074 11.6834 17.9074 12.3166 18.2979 12.7071C18.6885 13.0976 19.3216 13.0976 19.7121 12.7071C20.1027 12.3166 20.1027 11.6834 19.7121 11.2929Z" fill="currentColor"></path>
                        <path d="M16.1766 13.4142C16.5671 13.0237 17.2003 13.0237 17.5908 13.4142C17.9813 13.8048 17.9813 14.4379 17.5908 14.8284C17.2003 15.219 16.5671 15.219 16.1766 14.8284C15.7861 14.4379 15.7861 13.8048 16.1766 13.4142Z" fill="currentColor"></path>
                        <path d="M6 13H4V11H6V9H8V11H10V13H8V15H6V13Z" fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 5C3.13401 5 0 8.13401 0 12C0 15.866 3.13401 19 7 19H17C20.866 19 24 15.866 24 12C24 8.13401 20.866 5 17 5H7ZM17 7H7C4.23858 7 2 9.23858 2 12C2 14.7614 4.23858 17 7 17H17C19.7614 17 22 14.7614 22 12C22 9.23858 19.7614 7 17 7Z" fill="currentColor"></path>
                    </svg>&nbsp;horror games</h1>
            </div>
            <div class="container py-4 py-xl-5">
                <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3 d-md-flex d-lg-flex justify-content-md-center justify-content-lg-center">
                    <div class="col">
                        <div class="card" style="background: rgba(255,255,255,0);">
                            <div class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex flex-column align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center justify-content-xxl-center align-items-xxl-center p-4" style="background: linear-gradient(#1b3048, #37295e);border-radius: 26px;"><img class="fit-cover" style="height: 352px;background: rgba(255,255,255,0);width: 281px;" src="assets/img/faith-unholy-trinity.jpg" width="351" height="352">
                                <h4 class="card-title" style="color: rgb(244,244,244);font-family: 'Bebas Neue', serif;font-size: 46px;">FAITH SERIES</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="background: rgba(255,255,255,0);">
                            <div class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex flex-column align-items-center justify-content-sm-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center justify-content-xxl-center align-items-xxl-center p-4" style="background: linear-gradient(#1b3048, #37295e);border-radius: 26px;height: 463.2px;"><img class="d-sm-flex justify-content-sm-center align-items-sm-center fit-cover" style="height: 352px;background: rgba(255,255,255,0);width: 281px;" src="assets/img/World-of-Horror.jpg" width="387" height="352">
                                <h4 class="text-center card-title" style="color: rgb(244,244,244);font-family: 'Bebas Neue', serif;font-size: 46px;">inscryption</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="background: rgba(255,255,255,0);">
                            <div class="card-body d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex flex-column align-items-center align-items-sm-center align-items-md-center align-items-lg-center align-items-xl-center justify-content-xxl-center align-items-xxl-center p-4" style="background: linear-gradient(#1b3048, #37295e);border-radius: 26px;"><img class="fit-cover" style="height: 352PX;background: rgba(255,255,255,0);width: 281px;" src="assets/img/4361382dd4e1d9b5408cb5f9d1e98659_7c9a05c7d13d7d93dbf2b0ba6ea392ff.jpg" width="384" height="385">
                                <h4 class="text-center d-flex justify-content-center card-title" style="color: rgb(244,244,244);font-family: 'Bebas Neue', serif;font-size: 43px;">DARKWOOD</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="text-center" style="background: linear-gradient(5deg, #081422, #2d1f55 46%);">
            <div class="container text-muted py-4 py-lg-5">
                <p class="mb-0">Charlotte G. Taboada BSCS-2 F2</p>
            </div>
        </footer>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/aos.min.js"></script>
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