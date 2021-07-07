<?php
include "../includes/Database.php";
session_start();
?>
<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>تسجيل الدحول</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sb-admin-2.css">
<style>
    *{
        font-family: 'Tajawal', sans-serif;

    }
    input[placeholder]{
        text-align: right;
    }
</style>
</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h3 text-gray-900 mb-4 Font-tajawal font-weight-bold ">أهلاَ بك في نظام تقيم الموظفين</h1>
                                </div>
                                <?php
                                $alert_pass = false;
                                $alert_admin = false;
                                if(isset($_POST['submit'])){
                                    $email = $_POST["email"];
                                    $password = $_POST["password"];
                                    $user = $_POST["user"];


                                    if($user == 1) {
                                        //  is admin
                                        $stm = $conn->prepare("SELECT * FROM `admin` WHERE email=:email");
                                        $stm->bindValue(":email", $email);
                                        $stm->execute();


                                        if($stm->rowCount() != 0){
                                            $row = $stm->fetch();
                                            $id = $row['id'];
                                            $db_password = $row['password'];

                                            if($password === $db_password ){
                                                $_SESSION['dashId:EPS'] = $id;
                                                $_SESSION['dashName:EPS'] = $row['name'];
                                                $_SESSION['dashUser:EPS'] = 'admin';

                                                exit(header('Location: index.php'));
                                            }else{
                                                $alert_admin = true;
                                            }

                                        }else{
                                            $alert_pass = true;
                                        }


                                    }elseif($user == 2){
                                        // is evliotnerr
                                        $stm = $conn->prepare("SELECT * FROM `evaluator` WHERE email=:email");
                                        $stm->bindValue(":email", $email);
                                        $stm->execute();

                                        if($stm->rowCount() != 0){
                                            $row = $stm->fetch();
                                            $id = $row['id'];
                                            $db_password = $row['password'];

                                            if($password === $db_password ){
                                                $_SESSION['dashId:EPS'] = $id;
                                                $_SESSION['dashName:EPS'] = $row['name'];
                                                $_SESSION['dashUser:EPS'] = 'evaluator';

                                                exit(header('Location: index.php'));
                                            }else{
                                                $alert_admin = true;
                                            }

                                        }else{
                                            $alert_pass = true;
                                        }

                                    }else{
                                        // is emp
                                        $stm = $conn->prepare("SELECT * FROM `employee` WHERE email=:email");
                                        $stm->bindValue(":email", $email);
                                        $stm->execute();

                                        if($stm->rowCount() != 0){
                                            $row = $stm->fetch();
                                            $id = $row['id'];
                                            $db_password = $row['password'];

                                            if($password === $db_password ){
                                                $_SESSION['dashId:EPS'] = $id;
                                                $_SESSION['dashName:EPS'] = $row['name'];
                                                $_SESSION['dashUser:EPS'] = 'employee';

                                                exit(header('Location: index.php'));
                                            }else{
                                                $alert_pass = true;
                                            }

                                        }else{
                                            $alert_pass = true;
                                        }

                                    }


                                }

                                ?>
                                <?php if($alert_pass): ?>
                                <div class="alert alert-danger text-right" role="alert"  >
                                   خطأ! البيانات المدخلة غير صحيحة
                                </div>
                                <?php endif; if ($alert_admin): ?>
                                <div class="alert alert-warning text-right" role="alert"  >
                                    انت غير مسموح لك الوصول الى لوحة التحكم
                                </div>
                                <?php endif; ?>
                                <form action="" class="user" method="POST" >
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="الأئميل" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="كلمة المرور" required>
                                    </div>

                                    <div class="form-group" dir="rtl">
                                       <center> <span  class="text-dark text-center">تسجيل دخول كـ:</span></center>
                                        <select class="form-control " name="user" id="">
                                            <option  value="1">مشرف</option>
                                            <option value="2">مقيم</option>
                                            <option value="3">موظف</option>
                                        </select>
                                    </div>
                                    <input type="submit" name="submit" value="دخول" class="btn btn-primary btn-user font-weight-bold Font-tajawal btn-block">
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="../forgotpassword.php">نسيت كلمة المرور؟</a>
                                </div>
<!--                                <div class="text-center">-->
<!--                                    <a class="small" href="register.php">ليس لديك حساب بعد؟ تسجيل جديد</a>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
