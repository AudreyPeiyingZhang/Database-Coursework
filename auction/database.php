<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
 $connection = mysqli_connect('localhost', 'project', 'project', 'project')
  or die('Error connecting to MySQL server: ' . mysqli_connect_error());
?>