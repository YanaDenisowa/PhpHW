<?php
/**
 * Created by PhpStorm.
 * User: yana
 * Date: 21.02.21
 * Time: 15:08
 */
include_once 'User.php';
include_once 'DatabaseManager.php';

session_start();
if(isset($_POST['change'])) {
    $userId = ((int)$_POST["userId"]);
    $user = getUserById($userId);
    if (!is_null($user)) {
        if ($user->role == 1) {
            $user->role = 0;
        } else if ($user->role == 0) {
            $user->role = 1;
        }
        updateUserData($user);
    }
}
if(isset($_POST['ban'])) {
    $userId = ((int)$_POST["userId"]);
    $user = getUserById($userId);
    if (!is_null($user)) {
        if ($user->ban == 1) {
            $user->ban = 0;
        } else if ($user->ban == 0) {
            $user->ban = 1;
        }
        updateUserData($user);
    }
}
$users = getAllUsersFromDB();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List </title>
</head>
<body>
<style>
    table{
        width: 900px;
        margin: 5px;
        margin: 100px auto;
        border: 1px solid grey;
        background-color:aliceblue;
        text-align: center;
    }
    td{
        border: 1px solid grey;
        text-align: center;
    }
</style>
    <table>
        <caption> <h1>User List</h1></caption>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Role</th>
            <th>Change Role</th>
            <th>Ban</th>
            <th>Change Ban</th>
        </tr>
        <?php
            foreach( $users as $user){
                $html = "<tr>";
                $html .= "<td>".$user->id."</td>";
                $html .= "<td>".$user->name."</td>";
                $html .= "<td>".$user->email."</td>";
                $html .= "<td>".$user->phone."</td>";
                $html .= "<td>".$user->password."</td>";
                if($user->role==1){
                    $html .= "<td>".'Admin'."</td>";
                }else{
                    $html .= "<td>".'User'."</td>";
                }
                $html .= "<td><form action='' method='post'>
                                    <input type='submit' name='change'>
                                    <input type='hidden' name='userId' value='$user->id'>
                               </form>
                         </td>";
                if($user->ban==1){
                    $html .= "<td>".'Ban'."</td>";
                }else{
                    $html .= "<td>".'Not'."</td>";
                }
                $html .= "<td>
                              <form action='' method='post'>
                                 <input type='submit' name='ban'>
                                 <input type='hidden' name='userId' value='$user->id'>
                              </form>
                         </td>";
                $html .= "</tr>";
                echo $html;
        }
        ?>

    </table>
</body>
</html>