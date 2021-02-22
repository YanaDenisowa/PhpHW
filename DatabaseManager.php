<?php
/**
 * Created by PhpStorm.
 * User: yana
 * Date: 17.02.21
 * Time: 10:28
 */
include_once 'User.php';

function createConnection() {
    $url = 'localhost';
    $username = 'root';
    $password = 'password';
    $nameDB= 'User';
    return mysqli_connect($url, $username, $password, $nameDB);
}

//create function for getting info from DB
function getAllUsers(){
    $connection = createConnection();

    if($connection->connect_error){
        die('Connection Failed:'.$connection->connect_error);
    }
    ////create request to DB
    $request = "SELECT * FROM User";
//sending request to DB and get data from it
    $response = $connection->query($request);
    $connection->close();
    return $response;
}
function getAllUsersFromDB(){
    $connection = createConnection();
    if($connection->connect_error){
        die('Connection Failed:'.$connection->connect_error);
    }
//    var_dump($connection);
    $request = "SELECT *  FROM User ";
    $response = $connection->query($request);
    $connection->close();
    if ($response->num_rows > 0) {
        $member = array();
        while ($row = $response->fetch_assoc()) {
            $user = new User($row);
            array_push($member, $user);
        }
       return $member;
    } else {
        return array();
    }
}

function updateUserData($user){
    $connection = createConnection();

    if($connection->connect_error){
        die('Connection Failed:'.$connection->connect_error);
    }
    $request = "UPDATE User SET Name ='$user->name',Email='$user->email', 
                Phone=$user->phone, Role='$user->role', Ban='$user->ban', Photo='$user->avatar'
                WHERE id = $user->id ";
    $response = $connection->query($request);
    $connection->close();
    return $response;

}
function getUserById($userId) {
    $connection = createConnection();

    if($connection->connect_error){
        die('Connection Failed:'.$connection->connect_error);
    }
    $request = "SELECT *  FROM User WHERE id='$userId'";
    $response = $connection->query($request);
    $connection->close();
    if ($response->num_rows > 0) {
        $user = new User($response->fetch_assoc());
        return $user;
    } else {
        return null;
    }
}
function registerUser($name, $email,$phone, $pass) {
    $connection = createConnection();
    if($connection->connect_error){
        die('Connection Failed:'.$connection->connect_error);
    }
    $request = "INSERT INTO User (Name, Photo, Email, Phone, Password, Role, Ban)
    VALUES  ('$name','','$email',$phone,'$pass', 0, 0)";
    echo $request;
    $response = $connection->query($request);
    $userId=NULL;
    if ($response==true){
        $userId=$connection->insert_id;
    }
    $connection->close();
    return $userId;
    }

function getUser($email, $pass) {
    $connection = createConnection();
    if($connection->connect_error){
        die('Connection Failed:'.$connection->connect_error);
    }
    $request = "SELECT *  FROM User WHERE Email='$email' AND Password='$pass'";
    $response = $connection->query($request);
    $connection->close();
    if ($response->num_rows > 0) {
        $user = new User($response->fetch_assoc());
        return $user;
    } else {
        return null;
    }
}


