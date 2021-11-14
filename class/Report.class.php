<?php

include 'Database.class.php';

class Report
{

    private $conn;
    private $sql;
    private $statement;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getData($startDate, $endDate)
    {
        try {
            $this->sql = "SELECT *, 'Import' as type FROM tbl_import  where dateOfPib >= '$startDate' and dateOfPib <= '$endDate' UNION SELECT *, 'Export' as type FROM tbl_export  where dateOfPib >= '$startDate' and dateOfPib <= '$endDate'";
            $this->statement = $this->conn->prepare($this->sql);
            if (!$this->statement->execute()) return false;
            $results = array();
            while ($res = $this->statement->fetchObject()) :
                $results[] = $res;
            endwhile;
            return $results;
        } catch (PDOException $e) {
            return die($e->getMessage());
        }
    }
}
