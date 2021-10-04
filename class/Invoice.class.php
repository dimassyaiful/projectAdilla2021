<?php

include 'Database.class.php';

class Invoice
{
    private $conn;
    private $sql;
    private $statement;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getDataInvoice($startDate, $endDate)
    {
        $this->sql = "SELECT * FROM view_invoices where date >= '$startDate' and date <= '$endDate'";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = array();
        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)) :
            $datas[] = $result;
        endwhile;
        return $datas;
    }

    public function getDetailInvoice($data)
    {
        $type = $data['type'];
        if ($type == 'Import') {
            $this->sql = "SELECT * FROM tbl_import WHERE idInvoices = '" . $data['id'] . "'";
        } elseif ($type == 'Export') {
            $this->sql = "SELECT * FROM tbl_export WHERE idInvoices = '" . $data['id'] . "'";
        }
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas = array();
        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)) :
            $datas[] = $result;
        endwhile;
        return $datas;
    }

    public function addInvoice($data)
    {
        try {
            $this->sql = "SELECT `id` from tbl_invoices ORDER BY `id` DESC LIMIT 1";
            $this->statement = $this->conn->prepare($this->sql);
            $this->statement->execute();
            $result = $this->statement->fetch(PDO::FETCH_OBJ);
            if (is_object($result)) {
                $id = $result->id;
                $id = explode("-", $id);
                $id = str_pad(intval($id[1]) + 1, 8, '0', STR_PAD_LEFT);
                $id = "inv-" . $id;
                $this->sql = "INSERT INTO tbl_invoices(`id`,`date`,`type`,`fromto`) VALUES('" . $id . "','" . $data['date'] . "','" . $data['type'] . "','" . $data['fromto'] . "')";
                $this->statement = $this->conn->prepare($this->sql);
                if ($this->statement->execute()) {
                    $datares['id'] = $id;
                    $datares['type'] = $data['type'];
                    return $datares;
                } else {
                    return false;
                }
            } else {
                $id = "inv-00000001";
                $this->sql = "INSERT INTO tbl_invoices(`id`,`date`,`type`,`fromto`) VALUES('" . $id . "','" . $data['date'] . "','" . $data['type'] . "','" . $data['fromto'] . "')";
                $this->statement = $this->conn->prepare($this->sql);
                if ($this->statement->execute()) {
                    $datares['id'] = $id;
                    $datares['type'] = $data['type'];
                    return $datares;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addImport($data)
    {
        try {
            $this->sql = "INSERT INTO `tbl_import`(
                `idInvoices`,
                 `dateOfPib`,
                 `docNo`,
                 `docType`,
                 `noPengajuanDokumen`,
                 `blNo`,
                 `vesselName`,
                 `shipper`,
                 `remark`,
                 `valuta`,
                 `value`,
                 `valueIdr`,
                 `qty`
                 ) VALUES (
                    '" . $data['invoiceId'] . "',
                    '" . $data['dateOfPib'] . "',
                    '" . $data['docNo'] . "',
                    '" . $data['docType'] . "',
                    '" . $data['noPengajuanDokumen'] . "',
                    '" . $data['blNo'] . "',
                    '" . $data['vesselName'] . "',
                    '" . $data['shipper'] . "',
                    '" . $data['remark'] . "',
                    '" . $data['valuta'] . "',
                    '" . $data['valueInp'] . "',
                    '" . $data['valueIdr'] . "',
                    '" . $data['qty'] . "'
                )";
            $this->statement = $this->conn->prepare($this->sql);
            if ($this->statement->execute()) {
                $this->sql = "SELECT * FROM tbl_import WHERE idInvoices = '" . $data['invoiceId'] . "'";
                $this->statement = $this->conn->prepare($this->sql);
                if ($this->statement->execute()) {
                    $datas = array();
                    while ($result = $this->statement->fetch(PDO::FETCH_OBJ)) :
                        $datas[] = $result;
                    endwhile;
                    return $datas;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addExport($data)
    {
        try {
            $this->sql = "INSERT INTO `tbl_export`(
                `idInvoices`,
                 `dateOfPib`,
                 `docNo`,
                 `docType`,
                 `noPengajuanDokumen`,
                 `blNo`,
                 `vesselName`,
                 `consignee`,
                 `remark`,
                 `valuta`,
                 `value`,
                 `valueIdr`,
                 `qty`
                 ) VALUES (
                    '" . $data['invoiceId'] . "',
                    '" . $data['dateOfPib'] . "',
                    '" . $data['docNo'] . "',
                    '" . $data['docType'] . "',
                    '" . $data['noPengajuanDokumen'] . "',
                    '" . $data['blNo'] . "',
                    '" . $data['vesselName'] . "',
                    '" . $data['consignee'] . "',
                    '" . $data['remark'] . "',
                    '" . $data['valuta'] . "',
                    '" . $data['valueInp'] . "',
                    '" . $data['valueIdr'] . "',
                    '" . $data['qty'] . "'
                )";
            $this->statement = $this->conn->prepare($this->sql);
            if ($this->statement->execute()) {
                $this->sql = "SELECT * FROM tbl_export WHERE idInvoices = '" . $data['invoiceId'] . "'";
                $this->statement = $this->conn->prepare($this->sql);
                if ($this->statement->execute()) {
                    $datas = array();
                    while ($result = $this->statement->fetch(PDO::FETCH_OBJ)) :
                        $datas[] = $result;
                    endwhile;
                    return $datas;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
