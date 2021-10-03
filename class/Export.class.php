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

    public function getDataExport()
    {
        $this->sql = "SELECT * FROM `tbl_export`";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = array();
        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)):
            $datas[] = $result;
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
            $this->sql = "INSERT INTO `tbl_exporttemp`(`dateOfPib`, `docNo`, `docType`, `noPengajuanDokumen`, `blNo`, `vesselName`,
            `consignee`, `remark`, `valuta`, `value`, `valueIdr`,`qty`) VALUES (
               '" . $data['dateOfPib'] . "',
               '" . $data['docNo'] . "',
               '" . $data['docType'] . "',
               '" . $data['noPengajuanDokumen'] . "',
               '" . $data['blNo'] . "',
               '" . $data['vesselName'] . "',
               '" . $data['consignee'] . "',
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
                $this->sql = "INSERT INTO `tbl_invoices`(`id`, `date`, `type`, `fromto`) VALUES ('" . $idInvoices . "','" . $date . "','Export','" . $fromto . "')";
                $this->statement = $this->conn->prepare($this->sql);
                if ($this->statement->execute()) {
                    $this->sql = "INSERT INTO tbl_export(`idInvoices`,`dateOfPib`,`docNo`,`docType`,`noPengajuanDokumen`,`blNo`,`vesselName`,`consignee`,`remark`,`valuta`,`value`,`valueIdr`,`qty`) SELECT '" . $idInvoices . "',dateOfPib,docNo,docType,noPengajuanDokumen,blNo,vesselName,consignee,remark,valuta,`value`,`valueIdr`,`qty` FROM tbl_exporttemp";
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
                }
                return false;
            }
            return false;
        } catch (PDOException $e) {
            return die($e->getMessage());
        }
    }
}
