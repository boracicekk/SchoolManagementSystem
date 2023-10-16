<?php
session_start();
include "../../dbconnect.php";

if (isset($_SESSION['id']) && isset($_SESSION['role']) && ($_SESSION['role'] == "admin" || $_SESSION['role'] == "teacher") ) {
    if (isset($_POST['id'], $_POST['exam_score'])) {
        $id = $_POST['id'];
        $exam_score = $_POST['exam_score'];
        
      

        if (empty($exam_score)) {
            $em = "Exam score is required";
            header("Location: ../../EditExam.php?id=$id&error=$em");
            exit;
        } else {

            $query = $conn->prepare("UPDATE t_exams SET exam_score = ?  WHERE id = ?");
            $query->execute([$exam_score, $id]);

            $em = "Success !!";
            header("Location: ../../listExam.php?id=$id&error=$em");
            exit;
        }
    } else {
        header("Location: ../../EditExam.php");
        exit;
    }
} else {
    header("Location: ../../EditExam.php");
    exit;
}
?>
