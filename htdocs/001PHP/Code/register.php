<?php
    session_start();

       // connect db
    $con = mysqli_connect('localhost', 'root', '', 'users');

    // check
    if (!$con) 
    {
        die("Failed to connect DB: " . mysqli_connect_error());
    }
    else
    {
        // set charactor code
        mysqli_query($con, "SET NAMES utf8");
    
        // get from html
        $username = $_POST['UserName'];
        $password = $_POST['Password'];
    
        // check if user already exit
        $check_user_sql = "SELECT * FROM users WHERE UserName='$username'";
        $check_user_result = mysqli_query($con, $check_user_sql);
        
        if (mysqli_num_rows($check_user_result) > 0) 
        {
            echo "User already exit, please choose other username";
        } 
        else 
        {
            // insert new data into db
            $sql = "INSERT INTO users (UserName, Password) VALUES ('$username', '$password')";
            $result = mysqli_query($con, $sql);
        
            if ($result) 
            {
                echo "Register successful！";
            } 
            else 
            {
                echo "Register failed:" . mysqli_error($con);
            }
        }
    }

    // close db connection
    mysqli_close($con);

?>

