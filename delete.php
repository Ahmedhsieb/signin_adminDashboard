<?php


$id =  $_GET['id'];

$connection =  mysqli_connect("localhost","root","","user");
$query = mysqli_query($connection,"DELETE FROM `user_info` WHERE `id` = $id ");

if(mysqli_affected_rows($connection) >0){
    // sleep(5);
    $file_name = glob("uploaded_image"."/*".$_COOKIE['file_name']);
    unlink("$file_name");
    
    header("location: dashboard.php");
}else{
    echo "user not deleted";
}