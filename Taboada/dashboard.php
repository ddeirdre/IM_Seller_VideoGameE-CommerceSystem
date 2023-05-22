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

// Step 2: Retrieve and validate updated profile information
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $username = $_POST["username"];
}

// Step 3: Update seller record
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $sellerId = $_POST['seller_id'];
        $firstName = $_POST['first_name'];
        $middleName = $_POST['middle_name'];
        $lastName = $_POST['last_name'];
        $age = $_POST['age'];

        // Update the record in the database
        $sql = "UPDATE tblseller SET FirstName='$firstName', MiddleName='$middleName', LastName='$lastName', Age='$age' WHERE Seller_ID=$sellerId";
        if ($conn->query($sql) === TRUE) {
            // Success
            echo "Record updated successfully";
        } else {
            // Error
            echo "Error updating record: " . $conn->error;
        }
    }
}
// Step 4: Retrieve total number of Sellers
$totalSellers = 0;
$result = $conn->query("SELECT COUNT(*) AS total FROM tblseller");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalSellers = $row['total'];
}
// Step 5: Retrieve customer information for graphs
$ageData = array();
$result = $conn->query("SELECT age FROM tblseller");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Age data
        $age = $row['age'];
        if (isset($ageData[$age])) {
            $ageData[$age]++;
        } else {
            $ageData[$age] = 1;
        }
    }
}

// Filter age data for less than 18 and greater than or equal to 18
$ageDataLessThan17 = array();
$ageData18AndAbove = array();
$result = $conn->query("SELECT age FROM tblseller");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Age data
        $age = $row['age'];
        if ($age < 17) {
            if (isset($ageDataLessThan17[$age])) {
                $ageDataLessThan17[$age]++;
            } else {
                $ageDataLessThan17[$age] = 1;
            }
        } else {
            if (isset($ageData18AndAbove[$age])) {
                $ageData18AndAbove[$age]++;
            } else {
                $ageData18AndAbove[$age] = 1;
            }
        }
    }
}

// handle logout
if (isset($_GET["logout"])) {
    // destroy session and redirect to login page
    session_unset();
    session_destroy();
    header("Location: start.php");
    exit();
}

// Step 4: Close the database connection
$conn->close();
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
    <link rel="stylesheet" href="assets/css/Product-Carousel-V11-styles.css">
    <link rel="stylesheet" href="assets/css/Product-Carousel-V11.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product-swiper.min.css">
    <link rel="stylesheet" href="assets/css/Swiper-Slider-Card-For-Blog-Or-Product-untitled.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <!-- Include other CSS stylesheets -->
</head>

