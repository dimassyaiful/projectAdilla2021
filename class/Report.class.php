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
            $this->sql = "SELECT * FROM tbl_invoices as i JOIN (SELECT * FROM tbl_import  where dateOfPib >= '$startDate' and dateOfPib <= '$endDate' UNION SELECT * FROM tbl_export  where dateOfPib >= '$startDate' and dateOfPib <= '$endDate' ) as ie ON i.id = ie.idInvoices";
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
