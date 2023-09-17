<?php

namespace Controller;

require_once __DIR__ . '../../Model/Department/Department.php';

use Model\Department\DepartmentModel;

class Department
{
    protected $departmentModel;

    public function __construct()
    {
        $this->departmentModel = new DepartmentModel();
    }

    public function getList()
    {
        return $this->departmentModel->getAll();
    }
}
