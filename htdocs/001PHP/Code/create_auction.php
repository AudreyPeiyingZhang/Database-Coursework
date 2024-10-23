<?php
    session_start();

    // connect db
    $con = mysqli_connect('localhost', 'root', '', 'Auction');

    // check db
    if (!$con) 
    {
        die("Database connection failed: " . mysqli_connect_error());
    }

    else
    {
        // set charactor code
        mysqli_query($con, "SET NAMES utf8");

        // get attributes
        $item_title = $_POST['Title'];
        $item_description = $_POST['Description'];
        $item_auction_start_time = date('Y-m-d H:i:s');
        $item_auction_end_time = $_POST['EndTime'];
        $item_auction_start_price = $_POST['StartPrice'];


        // get seller id from session
        $seller_id = $_SESSION['UserID'];

        // insert db
        $sql = "INSERT INTO auction (Title, Discription, StartTime, EndTime, StartPrice, SellerID) 
                VALUES ('$item_title', '$item_description', '$item_auction_start_time', '$item_auction_end_time', '$item_auction_start_price', '$seller_id')";

        if (mysqli_query($con, $sql)) 
        {
            echo "Auction created successfully!";
        } 
        else 
        {
            echo "Error: " . mysqli_error($con);
        }

    }

    
    // close db
    mysqli_close($con);

?>