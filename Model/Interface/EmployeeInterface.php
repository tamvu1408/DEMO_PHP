<?php

namespace Interface;

interface EmployeeInterface
{
    public function findByUsername($username);

    public function getAll();

    public function find($id);

    public function create($array);

    public function update($id, $array);

    public function delete($id);
}
