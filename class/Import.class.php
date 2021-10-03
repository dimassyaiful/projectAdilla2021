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

    public function getDataImport()
    {
        $this->sql = "SELECT * FROM `tbl_import`";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = array();
        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)):
            $datas[] = $result;
        endwhile;
        return $datas;
    }

    public function insertDataImprot($data)
    {
        try {
            $this->sql = "INSERT INTO `tbl_importTemp`(`dateOfPib`, `docNo`, `docType`, `noPengajuanDokumen`, `blNo`, `vesselName`,
            `shipper`, `remark`, `valuta`, `value`, `valueIdr`,`qty`) VALUES (
               '" . $data['dateOfPib'] . "',
               '" . $data['docNo'] . "',
               '" . $data['docType'] . "',
               '" . $data['noPengajuanDokumen'] . "',
               '" . $data['blNo'] . "',
               '" . $data['vesselName'] . "',
               '" . $data['shipper'] . "',
               '" . $data['remark'] . "',
               '" . $data['valuta'] . "',
               '" . $data['value'] . "',
               '" . $data['valueIdr'] . "',
               '" . $data['qty'] . "'
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

    public function saveDataImport($data)
    {
        try {
            $this->sql = "SELECT * FROM `tbl_invoices` ORDER BY `id` DESC LIMIT 1";
            $this->statement = $this->conn->prepare($this->sql);
            if ($this->statement->execute()) {
                $result = $this->statement->fetch(PDO::FETCH_OBJ);
                if (is_object($result)) {
                    $id = $result->id;
                    $id = explode("-", $id);
                    $id = str_pad($id[1] + 1, 8, '0', STR_PAD_LEFT);
                    $id = "inv-" . $id;
                } else {
                    $id = "inv-00000001";
                }
                $idInvoices = $id;
                $fromto = $data;
                $date = date('Y-m-d');
                $this->sql = "INSERT INTO `tbl_invoices`(`id`, `date`, `type`, `fromto`) VALUES ('" . $idInvoices . "','" . $date . "','Import','" . $fromto . "')";
                $this->statement = $this->conn->prepare($this->sql);
                if ($this->statement->execute()) {
                    $this->sql = "INSERT INTO tbl_import(`idInvoices`,`dateOfPib`,`docNo`,`docType`,`noPengajuanDokumen`,`blNo`,`vesselName`,`shipper`,`remark`,`valuta`,`value`,`valueIdr`,`qty`) SELECT '" . $idInvoices . "',dateOfPib,docNo,docType,noPengajuanDokumen,blNo,vesselName,shipper,remark,valuta,`value`,`valueIdr`,`qty` FROM tbl_importtemp";
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
                }
                return false;
            }
            return false;
        } catch (PDOException $e) {
            return die($e->getMessage());
        }
    }
}
