<?php
session_start();
include "dbconnect.php";
if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
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
    <div class="container-plus">
       
        <div class="row d-flex justify-content-center align-items-center flex-column">
            <div class="col-md-8 bg-info mt-5">
                <div class="text-center bg-danger">
                    <h1>OBS sistemine</h1>
                    <h2>Hoşgeldiniz!</h2>
                    <?php
                    foreach($users as $user){
                    if($_SESSION['id']===$user["id"]){

                    
                    ?>
                    <h5>Name: <?php echo $user["name"]; ?></h5>
                    <h5>Surname: <?php echo $user["surname"]; ?></h5>
                    <h5>Role: <?php echo $user["role"]; ?></h5>
                    <h5>Username: <?php echo $user["username"]; ?></h5>
                    <?php
                    }
                    }
                    ?>
                </div>
                <div class="d-flex">
                <a class="btn btn-primary p-2 flex-fill" href="home.php" role="button">Home</a> 
                <a class="btn btn-secondary p-2 flex-fill" href="changepassword.php" role="button">Change Password</a>
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