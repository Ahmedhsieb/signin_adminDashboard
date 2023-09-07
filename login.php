<?php

$userName = $_POST['userName'];
$password = $_POST['password'];

$connection = mysqli_connect("localhost", "root", "", "user");

$query = mysqli_query($connection, "SELECT * FROM `user_info` WHERE `user_name` = '$userName' AND `user_pass` = '$password'");

if (mysqli_num_rows($query) >= 1) {
    $row = mysqli_fetch_assoc($query);
    setcookie("id",$row['id'], time() + 3600*24*30, "/", "localhost");
    setcookie("userName",$row['user_name'], time() + 3600*24*30, "/", "localhost");
    setcookie("jopTitle",$row['jop_title'], time() + 3600*24*30, "/", "localhost");
    setcookie("img",$row['img_location'], time() + 3600*24*30, "/", "localhost");
    setcookie("role",$row['role'], time() + 3600*24*30, "/", "localhost");
    sleep(1);
    header("location: profile.php");

}else{
    setcookie("msg", "invalid user name or password", time() + 3600*24*30, "/", "localhost");
    header("location: loginForm.php");
}

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index_style.css">

    <title>Project 4</title>
</head>
<body>
    <main>
        <section>
            <div class="leftside">
            <div class="text">
            <h1>New Here ?</h1>
            <h3>We will Be Happy If You Joining Us :)</h3>
            </div>
            <img src="index_img/undraw_Code_thinking_re_gka2.svg" alt="">
        </div>
        <form action="login.php" method="post">
            <h1>LogIn</h1>
            
            <input type="text" name="userName" placeholder="Username" class="user" style="padding-left: 20px;">
            
            <input type="password" name="password" placeholder="Password" class="pass" style="padding-left: 20px;">
            
            <input type="submit" value="LOGIN" class="log">
            
        </form>
        </section>
    </main>

</body>
</html> -->

