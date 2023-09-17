<?php

namespace Controller;

use Interface\EmployeeInterface;

class Employee
{
    protected $employeeModel;

    public function __construct(EmployeeInterface $employeeInterface)
    {
        $this->employeeModel = $employeeInterface;
    }

    public function login($username, $password)
    {
        $user = $this->employeeModel->findByUsername($username);
        if (!empty($user) && $user['password'] === $password) {
            return true;
        }

        return false;
    }

    public function getList()
    {
        return $this->employeeModel->getAll();
    }

    public function getEmployee($id)
    {
        $data = $this->employeeModel->find($id);
        $data ?? [];

        return $data;
    }

    public function create($name, $email, $department_id)
    {
        return $this->employeeModel->create(array(
            'name' => $name,
            'email' => $email,
            'department_id' => $department_id
        ));
    }

    public function update($id, $name, $email, $department_id)
    {
        return $this->employeeModel->update(
            $id,
            array(
                'name' => $name,
                'email' => $email,
                'department_id' => $department_id
            )
        );
    }

    public function delete($id)
    {
        return $this->employeeModel->delete($id);
    }
}
