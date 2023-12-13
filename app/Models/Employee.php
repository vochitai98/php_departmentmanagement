<?php
include_once 'D:/Xamp/htdocs/PHP_DepartmentManager/app/Models/ConnectDB.php';
class Employee
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getEmployeeList()
    {
        $sql = "SELECT employees.*,departments.name as department_name FROM employees Inner join departments ON (employees.department_id = departments.id)";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $employees = array();

            while ($row = $result->fetch_assoc()) {
                $employees[] = $row;
            }

            return $employees;
        } else {
            return array();
        }
    }

    public function getDepartmentList()
    {
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
    public function create($name, $department_id)
    {
        $sql = "INSERT INTO employees (name,department_id) VALUES (?,?)";
        $stmt = $this->db->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('si', $name, $department_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error: " . $this->db->error;
            return false;
        }
    }
    public function delete($id)
    {
        $sql = "DELETE FROM employees WHERE id = $id";
        if ($this->db->query($sql) === TRUE) {
            echo "Record deleted successfully";
            return true;
        } else {
            echo "Error deleting record: " . $this->db->error;
            return false;
        }

        $this->db->close();
        return false;
    }
    public function getEmployeeById($id)
    {
        $sql = "SELECT * FROM employees WHERE id = $id LIMIT 1";
        $result = $this->db->query($sql);
        $employee = $result->fetch_assoc();
        //var_dump($result->fetch_assoc());
        if ($employee !== null) {
            return $employee;
        } else {
            return null;
        }
    }
    public function edit($id, $name, $department_id)
    {
        $sql = "UPDATE employees SET name = ?, department_id = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sii", $name, $department_id, $id);
        $result = $stmt->execute();
        $this->db->close();
        return $result;
    }
}