<body style="background: rgb(45, 31, 85);">
    <!-- Your HTML code here -->
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
                            viewBox="0 0 24 24" fill="none" style="font-size: 27px;color: var(--bs-black-50);">
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


            <div class="container">
                <div style="height: 953.094px;max-height: 100%;">
                    <h1 class="text-center"
                        style="font-family: 'Bebas Neue', serif;color: var(--bs-body-bg);font-size: 68px;">VIDEO GAME
                        E-COMMERCE SYSTEM</h1>
                    <p
                        style="font-family: Archivo, sans-serif;font-size: 21px;color: var(--bs-gray-500);text-align: center;">
                        List of Seller Registered</p>
                    <div>

                        <?php
                        $mysqli = new mysqli('localhost', 'root', '', 'dbf2taboada') or die(mysqli_error($mysqli));
                        $resultset = $mysqli->query("SELECT * from tblseller") or die($mysqli->error);
                        ?>
                        <div class="table-responsive text-center" style="color: rgb(255, 255, 255);">
                            <table class="table table-striped-columns table-bordered">
                                <thead style="color:rgb(255, 255, 255)">
                                    <tr>
                                        <th>Seller ID</th>
                                        <th style="color:rgb(255, 255, 255)">First Name</th>
                                        <th>Middle Name</th>
                                        <th style="color:rgb(255, 255, 255)">Last Name</th>
                                        <th>Age</th>
                                        <th style="color:rgb(255, 255, 255)">Actions</th>
                                    </tr>
                                </thead>
                                <tbody style="color:rgb(255, 255, 255)">
                                    <?php
                                    $resultset = $mysqli->query("SELECT * from tblseller") or die($mysqli->error);
                                    while ($row = $resultset->fetch_assoc()):
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['Seller_ID'] ?>
                                            </td>
                                            <td style="color:rgb(255, 255, 255)">
                                                <?php echo $row['FirstName'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['MiddleName'] ?>
                                            </td>
                                            <td style="color:rgb(255, 255, 255)">
                                                <?php echo $row['LastName'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['Age'] ?>
                                            </td>
                                            <td>
                                                <a href="update_record.php?id=<?php echo $row['Seller_ID']; ?>">Edit</a>
                                                <a href="delete_record.php?id=<?php echo $row['Seller_ID']; ?>"
                                                    onclick="return confirm('Are you sure you want to delete this Seller?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div> <a class="btn btn-primary" role="button"
                            style="background: rgb(80, 59, 140); border-color: rgba(255, 255, 255, 0);"
                            href="add_new_record.php">Add New Seller</a>
                        <div class="row">
                            <div class="col-md-4">
                                <br>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Number of Sellers</h5>
                                        <h2 class="card-text">
                                            <?php echo $totalSellers; ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Display graphs -->
                        <div class="row">
                            <div class="col-md-4">
                                <br>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Sellers Age Less Than 17</h5>
                                        <div id="ageChartLessThan17"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <br>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Sellers Age 18 and Above</h5>
                                        <div id="ageChart18AndAbove"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <br>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Sellers Registered</h5>
                                        <div id="registeredChart"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <style>
                            .card {
                                background-color: rgba(80, 59, 140, 1);
                            }

                            .card-title,
                            .card-text {
                                color: white;
                            }

                            .apexcharts-legend-text,
                            .apexcharts-text.apexcharts-data-label,
                            .apexcharts-xaxis-label,
                            .apexcharts-yaxis-label {
                                fill: white !important;
                                color: white !important;
                            }
                        </style>

                        <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
                        <script>
                            // Chart for Sellers Age Less Than 17
                            var ageChartOptionsLessThan17 = {
                                chart: {
                                    type: 'bar',
                                    height: 350,
                                    background: 'transparent'
                                },
                                series: [{
                                    name: 'Seller',
                                    data: <?php echo json_encode(array_values($ageDataLessThan17)); ?>
                                }],
                                xaxis: {
                                    categories: <?php echo json_encode(array_keys($ageDataLessThan17)); ?>
                                }
                            };
                            var ageChartLessThan17 = new ApexCharts(document.querySelector("#ageChartLessThan17"), ageChartOptionsLessThan17);
                            ageChartLessThan17.render();

                            // Chart for Sellers Age 18 and Above
                            var ageChartOptions18AndAbove = {
                                chart: {
                                    type: 'bar',
                                    height: 350,
                                    background: 'transparent'
                                },
                                series: [{
                                    name: 'Seller',
                                    data: <?php echo json_encode(array_values($ageData18AndAbove)); ?>
                                }],
                                xaxis: {
                                    categories: <?php echo json_encode(array_keys($ageData18AndAbove)); ?>
                                }
                            };
                            var ageChart18AndAbove = new ApexCharts(document.querySelector("#ageChart18AndAbove"), ageChartOptions18AndAbove);
                            ageChart18AndAbove.render();

                            // Chart for Total Number of Sellers
                            var registeredChartOptions = {
                                chart: {
                                    type: 'donut',
                                    height: 350,
                                    background: 'transparent'
                                },
                                series: [<?php echo $totalSellers; ?>],
                                labels: ['Total Sellers']
                            };
                            var registeredChart = new ApexCharts(document.querySelector("#registeredChart"), registeredChartOptions);
                            registeredChart.render();
                        </script>

                    </div>
                </div>
            </div>
        </header>
        <footer class="text-center" style="background: linear-gradient(5deg, #081422, #2d1f55 46%);">
            <div class="container text-muted py-4 py-lg-5">
                <p class="mb-0">Charlotte Taboada BSCS-2 F2</p>
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