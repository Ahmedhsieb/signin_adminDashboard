<?php

//to get the user name and password
$userName = $_POST['userName'];
$userPass = $_POST['password'];
$jopTitle = $_POST['title'];

//to get the temp location for upload the file 
$tmp = $_FILES['file']['tmp_name'];

//to get the extention of the file
$type = $_FILES['file']['type'];
$ext = explode("/",$type);
$ext = end($ext);

//to get the user name from the form and concat it with the file extention
$file_name = $_POST['userName'].'.'.$ext;

setcookie("file_name", "$file_name", time() + 3600*24*30, "/", "localhost");

//to upload the file to our folder
move_uploaded_file($tmp, "uploaded_imge/{$file_name}");

//connect the database
$dbConnection = mysqli_connect("localhost", "root", "", "user");

//insert into the db
mysqli_query($dbConnection, "INSERT INTO `user_info` (`user_name`, `user_pass`, `jop_title`, `img_location`) VALUES('$userName', '$userPass', '$jopTitle', 'uploaded_imge/$file_name')");
header('location: loginForm.php');



