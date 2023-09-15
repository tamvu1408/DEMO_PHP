<?php
require_once './header.php';
require_once '../class/Department.php';

use Class\Department;

$departments = new Department();
$list = $departments->getList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department</title>
</head>

<body>
    <h4>Department</h4>
    <table>
        <tr>
            <td>Mã phòng ban</td>
            <td>Tên</td>
            <td>Người quản lý</td>
        </tr>
        <?php
        foreach ($list as $item) {
        ?>
            <tr>
                <td><?php echo $item["id"]; ?></td>
                <td><?php echo $item["name"]; ?> </td>
                <td><?php echo $item["manager"]; ?> </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>