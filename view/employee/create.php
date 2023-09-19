<?php
require_once '../../Controller/EmployeeController.php';
require_once '../../Controller/DepartmentController.php';
require_once '../../Model/Employee/Employee.php';

use Controller\EmployeeController;
use Controller\DepartmentController;
use Model\Employee\EmployeeModel;

$employeeModel = new EmployeeModel();
$departments = new DepartmentController();

$list_department = $departments->getList();
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

    if (isset($_POST['create'])) {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $department = isset($_POST['department']) ? $_POST['department'] : '';

        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['department'])) {
            $user = new EmployeeController($employeeModel);
            $new_user = $user->create($name, $email, $department);
            echo "Thêm thành công!";
        }
    }
    ?>

    <h4>Add</h4>
    <a href="./employee.php">Danh sách nhân viên</a>
    <form action="create.php" method="post">
        <div>
            <label for="name">name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="email">email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="department">department</label>
            <select name="department">
                <?php foreach ($list_department as $item) { ?>
                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                <?php } ?>
            </select>
            <span></span>
        </div>
        <button type="submit" name="create">Create</button>
    </form>
</body>

</html>