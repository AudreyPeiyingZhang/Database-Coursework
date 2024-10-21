<?php

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
        $sql = "SELECT * FROM usersinfo WHERE UserName='$username' AND Password='$password'";
        $result = mysqli_query($con, $sql);

        // check if username and password match
        if (mysqli_num_rows($result) == 1) 
        {
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