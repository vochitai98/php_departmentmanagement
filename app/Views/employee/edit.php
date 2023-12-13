<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
</head>
<body>

    <h2>Edit Employee</h2>

    <form action="employeecontroller.php" method="post">
    <input type="hidden" name="id" value="<?php echo $employee['id'];?>" required><br>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $employee['name'];?>" required><br>
        <label for="department">Choose a Department:</label>
        <select id="department" name="department_id">
        <?php
        foreach($departments as $dp):
           echo $ss;
            if($dp['id']===$employee['department_id']){
            echo"<option value=".$dp['id'].">".$dp['name']."</option>";
            }
        endforeach;
        foreach($departments as $dp):
            if($dp['id'] != $employee['department_id']){
            echo"<option value=".$dp['id'].">".$dp['name']."</option>";
            }
        endforeach;
        ?>
    </select>

        <input type="submit" name="edit_form" value="Edit Employee">
    </form>
</body>
</html>