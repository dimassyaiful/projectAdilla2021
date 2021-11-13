<?php

class Database
{
    private $host;
    private $username;
    private $password;
    private $db;
    private $conn;

    public function __construct()
    {
        $this->host = "intonasikopi.com";
        $this->username = "u1555875_aldilla";
        $this->password = "SuksesBerkah2021";
        $this->db = "u1555875_aldilla";

        // $this->host = "localhost";
        // $this->username = "root";
        // $this->password = "";
        // $this->db = "aldilla";
    }

    public function getConnection()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }
}
