<?php

include '../class/Invoice.class.php';

$invoice = new Invoice();

if (isset($_POST)) {
    
    if ($_POST['type'] == 'data') { 
        include '../ajax/data-invoicesTables.php';
    }else if ($_POST['type'] == 'dataDetails') {
        $status = $invoice->getDetailInvoice($_POST);
        if ($status) {
            echo "success";
        } else {
            echo var_dump($status);
        }
    }else if ($_POST['type'] == 'add') {
        $status = $invoice->addInvoice($_POST);
        if ($status) {
            echo "success";
        } else {
            echo var_dump($status);
        }
    }else if ($_POST['type'] == 'edit') {
        $status = $invoice->updateInvoice($_POST);
        if ($status) {
            echo "success";
        } else {
            echo var_dump($status);
        }
    }else if ($_POST['type'] == 'delete') {
        $status = $invoice->deleteInvoice($_POST);
        if ($status) {
            echo "success";
        } else {
            echo var_dump($status);
        }
    }
 
}
