<?php
/**
 * Created by PhpStorm.
 * User: yana
 * Date: 21.02.21
 * Time: 12:15
 */
include_once 'User.php';
include_once 'DatabaseManager.php';

session_start();
if(isset($_POST['login'])) {
    header('Location: SignIn.php');
}

$errorMessage = $_GET["errorText"];
if (is_null($errorMessage)) {
    $errorMessage = "Email or password are incorrect! Try again!";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    div{
        width: 300px;
        height: 200px;
        margin: 100px auto;
        border: 1px solid grey;
        background-color:aliceblue;
        padding: 30px;
        font-size: 16px;
        text-align: center;
        font-family: sans-serif;
        border-radius: 5px;
    }
    input[type="submit"]{
        width: 90px;
        height: 30px;
        margin-right: 20px;
        border: 1px solid grey;
        color: black;
        background-color: lightsteelblue;
        font-size:14px;
        font-weight: bold;
        border-radius: 5px;

    }
</style>
<div>
    <h1><?php echo $errorMessage ?></h1>
    <form action="" method="post">
        <input type="submit" name="login" value="Log In">
    </form>
</div>
</body>
</html>


