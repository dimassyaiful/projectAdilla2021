<?php

include 'Database.class.php';

class Export
{

    private $conn;
    private $sql;
    private $statement;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getDataExport($startDate, $endDate)
    {
        $this->sql = "SELECT * FROM `tbl_export` where dateOfPib >= '$startDate' and dateOfPib <= '$endDate'";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = array();
        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)):
            $datas[] = $result;
        endwhile;
        return $datas;
    }

    public function getDataExportDetails($id)
    {
        $this->sql = "SELECT * FROM `tbl_export` where id = '$id'";

        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = null;
        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)):
            $datas = $result;
        endwhile;
        return $datas;
    }

    public function refreshExportTemp()
    {
        $this->sql = "delete from `tbl_exporttemp`";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        return true;
    }

    public function insertDataExprot($data)
    {
        try {
            $this->sql = "INSERT INTO `tbl_exporttemp`( `dateOfPib`, `docNo`, `docType`, `noPengajuanDokumen`, `blNo`, `vesselName`,
            `consignee`, `remark`, `valuta`, `kurs`, `value`, `valueIdr` ) VALUES (
               '" . $data['dateOfPib'] . "',
               '" . $data['docNo'] . "',
               '" . $data['docType'] . "',
               '" . $data['noPengajuanDokumen'] . "',
               '" . $data['blNo'] . "',
               '" . $data['vesselName'] . "',
               '" . $data['consignee'] . "',
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

    public function getDataExportTemp()
    {
        $this->sql = "SELECT * FROM `tbl_exporttemp`";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = array();
        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)):
            $datas[] = $result;
        endwhile;
        return $datas;
    }

    public function saveDataExport($data)
    {
        try {  
            $this->sql = "INSERT INTO tbl_export(`fromto`,`dateOfPib`,`docNo`,`docType`,`noPengajuanDokumen`,`blNo`,`vesselName`,`consignee`,`remark`,`valuta`,`kurs`,`value`,`valueIdr` ) SELECT '" . $data . "',dateOfPib,docNo,docType,noPengajuanDokumen,blNo,vesselName,consignee,remark,valuta,`kurs`,`value`,`valueIdr`  FROM tbl_exporttemp";
            $this->statement = $this->conn->prepare($this->sql);
            if ($this->statement->execute()) {
                $this->sql = "DELETE FROM tbl_exporttemp";
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

    public function deleteExport($id)
    {
        $this->sql = "delete from `tbl_export` where id='$id'";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        return true;
    }

    public function editDataExport($data)
    {
        try {
            $this->sql = "UPDATE tbl_export SET 
             fromto='".$data['fromto']."',
             dateOfPib='".$data['dateOfPib']."',
             docNo='".$data['docNo']."',
             docType='".$data['docType']."',
             noPengajuanDokumen='".$data['noPengajuanDokumen']."',
             blNo='".$data['blNo']."',
             vesselName='".$data['vesselName']."',
             consignee='".$data['consignee']."',
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
