<?php
include "../includes/DataBase.php";

session_start();
if(isset($_SESSION['dashId:EPS'])){
$isLogin = true;
}else{
    exit(header('Location: login.php'));
    die();
}
date_default_timezone_set("Asia/Riyadh");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> نظام تقيم الموظفين</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@700&display=swap" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/flat-icons2/flaticon.css">
    <link href="css/mystyle.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sb-admin-2.css">

<style>
    *{
        font-family: 'Tajawal', sans-serif;
    }
</style>
</head>