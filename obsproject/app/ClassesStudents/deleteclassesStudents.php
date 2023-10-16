<?php

include "../../dbconnect.php";
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== "admin") {
    $em = "Warning";
    header("Location: ../../classesStudents.php?error=$em");
    exit;
}

if(isset($_GET['id'])){

    try {
        $id = $_GET['id'];
        $usersTable = "t_classes_students";

        
        $query = $conn->prepare("DELETE FROM $usersTable WHERE id = ?");
        $query->execute([$id]);

        header("Location: ../../classesStudents.php");
        exit;
    } catch (PDOException $e) {
        
        $error_message = "Error deleting user: " . $e->getMessage();
        echo $error_message;
    }
    
} else {
    echo "Get data is missing.";
    print_r($_GET);
}

?>