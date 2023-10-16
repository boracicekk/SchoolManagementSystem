<?php

$sName = "db";
$uName = "admin";
$pass = "admin";
$db_name = "obsdb";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
exit;
    }
    $usersTable = "t_users";
	$obsdb = $conn->prepare("SELECT * FROM $usersTable ORDER BY id DESC");
	$obsdb->execute();
	$users = $obsdb->fetchAll(PDO::FETCH_ASSOC);

    $usersTable = "t_lessons";
	$obsdb = $conn->prepare("SELECT * FROM $usersTable ORDER BY id DESC");
	$obsdb->execute();
	$lessons = $obsdb->fetchAll(PDO::FETCH_ASSOC);

    $usersTable = "t_exams";
	$obsdb = $conn->prepare("SELECT * FROM $usersTable ORDER BY id DESC");
	$obsdb->execute();
	$exams = $obsdb->fetchAll(PDO::FETCH_ASSOC);

    $usersTable = "t_classes_students";
	$obsdb = $conn->prepare("SELECT * FROM $usersTable ORDER BY id DESC");
	$obsdb->execute();
	$ClassesStudents = $obsdb->fetchAll(PDO::FETCH_ASSOC);

    $usersTable = "t_classes";
	$obsdb = $conn->prepare("SELECT * FROM $usersTable ORDER BY id DESC");
	$obsdb->execute();
	$classes = $obsdb->fetchAll(PDO::FETCH_ASSOC);
    ?>