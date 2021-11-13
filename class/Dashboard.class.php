<?php

include 'Database.class.php';

class Dashboard
{
    private $conn;
    private $sql;
    private $statement;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // public function GetDataChartImport()
    // {
    //     $this->sql = "SELECT COUNT(*) as `total`, MONTHNAME(i.date) as `bulan`,MONTH(i.date), `type` FROM tbl_invoices i, tbl_invoice_items it WHERE i.id= it.id_invoice and it.type = 'import' GROUP BY MONTH(i.date) ASC";
    //     $this->statement = $this->conn->prepare($this->sql);
    //     $this->statement->execute();
    //     $datas = array();

    //     while ($result = $this->statement->fetch(PDO::FETCH_OBJ)) :
    //         $datas[] = $result;
    //     endwhile;
    //     return $datas;
    // }

    // public function GetDataChartExport()
    // {
    //     $this->sql = "SELECT COUNT(*) as `total`, MONTHNAME(i.date) as `bulan`,MONTH(i.date), `type` FROM tbl_invoices i, tbl_invoice_items it WHERE i.id= it.id_invoice and it.type = 'export' GROUP BY MONTH(i.date) ASC";
    //     $this->statement = $this->conn->prepare($this->sql);
    //     $this->statement->execute();
    //     $datas = array();

    //     while ($result = $this->statement->fetch(PDO::FETCH_OBJ)) :
    //         $datas[] = $result;
    //     endwhile;
    //     return $datas;
    // }


    public function GetDataChartImport()
    {
        $this->sql = "SELECT COUNT(*) as `total`, MONTHNAME(`dateOfPib`) as `bulan`,MONTH(`dateOfPib`) FROM tbl_import GROUP BY MONTH(`dateOfPib`) ASC";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = array();

        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)) :
            $datas[] = $result;
        endwhile;
        return $datas;
    }


    public function GetDataChartExport()
    {
        $this->sql = "SELECT COUNT(*) as `total`, MONTHNAME(`dateOfPib`) as `bulan`,MONTH(`dateOfPib`) FROM tbl_export GROUP BY MONTH(`dateOfPib`) ASC";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = array();

        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)) :
            $datas[] = $result;
        endwhile;
        return $datas;
    }
 
}
