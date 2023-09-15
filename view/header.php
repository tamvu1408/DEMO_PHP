<?php
session_start();

if (!$_SESSION['current_user'])
    header("Location: /demo_php/view/login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="/demo_php/view/employee/employee.php">employees</a>
    <a href="/demo_php/view/department.php">departments</a>
    <span><?php if (isset($_SESSION['current_user'])) echo $_SESSION['current_user'] ?></span>
    <a href="/demo_php/logout.php">Logout</a>