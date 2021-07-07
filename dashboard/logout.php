<?php
session_start();
if(isset($_SESSION['dashId:EPS'])){
    unset($_SESSION['dashId:EPS']);
    session_unset();
    session_destroy();
    exit(header("Refresh:0; url=login.php"));

}else{
    exit(header("Refresh:0; url=login.php"));
}
die();
?>