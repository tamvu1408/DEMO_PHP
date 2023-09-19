<?php
require_once '../header.php';
require_once '../../Model/Employee/EmployeeModel.php';
require_once '../../Controller/EmployeeController.php';

use Controller\Employee;
use Controller\EmployeeController;
use Model\Employee\EmployeeModel;

$employeeModel = new EmployeeModel();

$employee = new EmployeeController($employeeModel);
$list_employees = $employee->getList();
?>

<a href="./create.php">Thêm nhân viên</a>
<table>
    <tr>
        <th>Mã NV</th>
        <th>Họ tên</th>
        <th>Ngày sinh</th>
        <th>Ngày vào làm</th>
        <th>Phòng ban</th>
        <th></th>
    </tr>
    <?php
    foreach ($list_employees as $e) {
    ?>
        <tr>
            <td><?php echo $e["id"]; ?></td>
            <td><?php echo $e["name"]; ?></td>
            <td><?php echo $e["birth_date"]; ?></td>
            <td><?php echo $e["starting_date"]; ?> </td>
            <td><?php echo $e["department"] ?></td>
            <td>
                <a href="./edit.php?user_id=<?php echo $e["id"]; ?>">Sửa</a>
                <a href="./delete.php?user_id=<?php echo $e["id"]; ?>">Xóa</a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>

</html>