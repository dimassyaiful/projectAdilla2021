<?php
session_start();
if(isset($_SESSION['username'])){
    if($_SESSION['username'] == '' || $_SESSION['username'] == null){
        header("Location: ../index.php");
    }
}else{
    header("Location: ../index.php");
}