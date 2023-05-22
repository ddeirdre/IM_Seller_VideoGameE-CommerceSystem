<?php
    $mysqli = new mysqli('localhost', 'root', '', 'dbf2taboada') or die(mysqli_error($mysqli));

    if(isset($_GET['id'])) {
        $Seller_ID = $_GET['id'];
        $mysqli->query("DELETE FROM tblseller WHERE Seller_ID = $Seller_ID") or die($mysqli->error);
        header("location: dashboard.php");
        exit(); // Add this line to stop executing the rest of the code after the redirect
    }
?>