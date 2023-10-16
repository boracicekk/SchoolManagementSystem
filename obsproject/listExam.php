<?php 
session_start();
include "dbconnect.php";
if (isset($_SESSION['id']) && isset($_SESSION['role']) && ($_SESSION['role'] === "admin" || $_SESSION['role'] === "teacher") ) {
    $tempClassId = "";

    if($_SESSION["role"] == "teacher"){
        foreach ($classes as $class) {
            if($class["class_teacher_id"] == $_SESSION["id"]){
                    $tempClassId =  $class["id"];               
            }
        }
      
    }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to Yavuzlar School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="img/yavuzlar.jpg">
</head>
<body class="body-home">
    <div class="black-fill"><br /> <br />
    	<div class="container container-plus">

		<?php include("include/navbar.php"); ?>

        <section class="user-text d-flex  align-items-center flex-column btn-danger">
        	<div class="conteiner d-flex w-25 mt-4 mb-4">
            <img class="col-md-2 mx-2" src="img/yavuzlar.jpg" >
        	<h4 class="col-md-10 mt-4">Exams List</h4>
            </div>
        	<p>
            Add New Exam <a href="Addexam.php" class="btn btn-info" role="button" >ADD</a>
            </p>
        </section>

        <?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-danger d-flex justify-content-center align-items-center" role="alert">
			  <?=$_GET['error']?>
			</div>
		<?php } ?>
        
        <section id="listUser"
                 class="d-flex justify-content-center align-items-center flex-column">
        	<div class="card mb-3 card-1">
			  <div class="row g-0">
              <div class="col-md-12">
                <div class="table-wrap">
                <label class="p-1 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" for="filter">Filter Classes:</label>
                                <select id="filter" class="p-1 text-primary-emphasis border border-primary-subtle rounded-3" style=" background-color : #78cc8e;">
                                 <option value="all">All</option>

                                  <?php 
                                    foreach ($classes as $class) {
                                   ?>
                                
                                <option value="<?php echo $class["id"]; ?>"><?php echo $class["id"];?> - <?php echo  $class["class_name"];?></option>
                                   <?php } ?>
                                </select>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Student</th>
                                <th>Lesson</th>
                                <th>Class</th>
                                <th>Exam Score</th>
                                <th>Exam Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                     
                        
                        foreach ($exams as $exam) {
                            
                            if($_SESSION["role"] == "teacher" && !($tempClassId == $exam["class_id"])){
                                continue;
                            }
                            
                            
                            if($_SESSION["role"] == "teacher"){
                                foreach ($classes as $class) {
                                    if($class["class_teacher_id"] == $_SESSION["id"]){
                                        if($exam["class_id"] == $class["id"]){
                                            continue;
                                        }
                                    }
                                }
                              
                            }
                           

                            $studentName = " ";
                            $studentSurname = " ";
                            foreach($users as $user){
                                if($exam["student_id"] == $user["id"]){
                                    $studentName = $user["name"];
                                    $studentSurname = $user["surname"];
                                }
                            }

                            $lessonName = " ";
                            foreach($lessons as $lesson){
                                if($exam["lesson_id"] == $lesson["id"]){
                                    $lessonName = $lesson["lesson_name"];
                                }
                            }
                            
                            $className = " ";
                            foreach($classes as $class){
                                if($exam["class_id"] == $class["id"]){
                                    $className = $class["class_name"];
                                }

                            }
                                echo '
                                <tr class="alert" role="alert" data-filter="'. $exam["class_id"] .'">
                                    <th scope="row">'.$exam["id"].'</th>
                                    <td>'.$exam["student_id"].' - '. $studentName .' '. $studentSurname.'</td>
                                    <td>'.$exam["lesson_id"].' - '. $lessonName .'</td>
                                    <td>'.$exam["class_id"].' - '. $className .'</td>
                                    <td>'.$exam["exam_score"].'</td> 
                                    <td>'.$exam["exam_date"].'</td> 
                                    <td>
                                        <a href="EditExam.php?id='. $exam["id"] .'" class="btn btn-block btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <a href="app/Exam/deleteExam.php?id='. $exam["id"] .'" class="btn btn-block btn-danger">Delete</a>
                                    </td>
                                </tr>
                                ';
                            
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
			  </div>
			</div>
        </section>
       

    	</div>
    </div>
</body>
</html>
<?php }else {
	header("Location: login.php");
	exit;
} ?>