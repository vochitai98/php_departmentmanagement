<?php
include_once('D:/Xamp/htdocs/PHP_DepartmentManager/app/Models/Department.php');
include_once('D:/Xamp/htdocs/PHP_DepartmentManager/app/Views/department/index.php');
class DepartmentController {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function index() {
        // Gọi hàm getDepartmentList từ model
        $departments = $this->model->getDepartmentList();

        // Truyền dữ liệu đến view
        $this->view->render($departments);
    }
}

// Tạo đối tượng mô hình và view
$departmentModel = new Department($conn);
$departmentView = new DepartmentView();

// Tạo đối tượng controller và gọi hàm index
$departmentController = new DepartmentController($departmentModel, $departmentView);
$departmentController->index();
?>
