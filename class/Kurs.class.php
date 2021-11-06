<?php

if (!class_exists('Database')) {
    include 'Database.class.php'; 
}

class Kurs
{

    private $conn;
    private $sql;
    private $statement;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getData()
    {
        $this->sql = "SELECT * FROM `tbl_kurs`";

        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = array();
        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)):
            $datas[] = $result;
        endwhile;
        return $datas;
    }

    
    public function getDataDetails($id)
    {
        $this->sql = "SELECT * FROM `tbl_kurs` where id = '$id'";

        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = null;
        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)):
            $datas = $result;
        endwhile;
        return $datas;
    }

    public function insertData($data)
    {
        try {
            $this->sql = "INSERT INTO `tbl_kurs`(`kode`, `kurs` ) VALUES (
               '" . $data['kode'] . "',
               '" . $data['kurs'] . "'
           )";
            $this->statement = $this->conn->prepare($this->sql);
            if ($this->statement->execute()) {
                return true;
            }

            return false;
        } catch (PDOException $e) {
            return die($e->getMessage());
        }
    }
  

    public function delete($id)
    {
        $this->sql = "delete from `tbl_kurs` where id='$id'";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        return true;
    }
 

    public function editData($data)
    {
        try {
            $this->sql = "UPDATE tbl_kurs SET 
             kode='".$data['kode']."',
             kurs='".$data['kurs']."'
             where
             id='".$data['id']."'"; 
            $this->statement = $this->conn->prepare($this->sql);
            if ($this->statement->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            return die($e->getMessage());
        }
    }
 
}
