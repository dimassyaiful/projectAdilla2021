<?php

include '../class/Login.class.php';

$login = new Login();
if (isset($_POST['register'])) {
    $status = $login->register($_POST);
    if ($status === true) {
        header("Location: ../index.php?msg=successRegister");
    } elseif ($status === false) {
        header("Location: ../index.php?msg=somethingwrong");
    } else {
        echo $status;
    }
} elseif (isset($_POST['login'])) {
    $status = $login->login($_POST);
    if ($status === true) {
        header("Location: ../page");
    } elseif ($status === false) {
        header("Location: ../index.php?msg=passwordwrong");
    } else {
        echo $status;
    }
}
