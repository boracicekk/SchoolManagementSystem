<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
    if (isset($_POST['student_id']) && isset($_POST['class_id'])) {

        include "../../dbconnect.php";
       
        $student_id = $_POST['student_id'];
        $class_id = $_POST['class_id'];


        if (empty($class_id)) {
            $em  = "Class Name is required";
            header("Location: ../../AddclassesStudent.php?error=$em");
            exit;
       
        }else {
                $obsdb = "t_classes_students";
                $query = $conn->prepare("INSERT INTO $obsdb(student_id,class_id) VALUES (?,?)");
                $query->execute(array(
                    $student_id,
                    $class_id,

                ));

                $em  = "Success";
                header("Location: ../../classesStudents.php?error=$em");
                exit;
            
            
             
        }
    } else {
        header("Location: ../../AddclassesStudent.php");
        exit;
    }
}else{
    header("Location: ../../AddclassesStudent.php");
    exit;
}

?>