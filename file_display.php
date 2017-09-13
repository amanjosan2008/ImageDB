<?php
 include "file_constants.php";
 // just so we know it is broken
 error_reporting(E_ALL);
 // some basic sanity checks
 if(isset($_GET['id']) && is_numeric($_GET['id'])) {
     //connect to the db
     $link = mysqli_connect("$host", "$user", "$pass")
     or die("Could not connect: " . mysqli_error());

     // select our database
     $con = mysqli_connect($host, $user, $pass);
     mysqli_select_db($con, "$db") or die(mysqli_error());

     // get the image from the db
     $sql = "SELECT image FROM test_image WHERE id=" .$_GET['id'] . ";";

     // the result of the query
     $result = mysqli_query($con, "$sql") or die("Invalid query: " . mysqli_error());

     // set the header for the image
     header("Content-type: image/jpeg");
     $row = mysqli_fetch_assoc($result);
     echo $row['image'];

     // close the db link
     mysqli_close($link);
 }
 else {
     echo 'Please use a real id number';
 }
?>
