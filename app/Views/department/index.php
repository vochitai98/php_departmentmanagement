<?php

class DepartmentView {
    public function render($departments) {
        include_once 'D:/Xamp/htdocs/PHP_DepartmentManager/includes/header.php';
        echo '<table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>EmployeeList</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through the data and display it in the table -->';
                foreach ($departments as $row):
                    echo
                    '<tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['name'].'</td>
                        <td> <a href="#">xxx</a> </td>
                    </tr>';
                endforeach;
            echo '</tbody>
        </table>';

        include_once 'D:/Xamp/htdocs/PHP_DepartmentManager/includes/footer.php';
    }
}
?>
