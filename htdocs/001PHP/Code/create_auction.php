<?php

// connect db
$con = mysqli_connect('localhost', 'root', '', 'users');

// check db
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// get attributes
$item_description = $_POST['description'];
$category = $_POST['category'];
$starting_price = $_POST['starting_price'];
$reserve_price = $_POST['reserve_price'];
$end_date = $_POST['end_date'];

// get user name
session_start();
$seller_username = $_SESSION['username'];

// insert db
$sql = "INSERT INTO auctions (seller_username, item_description, category, starting_price, reserve_price, end_date) 
        VALUES ('$seller_username', '$item_description', '$category', '$starting_price', '$reserve_price', '$end_date')";

if (mysqli_query($con, $sql)) {
    echo "Auction created successfully!";
} else {
    echo "Error: " . mysqli_error($con);
}

// close db
mysqli_close($con);

?>