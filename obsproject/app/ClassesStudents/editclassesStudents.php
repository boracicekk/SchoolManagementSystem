<?php
session_start();
include "../../dbconnect.php";

if (isset($_SESSION['id']) && !isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
    if (isset($_POST['id'], $_POST['class_name'], $_POST['teacher_name'])) {
        $id = $_POST['id'];
        $student_id = $_POST['student_id'];
        $class_id = $_POST['class_id'];

        if (empty($student_id)) {
            $em = "student name is required";
            header("Location: ../../EditclassesStudents.php?id=$id&error=$em");
            exit;
        } elseif (empty($class_id)) {
            $em = "class name is required";
            header("Location: ../../EditclassesStudents.php?id=$id&error=$em");
            exit;
        } else {

            $query = $conn->prepare("UPDATE t_classes_students SET student_id = ?, class_id = ? WHERE id = ?");
            $query->execute([$student_id, $class_id, $id]);

            $em = "Success !!";
            header("Location: ../../classesStudents.php?id=$id&error=$em");
            exit;
        }
    } else {
        header("Location: ../../EditclassesStudents.php");
        exit;
    }
} else {
    header("Location: ../../EditclassesStudents.php");
    exit;
}
?>