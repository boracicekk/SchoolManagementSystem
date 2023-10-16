<?php

include "dbconnect.php";
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
    $em = "Warning";
    header("Location: classesStudents.php?error=$em");
    exit;
} else{
            $id = $_GET['id'];
    foreach($ClassesStudents as $class){
        if($class["id"]==$id){
    $teacher_name = $class['student_id'];
    $class_name = $class['class_id'];
    break;
        }
    
    }

}?>



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
                    <form class="login" action="app/classesStudents/editclassesStudents.php" method="POST">
                        <div class="text-center">
                            <img src="img/yavuzlar.jpg" width="100">
                        </div>
                        <h3>Editing students</h3>
			
                        <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-info" role="alert">
                            <?= $_GET['error'] ?>
                        </div>
                        <?php } ?>

                        <div class="mb-3">
                            <label class="form-label">Student Name</label>
                            <select class="form-control" name="student_id">
                                <option value="0">choose</option>

                                <?php
                                foreach ($users as $user) {
                                    if ($user["role"] == "student") {
                                ?>
                                    <option value="<?php echo $user["id"];?>"><?php echo $user["name"]; ?> - <?php echo $user["surname"]; ?> </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Class Name</label>
                            <select class="form-control" name="class_id">
                                <option value="0">choose</option>

                                <?php
                                foreach ($ClassesStudents as $class) {
                                    
                                ?>
                                    <option value="<?php echo $class["id"];?>">-<?php echo $class["class_id"]; ?>-</option>
                                <?php
                                    }
                                
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Done</button>
                        <a href="classesStudents.php" class="btn btn-secondary" role="button">Classes and Students List</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

