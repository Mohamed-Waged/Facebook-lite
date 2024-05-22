<?php

class Database
{

    private $dsn = "mysql:host=localhost;dbname=users_info";
    private $user = 'root';
    private $password = '';
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
            // // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Failed : " . $e->getMessage();
        }
    }

    // Insert New Record In DB
    public function insertData($sql)
    {
        if ($this->conn->query($sql)) {
            echo "Added Success ";
        } else {
            echo "SQl Error : ";
        }
    }

    // Read Data From DB
    public function readData($table, $email)
    {
        $sql = "SELECT `name` , `email` ,`password` FROM $table WHERE  `email`='$email'";
        $result = $this->conn->query($sql);
        $data = array();

        if ($result) {
            if ($result->rowCount()) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $data[] = $row;
                }
            }
            return $data;
        } else {
            echo "SQl Error : ";
        }
    }


    // Get Data Of Specific Item 
    public function findData($table, $email, $password)
    {
        $sql = "SELECT * FROM $table WHERE `email`='$email' AND `password`='$password'";
        $result = $this->conn->query($sql);
        if ($result) {
            if ($result->rowCount() > 0) {
                return $result->fetch(PDO::FETCH_ASSOC);
            } else {
                echo "No Data Found <br>";
            }
        } else {
            echo "SQl Error : ";
        }
    }


    // Encript Password
    public function encPassword($pass)
    {
        return base64_encode($pass);
    }

    // Decript Password
    public function decPassword($pass)
    {
        return base64_decode($pass);
    }
}
