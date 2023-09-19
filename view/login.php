<?php

require_once '../Controller/EmployeeController.php';
require_once '../Model/Employee/EmployeeModel.php';

use Controller\EmployeeController;
use Model\Employee\EmployeeModel;

$employeeModel = new EmployeeModel();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h3>LOGIN</h3>

    <?php
    $error = array(
        "username" => "",
        "password" => "",
        "login" => ""
    );

    if (isset($_POST['login'])) {
        session_start();
        if (!$_POST['username']) {
            $error['username'] = "Chưa nhập tên đăng nhập!";
        }

        if (!$_POST['password']) {
            $error['password'] = "Chưa nhập password!";
        }

        $user = new EmployeeController($employeeModel);
        $isLoggedIn = $user->login($_POST["username"], $_POST["password"]);
        var_dump($isLoggedIn);

        if (!$isLoggedIn) {
            $error['login'] = "Login fail!";
        } else {
            session_start();
            $_SESSION['current_user'] = $_POST["username"];
            header("Location: /demophp/view/employee/employee.php");
        }
    }
    ?>

    <span><?php echo $error['login'] ?></span>
    <form action="login.php" method="post">
        <label for="username">
            Username
        </label>
        <input type="text" name="username" />
        <span><?php echo $error['username'] ?></span>

        <label for="password">
            Password
        </label>
        <input type="password" name="password" />
        <span><?php echo $error['password'] ?></span>
        <button type="submit" name="login">Login</button>
    </form>
</body>

</html>