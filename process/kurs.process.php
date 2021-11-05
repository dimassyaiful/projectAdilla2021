<?php

include '../class/Kurs.class.php';

$controller = new Kurs();

if (isset($_POST)) {
    if ($_POST['type'] == 'insertData') {
        $status = $controller->insertData($_POST);
        if ($status) {
            echo "success";
        } else {
            echo var_dump($status);
        }
    } elseif ($_POST['type'] == 'getData') {
        $datas = $controller->getData();
        if (is_array($datas)) {

        } else {
            echo "false";
        }
    } elseif ($_POST['type'] == 'getDataDetails') {
        $status = $controller->getDataDetails($_POST['id']);
        if ($status) {
            
        } else {
            echo var_dump($status);
        }
    }  elseif ($_POST['type'] == 'delete') {
        $status = $controller->delete($_POST['id']);
        if ($status) {
            echo "success";
        } else {
            echo "false";
        }
    }  elseif ($_POST['type'] == 'editData') {
        $status = $controller->editData($_POST );
        if ($status) {
            echo "success";
        } else {
            echo "false";
        }
    }  
}
