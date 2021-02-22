<?php
include_once "DatabaseManager.php";
session_start();

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $user = getUser($_POST['email'], $_POST['password']);
    if (is_null($user)) {

        header('Location: SignUp.php');

    }else{
        if($user->ban==1){
            header('Location: Error.php?errorText=You are banned');
        }else{
            $_SESSION['userId'] = $user->id;
            header('Location: Cabinet.php');
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In </title>
</head>
<body>
<style>
    .main{
        width: 350px;
        height: 350px;
        margin: 100px auto;
        border: 1px solid grey;
        background-color:aliceblue;
        padding: 30px;
        font-size: 20px;
        text-align: center;
        font-family: sans-serif;
        border-radius: 5px;

    }
    input{
        margin: 20px;
        font-size:14px;
        font-weight: bold;
        border-radius: 5px;

    }
    input[type="submit"]{
        width: 90px;
        height: 30px;
        margin-right: 20px;
        border: 1px solid grey;
        color: black;
        background-color: lightsteelblue;
        font-size:16px;
        font-weight: bold;
        border-radius: 5px;

    }
</style>
<div class="main">
    <h1>Log In</h1>
    <form action="" method="post"  enctype="multipart/form-data">
        <label>Enter your email <input type="email" name="email"></label><br>
        <label>Enter your password<input type="password" name="password" ></label><br>
        <input type="submit" name="submit" value="Sing in">

        <input type="submit" name="register" value="Sing up">
    </form>
</div>


</body>
</html>