<?php
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
                    <h1 class="h3 mb-0 text-gray-800 text-right Fonty">???????? ????????????</h1>

                </div>
                <!-- Content Row -->
                <div class="row">

                    <div class="col-xl-12 col-lg-12">

                        <!-- Dropdown Card Example -->
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <div class="card-header py-3 ">
                                <h5 class="m-0 font-weight-bold text-info text-center">?????????????? ???????????? ??????????</h5>
                            </div>
                            </a>
                            <!-- Card Body -->
                            <div class="collapse show" id="collapseCardExample" style="">
                            <div class="card-body " style="direction: ltr;">
                                <?php
                                if(isset($_SESSION['alert:true'])){
                                    echo "<div class=\"alert alert-success text-right\"> ???? ?????????? ?????????? </div>";
                                    unset($_SESSION['alert:true']);
                                }

                                if (isset($_SESSION['alert:false'])){
                                    echo "<div class=\"alert alert-danger text-right\"> ???? ?????? ?????????? ?????????? ???????????? ???????????????? ?????? ???????? </div>";
                                    unset($_SESSION['alert:false']);
                                }
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0" dir="rtl">
                                        <thead dir="">
                                        <tr>
                                            <th>?????? ????????????</th>
                                            <th>??????????</th>
                                            <th>??????????</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $emp_id = $_SESSION['dashId:EPS'];
                                        if ($_SESSION['dashUser:EPS'] == 'employee'){

                                            $stmt=$conn->prepare("SELECT evolution.id, name, depart, evolution.employee_id  FROM `evolution` JOIN employee ON employee.id = evolution.employee_id WHERE employee.id = $emp_id ");
                                        }else{
                                            $stmt=$conn->prepare("SELECT evolution.id, name, depart, evolution.employee_id  FROM `evolution` JOIN employee ON employee.id = evolution.employee_id");
                                        }
                                        $stmt->execute();
                                        $count = 0;
                                        if($stmt->rowCount() > 0) :
                                            $rows = $stmt->fetchAll();
                                            foreach ($rows as $row) :
                                                ?>
                                                <tr>
                                                    <td><a href="#" class="text-info"> <?=$row['name']?></a></td>
                                                    <td> <?=$row['depart']?> </td>
                                                        <td><a href="report.php?id=<?=$row['employee_id']?>" class="btn btn-primary">  ?????? ??????????????  <i class="fas fa-clipboard-list"></i></a> </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                        endif;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            </div>
                            </div>
                        </div>


                    </div>




                <!-- Content Row -->
<!--                <div class="row">-->
<!---->
<!--                    <div class="col-xl-12 col-lg-12">-->
<!---->
<!--                        <!- Dropdown Card Example -->
<!--                        <div class="card shadow mb-4">-->
<!--                            < Card Header - Dropdown -->
<!--                            <a href="#xcollapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="xcollapseCardExample">-->
<!--                                <div class="card-header py-3 ">-->
<!--                                    <h5 class="m-0 font-weight-bold text-info text-center">?????????????? ???????????? ????????????</h5>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                            < Card Body -->
<!--                            <div class="collapse show" id="xcollapseCardExample" style="">-->
<!--                                <div class="card-body " style="direction: ltr;">-->
<!--                                    <div class="table-responsive">-->
<!--                                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0" dir="rtl">-->
<!--                                            <thead dir="">-->
<!--                                            <tr>-->
<!--                                                <th>?????? ????????????</th>-->
<!--                                                <th>??????????</th>-->
<!--                                                <th>??????????</th>-->
<!--                                            </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
<!--                                            --><?php
//                                            if ($_SESSION['dashUser:EPS'] == 'employee'){
//                                                $stmt=$conn->prepare("SELECT DISTINCT emp_id, name, depart FROM `evolution_coustme` JOIN employee ON employee.id = evolution_coustme.emp_id where employee.id = $emp_id ORDER BY `evolution_coustme`.`emp_id` ASC");
//                                            }else{
//                                                $stmt=$conn->prepare("SELECT DISTINCT emp_id, name, depart FROM `evolution_coustme` JOIN employee ON employee.id = evolution_coustme.emp_id ORDER BY `evolution_coustme`.`emp_id` ASC");
//                                            }
//
//                                            $stmt->execute();
//                                            $count = 0;
//                                            if($stmt->rowCount() > 0) :
//                                                $rows = $stmt->fetchAll();
//                                                foreach ($rows as $row) :
//                                                    ?>
<!--                                                    <tr>-->
<!--                                                        <td><a href="#" class="text-info"> --><?//=$row['name']?><!--</a></td>-->
<!--                                                        <td> --><?//=$row['depart']?><!-- </td>-->
<!--                                                        <td><a href="report-coustome.php?id=--><?//=$row['emp_id']?><!--" class="btn btn-primary">  ?????? ??????????????  <i class="fas fa-clipboard-list"></i></a> </td>-->
<!--                                                    </tr>-->
<!--                                                --><?php
//                                                endforeach;
//                                            endif;
//                                            ?>
<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!---->
<!--                </div>-->

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
                    <span aria-hidden="true">??</span>
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


</body>

</html>
