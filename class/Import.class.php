<?php

include 'Database.class.php';

class Import
{

    private $conn;
    private $sql;
    private $statement;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getDataImport($startDate, $endDate)
    {
        $this->sql = "SELECT * FROM `tbl_import` where dateOfPib >= '$startDate' and dateOfPib <= '$endDate'"; 
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = array();
        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)):
            $datas[] = $result;
        endwhile;
        return $datas;
    }

    
    public function getDataImportDetails($id)
    {
        $this->sql = "SELECT * FROM `tbl_import` where id = '$id'";

        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = null;
        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)):
            $datas = $result;
        endwhile;
        return $datas;
    }

    public function insertDataImprot($data)
    { 
        try {
            $this->sql = "INSERT INTO `tbl_importtemp`(`dateOfPib`, `docNo`, `docType`, `noPengajuanDokumen`, `blNo`, `vesselName`,
            `shipper`, `remark`, `valuta`, `kurs`, `value`, `valueIdr` ) VALUES (
               '" . $data['dateOfPib'] . "',
               '" . $data['docNo'] . "',
               '" . $data['docType'] . "',
               '" . $data['noPengajuanDokumen'] . "',
               '" . $data['blNo'] . "',
               '" . $data['vesselName'] . "',
               '" . $data['shipper'] . "',
               '" . $data['remark'] . "',
               '" . $data['valuta'] . "',
               '" . $data['kurs'] . "',
               '" . $data['value'] . "',
               '" . $data['valueIdr'] . "' 
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

    public function getDataImportTemp()
    {
        $this->sql = "SELECT * FROM `tbl_importtemp`";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = array();
        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)):
            $datas[] = $result;
        endwhile;
        return $datas;
    }

    public function refreshImportTemp()
    {
        $this->sql = "delete from `tbl_importtemp`";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        return true;
    }

    public function deleteImport($id)
    {
        $this->sql = "delete from `tbl_import` where id='$id'";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        return true;
    }

    public function saveDataImport($data)
    { 
        try {   
                $this->sql = "INSERT INTO tbl_import( `fromto`,`dateOfPib`,`docNo`,`docType`,`noPengajuanDokumen`,`blNo`,`vesselName`,`shipper`,`remark`,`valuta`,`value`,`valueIdr`,`kurs` ) SELECT '" . $data . "',dateOfPib,docNo,docType,noPengajuanDokumen,blNo,vesselName,shipper,remark,valuta,`value`,`valueIdr`,`kurs`  FROM tbl_importtemp";
                $this->statement = $this->conn->prepare($this->sql);
                if ($this->statement->execute()) {
                    $this->sql = "DELETE FROM tbl_importtemp";
                    $this->statement = $this->conn->prepare($this->sql);
                    if ($this->statement->execute()) {
                        return true;
                    } 
                    return false;
                }
                return false; 
        } catch (PDOException $e) {
            return die($e->getMessage());
        }
    }

    public function editDataImport($data)
    {
        try {
            $this->sql = "UPDATE tbl_import SET  
             docNo='".$data['docNo']."',
             fromto='".$data['fromto']."',
             docType='".$data['docType']."',
             noPengajuanDokumen='".$data['noPengajuanDokumen']."',
             blNo='".$data['blNo']."',
             vesselName='".$data['vesselName']."',
             shipper='".$data['shipper']."',
             remark='".$data['remark']."',
             valuta='".$data['valuta']."',
             kurs='".$data['kurs']."',
             value='".$data['value']."',
             valueIdr='".$data['valueIdr']."' 
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
