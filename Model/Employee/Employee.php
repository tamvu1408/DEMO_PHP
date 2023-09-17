<?php

namespace Model\Employee;

require_once __DIR__ . '../../Interface/EmployeeInterface.php';
require_once __DIR__ . '../../ConnectDB.php';

use ConnectDB\ConnectDB;
use Interface\EmployeeInterface;

class EmployeeModel implements EmployeeInterface
{
    protected $conn;
    const ADMIN_ROLE = 1;

    public function __construct()
    {
        $this->conn = new ConnectDB();
    }

    public function findByUsername($username)
    {
        $query = "SELECT * FROM employees WHERE username = ? AND role = " . self::ADMIN_ROLE;
        $paramType = "s";
        $paramArray = array($username);
        $user = $this->conn->select($query, $paramType, $paramArray);
        $user[0] ?? [];

        return $user[0];
    }

    public function getALl()
    {
        $query = "SELECT employees.*, departments.name as department 
            FROM employees LEFT JOIN departments
            ON employees.department_id = departments.id";
        $data = $this->conn->select($query);

        return $data;
    }

    public function find($id)
    {
        $query = "SELECT * FROM employees WHERE id = ?";
        $paramType = "i";
        $paramArray = array($id);
        $data = $this->conn->select($query, $paramType, $paramArray);

        return $data;
    }

    public function create($array)
    {
        $query = "INSERT INTO employees (name, email, department_id) VALUES (?, ?, ?)";
        $paramType = "ssi";
        $paramArray = array($array['name'], $array['email'], $array['department_id']);
        $result = $this->conn->insert($query, $paramType, $paramArray);

        return $result;
    }

    public function update($id, $array)
    {
        $query = "UPDATE employees SET name = ?, email = ?, department_id = ? WHERE id = ?";
        $paramType = "ssii";
        $paramArray = array($array['name'], $array['email'], $array['department_id'], $id);
        $result = $this->conn->update($query, $paramType, $paramArray);

        return $result;
    }

    public function delete($id)
    {
        $query = "DELETE FROM employees WHERE id = ?";
        $paramType = "i";
        $paramArray = array($id);
        $result = $this->conn->delete($query, $paramType, $paramArray);

        return $result;
    }
}
