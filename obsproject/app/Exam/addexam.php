<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['role']) && ($_SESSION['role'] == "admin" || $_SESSION['role'] == "teacher") ){
    if (isset($_POST['student_id']) && isset($_POST['lesson_id']) && isset($_POST['exam_score'])) {

        include "../../dbconnect.php";
       
        $student_id = $_POST['student_id'];
        $lesson_id = $_POST['lesson_id'];
        $exam_score = $_POST['exam_score'];
        


        foreach ($ClassesStudents as $studentClass){
            if($studentClass['student_id'] == $student_id ){
                $class_id = $studentClass['class_id'];
                break;
            }
        }

       
        if (empty($student_id)) {
            $em  = "Student name is required";
            header("Location: ../../addExamIndex.php?error=$em");
            exit;
        } else if (empty($lesson_id)) {
            $em  = "Lesson  is required";
            header("Location: ../../addExamIndex.php?error=$em");
            exit;
        }else if (empty($exam_score)) {
            $em  = "Exam score is required";
            header("Location: ../../addExamIndex.php?error=$em");
            exit;
        }else if (empty($class_id)) {
            $em  = "This student not has a class";
            header("Location: ../../addExamIndex.php?error=$em");
            exit;
        }else {
    
            
                $school = "t_exams";
                $query = $conn->prepare("INSERT INTO $school(student_id, class_id, lesson_id, exam_score) VALUES (?, ?, ?, ?)");
                $query->execute(array(
                    $student_id,
                    $class_id,
                    $lesson_id,
                    $exam_score,

                ));

                $em  = "Success";
                header("Location: ../../listExam.php?error=$em");
                exit;
            
            
        }
    } else {
        header("Location: ../../Addexam.php");
        exit;
    }
}else{
    header("Location: ../../Addexam.php");
        exit;
}
?>