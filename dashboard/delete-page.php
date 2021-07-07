<?php
if(isset($_GET['type'])) {

    $type = $_GET['type'];
    $who = $_GET['type'];
    include "includes/head.php";

    if(!isset($_GET['id'])){header("Location: index.php");die();}
    $id = (int)$_GET['id'];

    if($who == "admin"){
        // Delete from admin table


        $stmtz = $conn->prepare("DELETE FROM `admin` WHERE  id = :id ");
        $stmtz->bindValue(":id", $id);
        $stmtz->execute();
        if ($stmtz->rowCount() > 0) {
            $_SESSION['alert:true'] = 1;
            header("Location: show-admin.php");
            exit();
        }else{
            $_SESSION['alert:false'] = 1;
            header("Location: show-admin.php");
            exit();
        }


    }elseif ($who == "emp"){
        // Delete from employee  table


        $stmtz = $conn->prepare("DELETE FROM `employee` WHERE  id = :id ");
        $stmtz->bindValue(":id", $id);
        $stmtz->execute();
        if ($stmtz->rowCount() > 0) {
            $_SESSION['alert:true'] = 1;
            header("Location: show-emp.php");
        }else{
            $_SESSION['alert:false'] = 1;
            header("Location: show-emp.php");
        }

    }elseif ($who == "evaluator"){
        // Delte from evaluator table

        $stmtz = $conn->prepare("DELETE FROM `evaluator` WHERE  id = :id ");
        $stmtz->bindValue(":id", $id);
        $stmtz->execute();
        if ($stmtz->rowCount() > 0) {
            $_SESSION['alert:true'] = 1;
            header("Location: show-evletor.php");
        }else{
            $_SESSION['alert:false'] = 1;
            header("Location: show-evletor.php");
        }

    }elseif ($who == "ele"){

        // Delte from evolution_coustme table
        // Todo:: Delete evlatae with $id in coulmn evaluate_id in evolution_coustme table
        $stmtd = $conn->prepare("DELETE FROM `evolution_coustme` WHERE  evaluate_id = :id ");
        $stmtd->bindValue(":id", $id);
        $stmtd->execute();


        $stmtz = $conn->prepare("DELETE FROM `elements_evaluation` WHERE  id = :id ");
        $stmtz->bindValue(":id", $id);
        $stmtz->execute();
        if ($stmtz->rowCount() > 0) {
            $_SESSION['alert:true'] = 1;
            header("Location: element_evaluation.php");
        }else{
            $_SESSION['alert:false'] = 1;
            header("Location: element_evaluation.php");
        }
    }elseif($who == "report"){

        $stmtz = $conn->prepare("DELETE FROM `evolution` WHERE  employee_id = :id ");
        $stmtz->bindValue(":id", $id);
        $stmtz->execute();

        $stmt = $conn->prepare("DELETE FROM `evolution_coustme` WHERE  emp_id = :id ");
        $stmt->bindValue(":id", $id);
        $stmt->execute();


        if ($stmtz->rowCount() > 0) {
            $_SESSION['alert:true'] = 1;
            header("Location: show-evaluation.php");
        }else{
            $_SESSION['alert:false'] = 1;
            header("Location: show-evaluation.php");
        }


    }elseif ($who == "report_c"){

        $stmtz = $conn->prepare("DELETE FROM `evolution_coustme` WHERE  emp_id = :id ");
        $stmtz->bindValue(":id", $id);
        $stmtz->execute();
        if ($stmtz->rowCount() > 0) {
            $_SESSION['alert:true'] = 1;
            header("Location: show-evaluation.php");
        }else{
            $_SESSION['alert:false'] = 1;
            header("Location: show-evaluation.php");
        }
    }


}