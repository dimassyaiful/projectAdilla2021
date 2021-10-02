<?php

include 'Database.class.php';

class Login
{
    private $conn;
    private $sql;
    private $statement;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function login($data)
    {
        try {
            $this->sql = "SELECT * FROM tbl_users WHERE username = '" . $data['username'] . "'";
            $this->statement = $this->conn->prepare($this->sql);
            $this->statement->execute();
            $result = $this->statement->fetch(PDO::FETCH_OBJ);
            if (password_verify($data['password'], $result->password)) {
                session_start();
                $_SESSION['username'] = $result->username;
                $_SESSION['name'] = $result->name;
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function register($data)
    {
        try {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            $this->sql = "INSERT INTO tbl_users(username,`password`,`name`) VALUES('" . $data['username'] . "','" . $data['password'] . "','" . $data['name'] . "')";
            $this->statement = $this->conn->prepare($this->sql);
            if ($this->statement->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
