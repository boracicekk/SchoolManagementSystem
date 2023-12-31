<?php

include "dbconnect.php";

session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || !($_SESSION['role'] === "admin" || $_SESSION['role'] === "teacher") ) {
    $em = "Warning";
    header("Location: listExam.php?error=$em");
    exit;
} else{

    $id = $_GET['id'];
    $examTable = "t_exams";
    $school = $conn->prepare("SELECT * FROM $examTable ORDER BY id DESC");
    $school->execute();
    $exams = $school->fetchAll(PDO::FETCH_ASSOC);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Exam Edit</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="CSS/style.css">
	<link rel="icon" href="img/yavuzlar.jpg">
</head>
<body class="body-login">
    <div class="black-fill"><br /> <br />
    	<div class="container container-plus">
        <?php
        include("include/navbar.php");
        ?>
    	<form class="login" action="app/exam/editExam.php" method="POST">
    		<div class="text-center">
    			<img src="img/yavuzlar.jpg"
    			     width="100">
    		</div>
    		<h3>EDIT EXAM</h3>
			
			<?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-info" role="alert">
			  <?=$_GET['error']?>
			</div>
			<?php } ?>
            

            <?php 
                foreach ($exams as $exam) {
                    $examScore = "0";
                    if($exam["id"] == $id){
                        $examScore = $exam["exam_score"];
                        break;
                    }
                } 
            ?>

            <div class="mb-3">
		    <label class="form-label">Exam Score</label>
		    <input type="text" class="form-control" value="<?php echo $examScore; ?>" name="exam_score" required>
            </div>
          <input type="hidden" name="id" value="<?=$id?>">

		  <button type="submit" class="btn btn-primary">Edit</button>
		  <a href="home.php" class="btn btn-secondary" role="button" >Home</a>
		</form>
        
       
    	</div>
    </div>
</body>
</html>