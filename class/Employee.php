<?php

namespace Class;

use ConnectDB\DataSource;

class Employee
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new DataSource();
    }

    public function login($username, $password)
    {
        $loginSuccess = false;
        $query = "SELECT * FROM employees WHERE username = ?";
        $paramType = "s";
        $paramArray = array($username);
        $user = $this->conn->select($query, $paramType, $paramArray);
        if (!empty($user)) {
            if ($user[0]['password'] === $password && $user[0]['role'] === 1)
                $loginSuccess = true;
        }

        return $loginSuccess;
    }

    public function getListEmployee()
    {
        $query = "SELECT employees.*, departments.name as department 
            FROM employees LEFT JOIN departments
            ON employees.department_id = departments.id";
        $data = $this->conn->select($query);

        return $data;
    }

    public function getEmployee($id)
    {
        $query = "SELECT * FROM employees WHERE id = ?";
        $paramType = "i";
        $paramArray = array($id);
        $data = $this->conn->select($query, $paramType, $paramArray);
        $data ?? [];
        return $data;
    }

    public function create($name, $email, $department_id)
    {
        $query = "INSERT INTO employees (name, email, department_id) VALUES (?, ?, ?)";
        $paramType = "ssi";
        $paramArray = array($name, $email, $department_id);
        $result = $this->conn->insert($query, $paramType, $paramArray);

        return $result;
    }

    public function update($id, $name, $email, $department_id)
    {
        $query = "UPDATE employees SET name = ?, email = ?, department_id = ? WHERE id = ?";
        $paramType = "ssii";
        $paramArray = array($name, $email, $department_id, $id);
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
