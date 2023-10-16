<?php
session_start();
include "../../dbconnect.php";

if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
    if (isset($_POST['id'], $_POST['class_name'], $_POST['teacher_name'])) {
        $id = $_POST['id'];
        $class_name = $_POST['class_name'];
        $teacher_name = $_POST['teacher_name'];


        if (empty($class_name)) {
            $em = "Class name is required";
            header("Location: ../../EditClass.php?id=$id&error=$em");
            exit;
        } elseif (empty($teacher_name)) {
            $em = "Teacher name is required";
            header("Location: ../../EditClass.php?id=$id&error=$em");
            exit;
        } else {

            $query = $conn->prepare("UPDATE t_classes SET class_name = ?, class_teacher_id = ? WHERE id = ?");
            $query->execute([$class_name, $teacher_name, $id]);

            $em = "Success !!";
            header("Location: ../../listClass.php?id=$id&error=$em");
            exit;
        }
    } else {
        header("Location: ../../EditClass.php");
        exit;
    }
} else {
    header("Location: ../../EditClass.php");
    exit;
}
?>