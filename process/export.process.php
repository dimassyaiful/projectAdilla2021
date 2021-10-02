<?php

include '../class/Export.class.php';

$Export = new Export();

if (isset($_POST)) {
    if ($_POST['type'] == 'addExport') {
        $status = $Export->insertDataExprot($_POST);
        if ($status) {
            echo "successAdd";
        } else {
            echo var_dump($status);
        }
    } elseif ($_POST['type'] == 'getDataTempExport') {
        $datas = $Export->getDataExportTemp();
        if (is_array($datas)) {
            include '../ajax/data-exportTemp.php';
        } else {
            echo "Something Wrong";
        }
    } elseif ($_POST['type'] == 'saveDataExport') {
        $status = $Export->saveDataExport($_POST['fromto']);
        if ($status) {
            echo "successSaveExport";
        } else {
            echo var_dump($status);
        }
    }
}
