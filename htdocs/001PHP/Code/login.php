<?php
    session_start();

    //connect db

    $con = mysqli_connect('localhost', 'root', '', 'users');

    // check db connection
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    else
    {
        // set charactor code
        mysqli_query($con, "SET NAMES utf8");

        // get from html
        $username = $_POST['UserName'];
        $password = $_POST['Password'];

        // search user info
        $sql = "SELECT * FROM users WHERE UserName='$username' AND Password='$password'";
        $result = mysqli_query($con, $sql);

        // check if username and password match
        if (mysqli_num_rows($result) == 1) 
        {
            $row = mysqli_fetch_assoc($result);
            // save userid to auction db
            $_SESSION['UserID'] = $row['UserID'];
            echo "Login successful, welcome $username";
        } 
        else 
        {
            echo "Username or Password Unvaild";
        }
    }



    // close db connection
    mysqli_close($con);


?>