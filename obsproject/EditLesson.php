<?php

include "dbconnect.php";
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
    $em = "Warning";
    header("Location: listlesson.php?error=$em");
    exit;
} else{
    $id = $_GET['id'];
    foreach($lessons as $lesson){
        if($lesson["id"]==$id){
    $teacher_name = $lesson['teacher_user_id'];
    $lesson_name = $lesson['lesson_name'];
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
                <form class="login" action="app/lesson/editLesson.php" method="POST">
    		<div class="text-center">
    			<img src="img/yavuzlar.png"
    			     width="100">
    		</div>
    		<h3>Edit Lesson</h3>
			
			<?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-info" role="alert">
			  <?=$_GET['error']?>
			</div>
			<?php } ?>

       
            <div class="mb-3">
                            <label class="form-label">Lesson Name</label>
                            <input type="text" value="<?php echo $lesson_name; ?>" class="form-control" name="lesson_name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teacher Name</label>
                            <select class="form-control" name="teacher_name">


                                <?php
                                foreach ($users as $user) {
                                    if ($user["role"] == "teacher") {
                                ?>
                                    <option value="<?php echo $user["id"];?>"<?php if($id==$user["id"]){ ?> selected <?php } ?>><?php echo $user["name"]; ?> - <?php echo $user["surname"]; ?> </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
          <input type="hidden" name="id" value="<?=$id?>">

		  <button type="submit" class="btn btn-primary">Edit</button>
        <a href="listlesson.php" class="btn btn-secondary" role="button">Lesson List</a>
		</form>
                </div>
            </div>
        </div>

        </div>
    </div>
</body>
</html>
