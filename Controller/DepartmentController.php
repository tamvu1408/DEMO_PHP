<?php

namespace Controller;

require_once __DIR__ . '../../Model/Department/DepartmentModel.php';

use Model\Department\DepartmentModel;

class DepartmentController
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
