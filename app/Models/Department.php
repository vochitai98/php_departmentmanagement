<?php
include_once 'D:/Xamp/htdocs/PHP_DepartmentManager/app/Models/ConnectDB.php';
class Department {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getDepartmentList() {
        $sql = "SELECT * FROM departments";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $departments = array();

            while ($row = $result->fetch_assoc()) {
                $departments[] = $row;
            }

            return $departments;
        } else {
            return array();
        }
    }
}