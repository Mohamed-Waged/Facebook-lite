<?php

    function checkRequestMethod($method){
        if($_SERVER['REQUEST_METHOD'] == $method){
            return true;
        }
        return false ;
    }

    function sanitizeInput($input){
        return trim(htmlspecialchars(htmlentities($input))) ;
    }

    function redirectPath($path) {
        header("location:$path");
        exit();
    }
