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

    public function GetDataChartImport()
    {
        $this->sql = "SELECT COUNT(*) as `total`, MONTHNAME(`date`) as `bulan`,MONTH(`date`), `type` FROM tbl_invoices WHERE `type` = 'Import' GROUP BY MONTH(`date`) ASC";
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
        $this->sql = "SELECT COUNT(*) as `total`, MONTHNAME(`date`) as `bulan`,MONTH(`date`), `type` FROM tbl_invoices WHERE `type` = 'Export' GROUP BY MONTH(`date`) ASC";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = array();

        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)) :
            $datas[] = $result;
        endwhile;
        return $datas;
    }
}
