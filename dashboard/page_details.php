<?php

if(!isset($_GET['do']) and $_GET['order_id']): header("Location: index.php"); die(); endif;
if(!is_numeric($_GET['order_id']) || empty($_GET['order_id'])){  exit(header('Location: index.php')); die();}
if(isset($_GET['do']) and $_GET['order_id']){

    $order_id1 = (int)$_GET['order_id'];
    $do1 = $_GET['do'];

    switch ($do1){
        case 'support':
            $job1 = "الدعم الفني";
            break;

        case 'key':
            $job1 = "مسؤولة المفاتيح";
            break;

        case 'security':
            $job1 = "الامن";
            break;

        case 'doctor':
            $job1 = "الطبيبة";
            break;

        default:
            $job1 = "";
    }
    if(empty($job1)){
        header("Location: index.php"); die();
    }


}




?>
<?php include "includes/head.php";?>
<style>
    .navbar-nav{
        padding-right: 0;
    }
    .input-group>.input-group-append>.btn{
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-top-left-radius: .35rem;
        border-bottom-left-radius: .35rem;
    }

    @media (min-width: 768px){
        .sidebar.toggled .nav-item .nav-link {
            text-align: center;
            padding: .75rem 1rem;
            padding-top: 0.35rem;
            padding-right: 1rem;
            padding-bottom: 0.75rem;
            padding-left: 1rem;
            width: 6.5rem;
        }
    }

    @media (min-width: 635px){
        .topbar .dropdown .dropdown-menu {
            width: auto;
            right: -110px;
        }
    }
    .head-menu{
        font-size: 12px;
    }

    *{
        font-family: 'Tajawal', sans-serif;

    }
</style>
<body id="page-top" >

<!-- Page Wrapper -->
<div id="wrapper">

    <?php

    if (isset($_GET['read'])){

    $stmtup = $conn->prepare("UPDATE `order` SET reared = 1 WHERE id = :ido");
    $stmtup->bindValue(":ido", $order_id1);
    $stmtup->execute();
    }

    ?>

    <!-- Sidebar -->
    <?php include "includes/menu.php" ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link text-dark d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav mr-auto">


                    <!-- Nav Item - Alerts -->
                    <?php include "includes/alert.php"?>
                    <!-- End of Alert -->

                    <!-- Nav Item - message -->
                    <?php include "includes/msg.php"?>
                    <!-- END - message -->

                    <!-- Nav Item - Logout and options -->
                    <?php include "includes/logout-menu.php"?>
                    <!-- END  -->

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 text-right Fonty">لوحة التحكم</h1>

                </div>
                <!-- Content Row -->
                <div class="row" >


                    <div class="col-xl-12 col-md-12 mb-4" dir="rtl">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h5 class="m-0 font-weight-bold text-dark Fonty text-center">تفاصيل طلب  <span><?=$job1?></span></h5>
                            </div>
                            <div class="card-body">


                                <?php



                                $tag = "<p class='text-danger text-center' > عذرا حصل خطا!!  <br> <a href='index.php' class=' btn btn-link text-center '> عودة </a> </p>";
                                $stmt= $conn->prepare("SELECT `order`.`id`, date_order, name, important, email, message FROM `order` JOIN `users` on `order`.from_who = `users`.id WHERE `order`.`id`=:idorder and  `order`.`to_who` = :tohow ");
                                $stmt->bindValue(":idorder", $order_id1);
                                $stmt->bindValue(":tohow", $do1);
                                $stmt->execute();
                                $row = $stmt->fetch();

                                if($stmt->rowCount() == 0){
                                     die($tag);
                                }
                                ?>

                                <p class="fonty-par text-right p-2">
                                    <?=$row['message']?>
                                </p>

                                <hr class="sidebar-divider my-0">
                                <div class="p-1 text-right">
                                    <div class="font-weight-bold Fonty pb-2 pt-1 "> اسم المرسل: <span class="font-weight-normal"> <?=$row['name']?></span> </div>
                                    <div class="font-weight-bold Fonty pb-2 ">  إئميل المرسل: <span class="font-weight-normal"><a href="mailto:<?=$row['email']?>"><?=$row['email']?></a></span> </div>
                                    <div class="font-weight-bold Fonty pb-2 "> تاريخ الارسال: <span class="font-weight-normal"><?php echo  date('Y-m-d', $row['date_order'])?></span> </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>


        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<div class="text-left">
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
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
<script src="js/sb-admin-2.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>


<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
