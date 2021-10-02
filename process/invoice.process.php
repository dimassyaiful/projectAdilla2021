<?php

include '../class/Invoice.class.php';

$invoice = new Invoice();
if (isset($_POST['posttype'])) {
    $data = $invoice->addInvoice($_POST);
    include '../ajax/add-invoices.php';
} elseif (isset($_POST['typeInsert'])) {
    if ($_POST['typeInsert'] == 'Import') {
        $datas = $invoice->addImport($_POST);
    } elseif ($_POST['typeInsert'] == 'Export') {
        $datas = $invoice->addExport($_POST);
    }
    include '../ajax/data-invoices.php';
} elseif (isset($_POST['detialInvoice'])) {
    $datas = $invoice->getDetailInvoice($_POST);
    include '../modal/detail-invoices.php';
}
