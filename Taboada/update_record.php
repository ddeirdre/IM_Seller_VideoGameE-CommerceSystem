<?php
session_start();
// database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbf2taboada";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $username = $_POST["username"];
}

$mysqli = new mysqli('localhost', 'root', '', 'dbf2taboada') or die(mysqli_error($mysqli));

// Step 1: Retrieve seller ID from URL parameter
if (isset($_GET['id'])) {
    $sellerId = $_GET['id'];

    // Step 2: Retrieve and validate updated profile information
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form data
        $firstName = $_POST['first_name'];
        $middleName = $_POST['middle_name'];
        $lastName = $_POST['last_name'];
        $age = $_POST['age'];

        // Step 3: Update seller record
        $mysqli->query("UPDATE tblseller SET FirstName='$firstName', MiddleName='$middleName', LastName='$lastName', Age='$age' WHERE Seller_ID = $sellerId") or die($mysqli->error);

        // Step 4: Redirect to the dashboard after updating the record
        header("location: dashboard.php");
        exit(); // Add this line to stop executing the rest of the code after the redirect
    }

    // Step 5: Retrieve seller information for pre-filling the form
    $result = $mysqli->query("SELECT * FROM tblseller WHERE Seller_ID = $sellerId") or die($mysqli->error);
    $row = $result->fetch_assoc();

    // Step 6: Close the database connection
    $mysqli->close();
} else {
    // If no seller ID is provided, redirect to the dashboard
    header("location: dashboard.php");
    exit(); // Add this line to stop executing the rest of the code after the redirect
}
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Video Game E-Commerce</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alatsi&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Albert+Sans&amp;display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Anton&amp;subset=latin-ext,vietnamese&amp;display=swap">
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
            <nav class="navbar navbar-dark navbar-expand-md d-xl-flex justify-content-xl-center align-items-xl-center"
                id="app-navbar" style="background: rgba(0,0,0,0);">
                <div class="container-fluid"><a
                        class="navbar-brand d-flex d-xl-flex flex-row align-items-center justify-content-xl-center"
                        href="homepage.php" style="background: rgba(255,255,255,0);"><img class="glitch_img"
                            src="assets/img/HALIYA%20(7).png" width="64" height="60"></a><button
                        data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"
                        style="border-color: rgba(255,255,255,0);"><span class="visually-hidden">Toggle
                            navigation</span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            viewBox="0 0 24 24" fill="none" style="font-size: 27px;color: var(--bs-gray-100);">
                            <path
                                d="M2 6C2 5.44772 2.44772 5 3 5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H3C2.44772 7 2 6.55228 2 6Z"
                                fill="currentColor"></path>
                            <path
                                d="M2 12.0322C2 11.4799 2.44772 11.0322 3 11.0322H21C21.5523 11.0322 22 11.4799 22 12.0322C22 12.5845 21.5523 13.0322 21 13.0322H3C2.44772 13.0322 2 12.5845 2 12.0322Z"
                                fill="currentColor"></path>
                            <path
                                d="M3 17.0645C2.44772 17.0645 2 17.5122 2 18.0645C2 18.6167 2.44772 19.0645 3 19.0645H21C21.5523 19.0645 22 18.6167 22 18.0645C22 17.5122 21.5523 17.0645 21 17.0645H3Z"
                                fill="currentColor"></path>
                        </svg></button>
                    
                    <?php $username = $_SESSION['username'];
                    echo "<p><br><label style='color: var(--bs-border-color);font-family: Bebas Neue, serif;font-size: 30px;'>HELLO <span class='dropdown-trigger'>$username!</span></label></p>";

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
                            <?php if (isset($_SESSION['username'])): ?>
                                <a class="btn btn-primary" role="button"
                                    style="border: 1px white;color: black; background: white;border-radius: 20px;font-family: 'Bebas Neue', serif;font-size: 23px;"
                                    href="edit_profile.php">Edit Profile</a>

                                <li>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                                        <button href="homepage.php" class="btn btn-light submit-button" type="submit"
                                            name="logout" value="Logout"
                                            style="background: white;border-radius: 20px;font-family: 'Bebas Neue', serif;font-size: 23px;">LOGOUT</button>
                                    </form>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <script>
                        var dropdownTrigger = document.querySelector('.dropdown-trigger');
                        var dropdownMenu = document.querySelector('.dropdown-menu');

                        dropdownTrigger.addEventListener('click', function () {
                            dropdownMenu.classList.toggle('show');
                        });

                        window.addEventListener('click', function (event) {
                            if (!dropdownTrigger.contains(event.target)) {
                                dropdownMenu.classList.remove('show');
                            }
                        });
                    </script>

                    <div class="collapse navbar-collapse d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-md-end justify-content-lg-end justify-content-xl-end justify-content-xxl-end"
                        id="navcol-1">
                        <div style="width: 109px;"></div>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="taboada_aboutme.php"
                                    style="font-size: 21PX;font-family: 'Bebas Neue', serif;">About Me</a></li>
                            <li class="nav-item"><a class="nav-link" href="homepage.php"
                                    style="font-size: 21PX;font-family: 'Bebas Neue', serif;">Back</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div style="height: 37px;"></div>
            <div style="height: 953.094px;max-height: 100%;"> <!--1-->
                <h1 class="text-center" style="font-family: 'Bebas Neue', serif;color: var(--bs-body-bg);font-size: 58px;">Update Seller Record</h1>
                <div style="height: 55px;"></div>
                <div class="row update-form"> <!--2-->
                    <div class="col-md-8 offset-md-2">
                        <form method="POST" action="">
                            <div class="form-group">
                                <div><label
                                        style="color: var(--bs-border-color);font-family: 'Bebas Neue', serif;font-size: 21px;"
                                        for="first_name">First Name:</label></div>
                                <div><input type="text" name="first_name"
                                        style="background: #45377b;border-radius: 9px;color: rgb(255,255,255);"
                                        id="first_name" value=" <?php echo $row['FirstName']; ?>" required></div>
                            </div>
                            <div class="form-group">
                                <div><label
                                        style="color: var(--bs-border-color);font-family: 'Bebas Neue', serif;font-size: 21px;"
                                        for="middle_name">Middle Name:</label></div>
                                <div><input type="text" name="middle_name"
                                        style="background: #45377b;border-radius: 9px;color: rgb(255,255,255);"
                                        id="middle_name" value=" <?php echo $row['MiddleName']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div><label
                                        style="color: var(--bs-border-color);font-family: 'Bebas Neue', serif;font-size: 21px;"
                                        for="last_name">Last Name:</label></div>
                                <div><input type="text" name="last_name"
                                        style="background: #45377b;border-radius: 9px;color: rgb(255,255,255);"
                                        id="last_name" value=" <?php echo $row['LastName']; ?>" required></div>
                            </div>
                            <div class="form-group">
                                <div><label
                                        style="color: var(--bs-border-color);font-family: 'Bebas Neue', serif;font-size: 21px;"
                                        for="age">Age:</label></div>
                                <div><input type="text" name="age"
                                        style="background: #45377b;border-radius: 9px;color: rgb(255,255,255);" id="age"
                                        value=" <?php echo $row['Age']; ?>" required></div>
                            </div>
                            <br><button class="btn btn-primary" role="button"
                                style="background: rgb(80, 59, 140); border-color: rgba(255, 255, 255, 0);">Update
                                Record</button>
                        </form>
                        <div>
                        </div>
                    </div>
                </div>
        </header>
        <footer class="text-center" style="background: linear-gradient(5deg, #081422, #2d1f55 46%);">
            <div class="container text-muted py-4 py-lg-5">
                <p class="mb-0">Charlotte G. Taboada BSCS-2 F2</p>
            </div>
        </footer>
        <!-- Include necessary scripts -->
</body>

</html>