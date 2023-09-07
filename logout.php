<?php



    setcookie("id","", time() - 3600*24*30, "/", "localhost");
    setcookie("userName","", time() - 3600*24*30, "/", "localhost");
    setcookie("img","", time() - 3600*24*30, "/", "localhost");
    setcookie("role","", time() - 3600*24*30, "/", "localhost");
    setcookie("msg","", time() - 3600*24*30, "/", "localhost");

    header("location: loginForm.php");