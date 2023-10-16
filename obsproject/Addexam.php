<?php
include "dbconnect.php";

session_start();
if (!isset($_SESSION['id']) || isset($_SESSION['role']) || !($_SESSION['role'] == "admin" ||  $_SESSION['role'] == "teacher") ) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Exam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/style.css">
	<link rel="icon" href="img/yavuzlar.jpg">
</head>
<body class="body-login">
    <div class="black-fill"><br /> <br />
    	<div class="container container-plus ">
        <?php
        include("include/navbar.php");
        ?>
    	<form class="login" action="app/Exam/addExam.php" method="POST">
    		<div class="text-center">
    			<img src="img/yavuzlar.png"
    			     width="100">
    		</div>
    		<h3>ADD EXAM</h3>
			
			<?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-info" role="alert">
			  <?=$_GET['error']?>
			</div>
			<?php } ?>

                
            <div class="mb-3">
		    <label class="form-label">Student Id</label>
		    <select class="form-control" name="student_id">
                <option value="0">Choose</option>
		    	<?php 
                   
                   foreach ($ClassesStudents as $studentClass) {
                    if($_SESSION["role"] === "teacher" && !($tempClassId === $studentClass["class_id"])){
                        continue;
                    }
                        $name = "";
                        $surname = "";
                        foreach($users as $user) {
                            if($studentClass["student_id"] === $user["id"] ){
                                $name = $user["name"];
                                $surname = $user["surname"];
                            }
                        }
                    ?>
                        <option value="<?= $studentClass["student_id"] ?>"><?=  $name . ' ' . $surname  ?></option>
                    <?php 
                    
                        }
                ?>
		    </select>
		    </div>
		  
          <div class="mb-3">
		    <label class="form-label">Lesson Id</label>
		    <select class="form-control" name="lesson_id">
                <option value="0">Choose</option>
                <?php 
                foreach ($lessons as $lesson) {
                    if($_SESSION["role"] === "teacher" && !($lesson["teacher_user_id"] === $_SESSION["id"])){
                        continue;
                    }
                ?>
                <option value="<?php echo $lesson["id"]; ?>"><?php echo $lesson["lesson_name"]; ?></option>
                <?php } ?>
		    </select>
		  </div>

          
		  <div class="mb-3">
		    <label class="form-label">Exam Score</label>
		    <input type="text" class="form-control" name="exam_score" required>
		  </div>


		  <button type="submit" class="btn btn-primary">Add</button>
		  <a href="home.php" class="btn btn-secondary" role="button" >Home</a>
		</form>
        
       
    	</div>
    </div>
</body>
</html>
<?php } else {
    header("Location: login.php");
    exit;
} ?>
