<?php
include_once 'User.php';
include_once 'DatabaseManager.php';
session_start();

if(isset($_POST['submit']) && (!empty($_POST['name']))
    && (!empty($_POST['email']))
    &&(!empty($_POST['password']))
    &&(!empty($_POST['phone']))){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $result = registerUser($name,$email,$phone, $password);
    if (!is_null($result)) {
        $_SESSION['userId'] = $result;
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $fileName = $file['name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $dirName = "upload";
            $destination = $dirName."/profile" . $result . "." . $fileActualExt;
            if ( ! is_dir($dirName)) {
                mkdir($dirName);
            }
            if (move_uploaded_file($file["tmp_name"], $destination) == true) {
                $user = getUserById($result);
                $user->avatar = $destination;
                updateUserData($user);
            }
        }
        header('Location: Cabinet.php');

    } else {
        header('Location: Error.php?errorText=Try again later');
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
    <title>Sing Up </title>
</head>
<body>
<style>
    .main{
        width: 400px;
        height: 500px;
        margin: 50px auto;
        border: 1px solid grey;
        background-color:aliceblue;
        padding: 15px 40px 15px 10px;
        text-align: left;
        font-size: 20px;
        font-family: sans-serif;
        border-radius: 5px;

    }
    h1{
        text-align: center;
    }
    label{
        margin-left: 10px;
    }
    input{
        text-align: left;
        margin:10px 0 10px 10px;
        font-size:12px;
        font-weight: bold;
        border-radius: 5px;

    }
    input[type="submit"]{
        display: block;
        width: 100px;
        height: 50px;
        margin:  30px 15px 30px auto;
        border: 1px solid grey;
        color: black;
        background-color: lightsteelblue;
        font-size:16px;
        text-align: center;
        font-weight: bold;
        border-radius: 5px;

    }
</style>
<div class="main">
    <h1>Sign Up</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
        <label for="file">Add your photo</label>
        <input type="file" id="file" name="file" accept=".jpg, .jpeg, .png"><br>
        <label>Enter your Name<br><input type="text" name="name" ></label><br>
        <label>Enter your email<br><input type="email" name="email" ></label><br>
        <label>Enter your phone number<br><input type="number" name="phone" ></label><br>
        <label>Enter your password<br><input type="password" name="password" ></label><br>
        <input type="submit" name="submit" value="Sign Up">
    </form>
</div>

</body>
</html>

