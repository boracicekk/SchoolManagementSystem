<?php
session_start();
include "dbconnect.php";
if (isset($_SESSION['id']) && isset($_SESSION['role']) && (isset($_SESSION['role'])=="admin")) {
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OBS sistemi</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container container-plus">
        <?php
        include("include/navbar.php");
        ?>
        <div class="row justify-content-center  mt-5">
            <div class="col-md-8">
                <div class="text-center">
                    <h1>Student List</h1>
                    <h2><p>Add New Student <a href="AddclassesStudent.php" class="btn btn-info" role="button" >ADD</a></p></h2>
                </div>
            </div>
        </div>
        <div class="row">
<div class="col-md-12 mt-5">
<div class="table-wrap">
<table class="table">
<thead class="thead-primary">
<tr>
<th>#</th>
<th>Student ID</th>
<th>Class Name</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>

    <?php
    foreach($ClassesStudents as $classStudents){
        
    
    ?>
    <tr>
<th scope="row"><?php echo $classStudents["id"]; ?></th>
<td><?php echo $classStudents["student_id"]; ?></td>
<td><?php echo $classStudents["class_id"]; ?></td>
<td><a href="EditclassesStudents.php?id=<?php echo $classStudents["id"]; ?>" class="btn btn-block btn-warning">Edit</a></td>
<td><a href="app/ClassesStudents/deleteclassesStudents.php?id=<?php echo $classStudents["id"]; ?>" class="btn btn-block btn-danger">Delete</a></td>
</tr>
    <?php
    }
    ?>

</tbody>
</table>
</div>
</div>
</div>
        </div>
    </div>
</body>
</html>
<?php } else {
    header("Location: login.php");
    exit;
} ?>
