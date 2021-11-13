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
        $this->sql = "SELECT * FROM tbl_invoices where date >= '$startDate' and date <= '$endDate'";
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
        // Get Data Invoice
        $this->sql = "SELECT * FROM tbl_invoices WHERE id = '" . $data['id'] . "'";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $datas['details'] = $this->statement->fetch(PDO::FETCH_OBJ);

        // Get Data Invoice
        $this->sql = "SELECT * FROM tbl_invoice_items WHERE id_invoice = '" . $data['id'] . "' order by type desc";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();

        while ($result = $this->statement->fetch(PDO::FETCH_OBJ)) :
            $result->qty_tmp = number_format($result->qty,0,",",".");
            $result->unit_price_tmp = number_format($result->unit_price,0,",",".");
            $result->amount_tmp = number_format($result->amount,0,",",".");

            $import = "";
            $export = "";
            if($result->type == "import"){
                $import = "selected";
            }else{
                $export = "selected"; 
            }
            $result->import = $import;
            $result->export = $export;

            $datas['items'][] = $result; 
        endwhile; 
 
        return $datas;
    }

    public function addInvoice($data)
    {     

        // get invoice numbers 
        // format number : INV-00001
        $length = 5;
        $char = 0;
        $type = 'd';
        $format = "%{$char}{$length}{$type}"; 

        

        $this->sql = "SELECT max(id) as id FROM tbl_invoices order by id desc";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();
        $lastData =  $this->statement->fetch(PDO::FETCH_OBJ); 

        if(empty($lastData)){
            $id_invoice = "INV-".sprintf($format, 1); 
        }else{
            $a = $lastData->id;
            $b = ltrim($a,"INV-");
            $c = (int)$b;
            $id_invoice = "INV-".sprintf($format, $c+1);  
        } 

        //add invoice
        $this->sql = "INSERT INTO tbl_invoices(`id`,`date`,`fromto`) VALUES('" . $id_invoice . "','" . $data['date'] . "','" . $data['fromto'] . "')"; 
        $this->statement = $this->conn->prepare($this->sql);
        if (!$this->statement->execute()) {  
            return "Gagal menambah data invoices";
        } 


        //add items 
        if(empty($data['itemType'])){ 
            return "Items tidak boleh kosong"; 
        }
 
        $count_arr  = count($data['itemType']);
        $this->sql = "";
        for ($i=0; $i < $count_arr; $i++) { 

             $this->sql .= "INSERT INTO tbl_invoice_items(
                `id_invoice`,
                `type`,
                `description`,
                `qty`,
                `unit_price`,
                `amount`
            ) VALUES( 
            '" . $id_invoice . "',
            '" . $data['itemType'][$i] . "',
            '" . $data['description'][$i] . "',
            '" . $data['qty'][$i] . "',
            '" . $data['unit_price'][$i] . "',
            '" . $data['amount_price'][$i] . "' 
            ); "; 
        }

            $this->statement = $this->conn->prepare($this->sql);  
            if (!$this->statement->execute()) {  
                return "Gagal memasukan items ke ".($i+1);
            }   
  
        return true; 
    }
    
    public function updateInvoice($data)
    {    
        //add invoice
        $this->sql = "UPDATE tbl_invoices set  `date`='" . $data['date'] . "',fromto='" . $data['fromto'] . "' WHERE id='" . $data['id'] . "'";
        $this->statement = $this->conn->prepare($this->sql);
        if (!$this->statement->execute()) { 
            $this->conn->rollBack();
            return "Gagal mengubah data invoices";
        } 
 
        //add items
        if(empty($data['itemType'])){ 
            return "Items tidak boleh kosong"; 
        }


        $this->sql = "DELETE from tbl_invoice_items where id_invoice='" . $data['id'] . "'";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute();

        $id_invoice = $data['id'];
        $count_arr  = count($data['itemType']);
        for ($i=0; $i < $count_arr; $i++) {  
             $this->sql = "INSERT INTO tbl_invoice_items(
                `id_invoice`,
                `type`,
                `description`,
                `qty`,
                `unit_price`,
                `amount`
            ) VALUES( 
            '" . $id_invoice . "',
            '" . $data['itemType'][$i] . "',
            '" . $data['description'][$i] . "',
            '" . $data['qty'][$i] . "',
            '" . $data['unit_price'][$i] . "',
            '" . $data['amount_price'][$i] . "' 
            )";
            $this->statement = $this->conn->prepare($this->sql);
            if (!$this->statement->execute()) {  
                return "Gagal memasukan items ke ".($i+1);
            } 
        } 
        return true; 
    } 

    public function deleteInvoice($data)
    {   
        // begin transaction  
        $this->sql = "DELETE from tbl_invoices where id='" . $data['id'] . "'";
        $this->statement = $this->conn->prepare($this->sql);
        $this->statement->execute(); 
        return true; 
    } 

}
