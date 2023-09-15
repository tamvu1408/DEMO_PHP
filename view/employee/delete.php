<?php
    require_once '../../class/Employee.php';

    use Class\Employee;

    $employee = new Employee();

    $employee->delete($_GET['user_id']);

    header("Location: ./employee.php");
