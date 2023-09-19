<?php
session_start();

if (!$_SESSION['current_user'])
    header("Location: /demophp/view/login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="/demophp/view/employee/employee.php">employees</a>
    <a href="/demophp/view/department.php">departments</a>
    <span><?php if (isset($_SESSION['current_user'])) echo $_SESSION['current_user'] ?></span>
    <a href="/demophp/logout.php">Logout</a>