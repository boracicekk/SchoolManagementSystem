<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
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
                <?php
                include("include/navbar.php");
                ?>
                <div class="center-plus d-flex justify-content-center align-items-center">
                <h1 class="mr-4">OBS sistemine</h1>
                <h2 class="ml-4">Hoşgeldiniz!</h2>
                
                </div>
    </div>
</body>
</html>
<?php }else {
	header("Location: login.php");
	exit;
}?>