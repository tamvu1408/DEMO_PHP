<?php

namespace Model\Department;

require_once __DIR__ . '../../ConnectDB.php';

use Model\ConnectDB;

class DepartmentModel
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new ConnectDB();
    }

    public function getAll()
    {
        $query = "SELECT departments.*, employees.name as manager 
            FROM departments LEFT JOIN employees 
            ON departments.manager_id = employees.id";
        $data = $this->conn->select($query);

        return $data;
    }
}
