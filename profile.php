<?php
//connect database
$dbConnection = mysqli_connect('localhost', 'root', '', 'user');

if (empty($_COOKIE['id'])) {
    header("location: loginForm.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card</title>
    <link rel="stylesheet" href="profile_style.css">
    <link rel="stylesheet"  href="fontawesome-free-5.15.4-web/css/all.css">
</head>
<body>
        <div class="container">
            <div class="up">
                <div class="pic">
                    <img src="<?php echo $_COOKIE['img'] ?>"alt="">
                </div>
                <div class="name"><?php echo $_COOKIE['userName'] ?></div>
                <div class="jop"><?php echo $_COOKIE['jopTitle'] ?></div>
                <div class="social">
                    <a href="#"><i class="fab fa-facebook-f "></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
                <a href="logout.php" class="btn">LOGOUT</a>
                <?php if($_COOKIE['role'] == 1): ?>
                <a href="dashboard.php" class="btn">Dashborad</a>
                <?php elseif($_COOKIE['role'] == 0): ?>
                <a href="userUpdate.php?id=<?=$_COOKIE['id'];?>" class="btn">Update</a>
                <?php endif; ?>
            </div>
            <div class="down">
                <div class="numbers">
                    <div class="item">
                        <span>120</span>
                        Posts
                    </div>
                    <div class="border"></div>

                    <div class="item">
                        <span>127</span>
                        Following
                    </div>
                    <div class="border"></div>

                    <div class="item">
                        <span>120K</span>
                        Followers
                    </div>
                    <div class="border"></div>
                </div>
            </div>
            </div>
</body>
</html>