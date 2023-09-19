<?php
require_once '../../Controller/EmployeeController.php';

use Controller\EmployeeController;

$employee = new EmployeeController();

$employee->delete($_GET['user_id']);

header("Location: ./employee.php");
