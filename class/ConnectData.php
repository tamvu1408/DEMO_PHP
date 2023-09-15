<?php

namespace ConnectDB;

use mysqli;

class DataSource
{
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DATABASE = 'demo_php';

    protected $conn;

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    public function getConnection()
    {
        $conn = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASE);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->set_charset("utf8");

        return $conn;
    }

    public function select($query, $paramType = "", $paramArray = array())
    {
        $statement = $this->conn->prepare($query);
        if (!empty($paramType) && !empty($paramArray)) {
            $statement->bind_param($paramType, ...$paramArray);
        }
        $statement->execute();
        $data = $statement->get_result();
        $result = array();
        if ($data->num_rows > 0) {
            while ($row = $data->fetch_assoc()) {
                $result[] = $row;
            }
        }

        return $result;
    }

    public function insert($query, $paramType, $paramArray)
    {
        // print $query;
        $stmt = $this->conn->prepare($query);
        if (!empty($paramType) && !empty($paramArray)) {
            $stmt->bind_param($paramType, ...$paramArray);
        }
        $stmt->execute();
        $insertId = $stmt->insert_id;
        return $insertId;
    }

    public function update($query, $paramType, $paramArray)
    {
        $stmt = $this->conn->prepare($query);
        if (!empty($paramType) && !empty($paramArray)) {
            $stmt->bind_param($paramType, ...$paramArray);
        }
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        return $affectedRows;
    }

    public function delete($query, $paramType, $paramArray)
    {
        $stmt = $this->conn->prepare($query);
        if (!empty($paramType) && !empty($paramArray)) {
            $stmt->bind_param($paramType, ...$paramArray);
        }
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        return $affectedRows;
    }
}
