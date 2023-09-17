<?php
require_once '../../Controller/EmployeeController.php';
require_once '../../Model/Employee/Employee.php';

use Controller\Employee;
use Model\Employee\EmployeeModel;

$employeeModel = new EmployeeModel();

$employee = new Employee($employeeModel);

$employee->delete($_GET['user_id']);

header("Location: ./employee.php");
