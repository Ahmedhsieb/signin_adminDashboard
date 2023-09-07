<!DOCTYPE html>
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
            <?php if (!empty($_COOKIE['msg'])): ?>
            <p><?= $_COOKIE['msg']; ?></p>
            <?php endif; ?>
            <input type="text" name="userName" placeholder="Username" class="user" style="padding-left: 20px;">
            
            <input type="password" name="password" placeholder="Password" class="pass" style="padding-left: 20px;">
            
            <input type="submit" value="LOGIN" class="log">

            <p class="mt-3 mb-1">
        <a href="index.html">Sign up</a>
      </p>
        </form>
        </section>
    </main>
</body>
</html>
