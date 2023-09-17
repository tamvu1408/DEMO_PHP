<?php
require_once '../../Controller/EmployeeController.php';
require_once '../../Controller/DepartmentController.php';
require_once '../../Model/Employee/Employee.php';

use Controller\Employee;
use Controller\Department;
use Model\Employee\EmployeeModel;

$employeeModel = new EmployeeModel();
$departments = new Department();

$list_department = $departments->getList();

$employee = new Employee($employeeModel);
$edit_user  = $employee->getEmployee($_GET['user_id']);

if (!isset($edit_user[0])) {
    header("Location: ./employee.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
</head>

<body>
    <?php

    if (isset($_POST['edit'])) {

        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $department = isset($_POST['department']) ? $_POST['department'] : '';

        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['department'])) {
            $user = new Employee($employeeModel);

            $update_user = $user->update($_GET['user_id'], $name, $email, $department);
            header("Location: ./employee.php");
        }
    }
    ?>

    <h4>Add</h4>
    <a href="./employee.php">Danh sách nhân viên</a>
    <form action="" method="post">
        <label for="name">name</label>
        <input type="text" value="<?php echo $edit_user[0]['name'] ?>" name="name" require>
        <label for="email">email</label>
        <input type="email" value="<?php echo $edit_user[0]['email'] ?>" name="email" require>
        <label for="department">department</label>
        <select name="department" value="<?php echo $edit_user[0]['department_id'] ?>" require>
            <?php
            foreach ($list_department as $item) {
                $selected = "";
                if ($item['id'] === $edit_user[0]['department_id']) {
                    $selected = "selected";
                }
            ?>
                <option value="<?php echo $item['id'] ?>" <?php echo $selected ?>> <?php echo $item['name'] ?></option>
            <?php } ?>
        </select>
        <button type="submit" name="edit">Edit</button>
    </form>
</body>

</html>