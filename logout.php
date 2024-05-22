<?php

    session_start();
    include 'core/functions.php';

    session_destroy();
    redirectPath("login.php");