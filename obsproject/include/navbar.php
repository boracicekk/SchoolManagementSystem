<?php

if (!isset($_SESSION['id']) && !isset($_SESSION['role'])) {
    header("Location: login.php");
	exit;
}

?>
    <link rel="stylesheet" href="CSS/style.css">

	 <nav class="navbar navbar-expand-lg bg-light"
    	     id="homeNav">
		  <div class="container-fluid bg-danger">
		    <a class="navbar-brand" href="#">
		    	<img src="img/yavuzlar.jpg" width="40">
		    </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link fw-semibold" aria-current="page" href="home.php">Home</a>
		        </li>
                <?php
                if((isset($_SESSION['role']) == "admin")){
                ?>
				<li class="nav-item">
		          <a class="nav-link fw-semibold" href="userlist.php">User List</a>
		        </li>
                <?php
                }
                ?>
				<li class="nav-item">
		          <a class="nav-link fw-semibold" href="listlesson.php">Lessons</a>
		        </li>
				<li class="nav-item">
		          <a class="nav-link fw-semibold" href="listExam.php">Exams</a>
		        </li>
				<li class="nav-item">
		          <a class="nav-link fw-semibold" href="listClass.php">Class</a>
		        </li>
				<li class="nav-item">
		          <a class="nav-link fw-semibold" href="classesStudents.php">Classes Students</a>
		        </li>
		      </ul>
		      <ul class="navbar-nav me-right mb-2 mb-lg-0">
			  <li class="nav-item">
		          <a class="nav-link fw-bolder" href="profile.php">Profile</a>
		        </li>
		      	<li class="nav-item">
		          <a class="nav-link fw-bolder" href="app/logout.php">Logout</a>
		        </li>
		      </ul>
		  </div>
		    </div>
		</nav>