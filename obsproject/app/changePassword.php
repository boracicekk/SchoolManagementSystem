<?php
session_start();

if (isset($_SESSION['id'])) {
    include "../dbconnect.php";

    if (isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $user_id = $_SESSION['id'];
    
        $obsdb = "t_users";
        $select_sql = "SELECT * FROM $obsdb WHERE id = ?";
        $select_stmt = $conn->prepare($select_sql);
        $select_stmt->execute([$user_id]);
        $user = $select_stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $storedPassword = $user['password'];

            if (password_verify($current_password, $storedPassword)) {
                if ($new_password == $confirm_password) {
                    $hashedPassword = password_hash($new_password, PASSWORD_ARGON2ID);
                    $update_sql = "UPDATE $obsdb SET password = ? WHERE id = ?";
                    $update_stmt = $conn->prepare($update_sql);
                    $update_stmt->execute([$hashedPassword, $user_id]);

                    header("Location: ../home.php?success=Password changed successfully");
                    exit;
                } else {
                    $em = "New passwords do not match. Please try again!";
                    header("Location: ../changePassword.php?error=$em");
                    exit;
                }
            } else {
                $em = "Current password is incorrect. Please try again!";
                header("Location: ../changePassword.php?error=$em");
                exit;
            }
        } else {
            $em = "User not found. Please try again!";
            header("Location: ../changePassword.php?error=$em");
            exit;
        }
    } else {
        header("Location: ../changePassword.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>
