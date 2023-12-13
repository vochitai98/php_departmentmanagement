<?php
include_once('D:/Xamp/htdocs/PHP_DepartmentManager/app/Models/Employee.php');
include_once('D:/Xamp/htdocs/PHP_DepartmentManager/app/Views/employee/index.php');
class EmployeeController {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function index() {
        // Gọi hàm getDepartmentList từ model
        $employees = $this->model->getEmployeeList();
        // Truyền dữ liệu đến view
        $this->view->render($employees);
    }
    public function getDepartmentList() {
        // Gọi hàm getDepartmentList từ model
        $departments = $this->model->getDepartmentList();
        // Truyền dữ liệu đến view
       return $departments;
    
    }
    public function getEmployeeById($id) {
        // Gọi hàm getDepartmentList từ model
        $employee = $this->model->getEmployeeById($id);
        // Truyền dữ liệu đến view
       return $employee;
    }
    public function create($name,$department_id) {
        // Gọi hàm getDepartmentList từ model
        $employee = $this->model->create($name,$department_id);
        if($employee){
            return true;
        }else 
            return false;
    }
    public function delete($id) {
        // Gọi hàm getDepartmentList từ model
        $employee = $this->model->delete($id);
        if($employee){
            return true;
        }else 
            return false;
    }
    public function redirectWithAlert($url, $message) {
        echo '<script>alert("' . $message . '");</script>';
        echo '<script>window.location.href = "' . $url . '";</script>';
        exit();
    }

    public function edit($id,$name,$department_id) {
        // Gọi hàm getDepartmentList từ model
        $employee= $this->model->edit($id,$name,$department_id);
        if($employee){
            return true;
        }
        return false;
    
    }
}
// Tạo đối tượng mô hình và view
$employeeModel = new Employee($conn);
$employeeView = new EmployeeView();
// Tạo đối tượng controller và gọi hàm index
$employeeController = new EmployeeController($employeeModel, $employeeView);


if (isset($_GET['index'])) {
    $employeeController->index();
}else if(isset($_GET['create'])){
    $departments = $employeeController->getDepartmentList();
        // Include view và truyền dữ liệu
    include_once('D:/Xamp/htdocs/PHP_DepartmentManager/app/Views/employee/create.php');
}else if(isset($_POST['create_form'])){
    $name = $_REQUEST['name'];
    $department_id = $_REQUEST['department_id'];
    $employee = $employeeController->create($name,$department_id);
    if($employee){
        $employeeController->redirectWithAlert("employeecontroller.php", "Employee created successfully!");
    }else{
        $employeeController->redirectWithAlert("employeecontroller.php", "Error creating employee. Please try again.");
    }
}else if(isset($_GET['delete'])){
    $employee = $employeeController->delete($_REQUEST['id']);
    if($employee){
        $employeeController->redirectWithAlert("employeecontroller.php", "Employee delete successfully!");
    }else{
        $employeeController->redirectWithAlert("employeecontroller.php", "Error deleting employee. Please try again.");
    }
}else if(isset($_GET['edit'])){
    $departments = $employeeController->getDepartmentList();
    $employee =  $employeeController->getEmployeeById($_GET['id']);
        // Include view và truyền dữ liệu
    include_once('D:/Xamp/htdocs/PHP_DepartmentManager/app/Views/employee/edit.php');
}else if(isset($_POST['edit_form'])){
    $employee = $employeeController->edit($_REQUEST['id'],$_REQUEST['name'],$_REQUEST['department_id']);
    if($employee){
        $employeeController->redirectWithAlert("employeecontroller.php", "Employee edit successfully!");
    }else{
        $employeeController->redirectWithAlert("employeecontroller.php", "Error editing employee. Please try again.");
    }
}else {
    $employeeController->index();
}
?>