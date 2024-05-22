<?php
session_start();
include '../core/functions.php';
include '../core/validations.php';
include '../data/Database.php';
$errors = [];

if (checkRequestMethod("POST")) {

    foreach ($_POST as $key => $value) {
        $$key = sanitizeInput($value);
        // echo $key . "<br>";                  //To Print Key
        // echo $$key . "<br>";                    //To Print Value
    }

    // Validation For Name : Required , 3 < length < 25
    if (requiredVal($name)) {
        $errors['name'] =  "* Name is reqired";
    } elseif (minLength($name, 3)) {
        $errors['name'] = "* Name Must Be More Than OR Equal  3 Letters";
    } elseif (maxLength($name, 25)) {
        $errors['name'] = "* Name Must Be Less Than  25 Letters";
    }

    // Validation For Email : Required , email
    if (requiredVal($email)) {
        $errors['email'] =  "* Email is reqired";
    } elseif (emailVal($email)) {
        $errors['email'] = "* Enter Vaild Email";
    }

    // Validation For Password : Required , 6 < length < 12
    if (requiredVal($password)) {
        $errors['password'] =  "* Password is reqired";
    } elseif (minLength($password, 6)) {
        $errors['password'] = "* Password Must Be More Than  6 Letters";
    } elseif (maxLength($password, 12)) {
        $errors['password'] = "* Password Must Be Less Than  12 Letters";
    }

    if (empty($errors)) {

        $db = new Database();
        $newPassword = $db->encPassword($password);

        $user = $db->readData('users', $email);
        if (empty($user)) {
            $sql =  "INSERT INTO users(`name`,`email`,`password`) 
                VALUES('$name','$email','$newPassword')";
            $db->insertData($sql);
            $_SESSION['userInfo'] = ['name' => $name, 'email' => $email, 'password' => $newPassword];
            redirectPath("../profile.php");
        } else {
            $_SESSION['userExisit'] = "User Already Exists ! ";
            redirectPath("../register.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['user'] = ['name' => $name, 'email' => $email, 'password' => $password];
        redirectPath("../register.php");
    }
} else {
    echo "Not Allowed Request Method";
}
