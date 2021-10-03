<?php

include '../class/Import.class.php';

$Import = new Import();

if (isset($_POST)) {
    if ($_POST['type'] == 'addImport') {
        $status = $Import->insertDataImprot($_POST);
        if ($status) {
            echo "successAdd";
        } else {
            echo var_dump($status);
        }
    } elseif ($_POST['type'] == 'getDataTempImport') {
        $datas = $Import->getDataImportTemp();
        if (is_array($datas)) {
            include '../ajax/data-importTemp.php';
        } else {
            echo "Something Wrong";
        }
    } elseif ($_POST['type'] == 'saveDataImport') {
        $status = $Import->saveDataImport($_POST['fromto']);
        if ($status) {
            echo "successSaveImport";
        } else {
            echo var_dump($status);
        }
    } elseif ($_POST['type'] == 'refreshTempImport') {
        $status = $Import->refreshImportTemp();
        if ($status) {
            echo "successRefresh";
        } else {
            echo var_dump($status);
        }
    }
}
