<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
    if (isset($_POST['class_name']) && isset($_POST['teacher_name'])) {

        include "../../dbconnect.php";
       
        $class_name = $_POST['class_name'];
        $teacher_name = $_POST['teacher_name'];

        if (empty($class_name)) {
            $em  = "Class Name is required";
            header("Location: ../../AddClass.php?error=$em");
            exit;
       
        }else {
                $obsdb = "t_classes";
                $query = $conn->prepare("INSERT INTO $obsdb(class_teacher_id,class_name) VALUES (?,?)");
                $query->execute(array(
                    $teacher_name,
                    $class_name,

                ));

                $em  = "Success";
                header("Location: ../../listClass.php?error=$em");
                exit;
            
            
             
        }
    } else {
        header("Location: ../../AddClass.php");
        exit;
    }
}else{
    header("Location: ../../AddClass.php");
    exit;
}

?>