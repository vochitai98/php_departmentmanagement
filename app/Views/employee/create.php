<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
</head>
<body>

    <h2>Create Employee</h2>

    <form action="employeecontroller.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="department">Choose a Department:</label>
        <select id="department" name="department_id">
        <?php
        foreach($departments as $dp):
            echo"<option value=".$dp['id'].">".$dp['name']."</option>";
        endforeach;
        ?>
    </select>

        <input type="submit" name="create_form" value="Create Employee">
    </form>
</body>
</html>

