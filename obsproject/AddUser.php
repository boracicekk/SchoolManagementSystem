<?php
session_start();
include "dbconnect.php";
if (isset($_SESSION['id']) && isset($_SESSION['role']) && (isset($_SESSION['role'])=="admin")) {
    $usersTable = "t_users";
	$obsdb = $conn->prepare("SELECT * FROM $usersTable ORDER BY id DESC");
	$obsdb->execute();
	$users = $obsdb->fetchAll(PDO::FETCH_ASSOC);
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
                <form class="login" action="app/user/addUser.php" method="POST">
    		<div class="text-center">
    			<img src="img/yavuzlar.jpg"
    			     width="100">
    		</div>
    		<h3>ADD USER</h3>
			
			<?php if (isset($_GET['error'])) { ?>
    		<div class="alert alert-info" role="alert">
			  <?=$_GET['error']?>
			</div>
			<?php } ?>

       
		  <div class="mb-3">
		    <label class="form-label">Name</label>
		    <input type="text" class="form-control" name="name" required>
		  </div>

          <div class="mb-3">
		    <label class="form-label">Surname</label>
		    <input type="text" class="form-control" name="surname" required>
		  </div>
		  
          <div class="mb-3">
		    <label class="form-label">Username</label>
		    <input type="text" class="form-control" name="username" required>
		  </div>
		  
		  
		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="text" class="form-control" name="pass" required>
		  </div>
		  
          <div class="mb-3">
		    <label class="form-label">Role</label>
		    <select class="form-control" name="role">
                <option value="0">Choose</option>
		    	<option value="1">Admin</option>
		    	<option value="2">Student</option>
		    	<option value="3">Teacher</option>
		    </select>
		  </div>


		  <button type="submit" class="btn btn-primary">Add</button>
		  <a href="home.php" class="btn btn-secondary" role="button" >Home</a>
		</form>
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
