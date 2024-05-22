<?php
session_start();
include '../core/functions.php';
include '../core/validations.php';
include '../data/Database.php';
$errors = [];

if (checkRequestMethod("POST")) {
    foreach ($_POST as $key => $value) {
        $$key = sanitizeInput($value);
    }

    // Validation For Email : Required , email
    if (requiredVal($email)) {
        $errors[] =  "Email is reqired";
    } elseif (emailVal($email)) {
        $errors[] = "Enter Vaild Email";
    }

    // Validation For Password : Required , 6 < length < 12
    if (requiredVal($password)) {
        $errors[] =  "Password is reqired";
    } elseif (minLength($password, 6)) {
        $errors[] = "Password Must Be More Than  6 Letters";
    } elseif (maxLength($password, 12)) {
        $errors[] = "Password Must Be Less Than  12 Letters";
    }

    if (empty($errors)) {

        $db = new Database();
        $newPassword = $db->encPassword($password);
        $user = $db->findData("users", $email, $newPassword);
        if (isset($user)) {
            $_SESSION['userInfo'] = ['name' => $user["name"], 'email' => $email, 'password' => $newPassword];
            redirectPath("../profile.php");
        } else {
            $errors[] = "User Not Found";
            $_SESSION['errors'] = $errors;
            redirectPath("../login.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['user'] = ['email' => $email, 'password' => $password];
        redirectPath("../login.php");
    }
} else {
    echo "Not Allowed Request Method";
}
