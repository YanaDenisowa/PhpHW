<?php
include_once 'User.php';
include_once 'DatabaseManager.php';

session_start();

if (empty($_SESSION['userId'])) {
    header('Location: Error.php?errorText=You are not a member yet.');
}
$userId = $_SESSION['userId'];
$user = getUserById($userId);
if (is_null($user)) {
    header('Location: Error.php?errorText=Try again.');
}

if(isset($_POST['submit'])){
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->phone = $_POST['phone'];
    updateUserData($user);
}

if (isset($_FILES['file'])) {

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $dirName = "upload";
    $destination = $dirName."/profile" . $user->id . "." . $fileActualExt;
    if ( ! is_dir($dirName)) {
        mkdir($dirName);
    }
    if (move_uploaded_file($file["tmp_name"], $destination) == true) {
        $user->avatar = $destination;
        updateUserData($user);
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
    <title> Private Cabinet</title>
</head>
<body>
<style>
    .main{
        width: 400px;
        height: 600px;
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
        width: 120px;
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
    <h1>Hello <?php echo $user->name; ?>!</h1>
    <?php
    if (!empty($user->avatar)) {
        echo "<img style='width:50px; height: 50px;' src='$user->avatar'>";
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="file">Add your photo</label>
        <input type="file" id="file" name="file" accept=".jpg, .jpeg, .png"><br>
        <label>Change your Name<br><input type="firstName" name="name" value="<?php echo $user->name; ?>"></label><br>
        <label>Change your email<br><input type="email" name="email" value="<?php echo $user->email; ?>"></label><br>
        <label>Change your phone number<br><input type="number" name="phone" value="<?php echo $user->phone; ?>"></label><br>
        <input type="submit" name="submit" value="Save changes">
        <?php
           if($user->role == 1) {
               echo "<input type='submit' name='list' value='Change rights'>";
           }
           if(isset($_POST['list'])) {
               header('Location: UsersList.php');
           }
        ?>
    </form>
</div>
</body>
</html>
