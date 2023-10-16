<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
    if (isset($_POST['lesson_name']) && isset($_POST['teacher_name'])) {

        include "../../dbconnect.php";
       
        $lesson_name = $_POST['lesson_name'];
        $teacher_name = $_POST['teacher_name'];

        if (empty($lesson_name)) {
            $em  = "Lesson Name is required";
            header("Location: ../../AddLesson.php?error=$em");
            exit;
       
        }else {
                $obsdb = "t_lessons";
                $query = $conn->prepare("INSERT INTO $obsdb(teacher_user_id,lesson_name) VALUES (?,?)");
                $query->execute(array(
                    $teacher_name,
                    $lesson_name,

                ));

                $em  = "Success";
                header("Location: ../../listlesson.php?error=$em");
                exit;
            
            
             
        }
    } else {
        header("Location: ../../Addlesson.php");
        exit;
    }
}else{
    header("Location: ../../Addlesson.php");
    exit;
}

?>