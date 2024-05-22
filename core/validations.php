<?php

    function requiredVal($input){
        if(empty($input)){
            return true ; 
        }
        return false ;
    }

    function minLength($input , $length) {
        if(strlen($input) < $length){
            return true ;
        }
        return false ;
    }

    function maxLength($input , $length) {
        if(strlen($input) > $length){
            return true ;
        }
        return false ;
    }

    // Validation For Email
    function emailVal($input){
        if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
            return true ;
        }
        return false ;
        
    }