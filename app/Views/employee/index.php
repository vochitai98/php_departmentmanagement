<?php

class EmployeeView {
    public function render($departments) {
        include_once 'D:/Xamp/htdocs/PHP_DepartmentManager/includes/header.php';
        echo '<div style="text-align: right;"><a href = "?create="><Button style="background-color:green;height: 30px;">Create Employee</Button></a></div>';
        echo '<table border="1" width="100%" style= "text-align: center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through the data and display it in the table -->';
                foreach ($departments as $row):
                    echo
                    '<tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['department_name'].'</td>
                        <td> <a href="?edit=&id='.$row['id'].'"><button style="background-color:blue;">Edit</button></a> </td>
                        <td> <a href ="?delete=&id='.$row['id'].'"><button style="background-color:red;">Delete</button></a> </td>
                    </tr>';
                endforeach;
            echo '</tbody>
        </table>';

        include_once 'D:/Xamp/htdocs/PHP_DepartmentManager/includes/footer.php';
    }
}
?>

