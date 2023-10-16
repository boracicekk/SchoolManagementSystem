<?php
session_start();
include "../../dbconnect.php";

if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] === "admin") {
    if (isset($_POST['id'], $_POST['lesson_name'], $_POST['teacher_name'])) {
        $id = $_POST['id'];
        $lesson_name = $_POST['lesson_name'];
        $teacher_name = $_POST['teacher_name'];


        if (empty($lesson_name)) {
            $em = "Lesson name is required";
            header("Location: ../../EditLesson.php?id=$id&error=$em");
            exit;
        } elseif (empty($teacher_name)) {
            $em = "Teacher name is required";
            header("Location: ../../EditLesson.php?id=$id&error=$em");
            exit;
        } else {

            $query = $conn->prepare("UPDATE t_lessons SET lesson_name = ?, teacher_user_id = ? WHERE id = ?");
            $query->execute([$lesson_name, $teacher_name, $id]);

            $em = "Success !!";
            header("Location: ../../listlesson.php?id=$id&error=$em");
            exit;
        }
    } else {
        header("Location: ../../EditLesson.php");
        exit;
    }
} else {
    header("Location: ../../EditLesson.php");
    exit;
}
?>