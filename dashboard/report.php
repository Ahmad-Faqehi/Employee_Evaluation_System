
<?php include "includes/head.php";?>
<?php
$updated = false;
if(!isset($_GET['id'])){exit(header('Location: index.php')); die();}
$emp_id = (int)$_GET['id'];
if(empty($emp_id)){exit(header('Location: index.php')); die();}
$stmt=$conn->prepare("SELECT * FROM `evolution` JOIN employee ON employee.id = evolution.employee_id WHERE evolution.employee_id = :emp_id");
$stmt->bindValue(":emp_id", $emp_id);
$stmt->execute();
$row = $stmt->fetch();

function getEvlator($id, $admin){
    GLOBAL $conn;

    if($admin){
        $stmtz=$conn->prepare("SELECT * FROM `admin`WHERE id = :id");
        $stmtz->bindValue(":id", $id);
        $stmtz->execute();
        $rowz = $stmtz->fetch();
    }else{
        $stmtz=$conn->prepare("SELECT * FROM `evaluator`WHERE id = :id");
        $stmtz->bindValue(":id", $id);
        $stmtz->execute();
        $rowz = $stmtz->fetch();
    }
    return $rowz;
}

$who_evlate = ($row['who_evolute']  == 'admin') ? true : false;
$evloter = getEvlator($row['evaluator_id'],$who_evlate);


//if($row{'who_evolute'} == 'admin'){
//    $evloter = getEvlator($row['evaluator_id'],true);
//}else{
//  $evloter =   getEvlator($row['evaluator_id'],false);
//}
$resutl_goal = ($row['gola1'] + $row['gola2'] + $row['gola3'] + $row['gola4']) * 5;
$resutl_merit = ($row['merit1'] + $row['merit2'] + $row['merit3'] + $row['merit4']) * 5;
$total = ($resutl_goal + $resutl_merit) / 2;

?>
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

    .evlation{
        border-color: #5a5c69;
    }
    .border {
        border: 1px solid #565864 !important;
    }
    .reslut{
        background-color: white;
        border: dashed;
        border-color: #4e73df;
        font-size: x-large;
        color: black;
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
                <div class="row" >


                    <div class="col-xl-12 col-md-12 mb-4" dir="rtl">



                        <div class="card shadow mb-4">
                            <div class="card-header py-3 bg-info">
                                <h6 class="m-0 font-weight-bold text-white Font-tajawal text-center">  ?????????? ?????????? ???????????? <span><?=$row['name']?></span> </h6>
                            </div>
                            <div class="card-body">

                                <div class="text-right">

                                    <fieldset  class="border p-3 form-group">
                                        <legend class="control-label customer-legend pl-1 text-info">???????????? ????????????</legend>

                                        <div class="row">
                                    <div class="form-group col-3 text-center" >
                                        <label for="username" class="pull-right text-dark font-weight-bold"> ?????? ???????????? </label>
                                        <input type="text" name="name" class="form-control form-control-user  text-center text-dark"  style="background-color: white;" value="<?php echo $row['name']; ?>" disabled>
                                    </div>

                                    <div class="form-group col-3 text-center">
                                        <label for="username" class="pull-right text-dark font-weight-bold">???????????? ??????????????</label>
                                        <input type="text" name="job_title" class="form-control form-control-user text-center text-dark" style="background-color: white;" value="<?php   echo $row['job_title']; ?>" disabled>
                                    </div>

                                            <div class="form-group col-3 text-center">
                                        <label for="username" class="pull-right text-dark font-weight-bold"> ??????????</label>
                                        <input type="text" name="job_title" class="form-control form-control-user text-center text-dark" style="background-color: white;" value="<?php   echo $row['depart']; ?>" disabled>
                                    </div>


                                    <div class="form-group col-3 text-center">
                                        <label for="username" class="pull-right text-dark font-weight-bold">?????????? ??????????????</label>
                                        <input type="text" name="emp_num" class="form-control form-control-user text-center text-dark" style="background-color: white;" value="<?php  echo $row['employee_number']; ?>" disabled>
                                    </div>
                                        </div>
                                    </fieldset>

                                    <?php  // Todo: Here is Evlation info /////////////////////////////////////// ?>

                                    <fieldset  class="border p-3 form-group">
                                        <legend class="control-label customer-legend pl-1 text-info">???????????? ????????????</legend>

                                        <h3 class="text-primary text-center p">??????????????</h3>
                                        <hr class="pb-3">
                                    <div class="form-group row " >
                                        <label for="username" class="col-sm-2 col-form-label text-dark font-weight-bold"> ?????????? ?????????? ???? ?????? ????????????</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="name" class="form-control form-control-user  text-center text-dark evlation"  value="<?php echo $row['gola1']; ?>/5" style="background-color: white;" disabled>
                                        </div>
                                    </div>

                                        <div class="form-group row " >
                                        <label for="username" class="col-sm-2 col-form-label text-dark font-weight-bold"> ?????????? ???????? ???????????????? ????????????????</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="name" class="form-control form-control-user  text-center text-dark evlation"  value="<?php echo $row['gola2']; ?>/5" style="background-color: white;" disabled>
                                        </div>
                                    </div>

                                        <div class="form-group row " >
                                        <label for="username" class="col-sm-2 col-form-label text-dark font-weight-bold"> ?????????? ???????????? ?????????????????? ????????????</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="name" class="form-control form-control-user  text-center text-dark evlation"  value="<?php echo $row['gola3']; ?>/5" style="background-color: white;" disabled>
                                        </div>
                                    </div>

                                        <div class="form-group row " >
                                        <label for="username" class="col-sm-2 col-form-label text-dark font-weight-bold"> ???????? ???????? 4</label>
                                        <div class="col-sm-2">
                                            <input type="text" name="name" class="form-control form-control-user  text-center text-dark evlation"  value="<?php echo $row['gola4']; ?>/5" style="background-color: white;" disabled>
                                        </div>
                                    </div>

                                        <div class="form-group pt-4 row " >
                                        <label for="username" class="col-sm-2 col-form-label text-primary font-weight-bold"> ?????????????? </label>
                                        <div class="col-sm-2">
                                            <input type="text" name="name" class="form-control form-control-user  text-center text-primary   evlation "  value="%<?php echo $resutl_goal; ?>" style=" " disabled>
                                        </div>
                                    </div>



                                        <h3 class="text-primary text-center p-1">??????????????</h3>
                                        <hr class="pb-3">
                                        <div class="form-group row " >
                                            <label for="username" class="col-sm-2 col-form-label text-dark font-weight-bold"> ???? ????????????????</label>
                                            <div class="col-sm-2">
                                                <input type="text" name="name" class="form-control form-control-user  text-center text-dark evlation"  value="<?php echo $row['merit1']; ?>/5" style="background-color: white;" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row " >
                                            <label for="username" class="col-sm-2 col-form-label text-dark font-weight-bold"> ?????????????? </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="name" class="form-control form-control-user  text-center text-dark evlation"  value="<?php echo $row['merit2']; ?>/5" style="background-color: white;" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row " >
                                            <label for="username" class="col-sm-2 col-form-label text-dark font-weight-bold"> ?????????? ?????????????? </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="name" class="form-control form-control-user  text-center text-dark evlation"  value="<?php echo $row['merit3']; ?>/5" style="background-color: white;" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group row " >
                                            <label for="username" class="col-sm-2 col-form-label text-dark font-weight-bold">  ???????????????? ??????????????  </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="name" class="form-control form-control-user  text-center text-dark evlation"  value="<?php echo $row['merit4']; ?>/5" style="background-color: white;" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group pt-4 row " >
                                            <label for="username" class="col-sm-2 col-form-label text-primary font-weight-bold"> ?????????????? </label>
                                            <div class="col-sm-2">
                                                <input type="text" name="name" class="form-control form-control-user  text-center text-primary   evlation "  value="%<?php echo $resutl_merit; ?>" style=" " disabled>
                                            </div>
                                        </div>

                                    </fieldset>

                                    <fieldset  class="border p-3 form-group">
                                        <legend class="control-label customer-legend pl-1 text-info">?????????????? ????????????????</legend>

                                        <div class="row">
                                            <div class="form-group offset-4 text-center" >

                                            </div>

                                            <div class="form-group col-4 text-center">
                                                <label for="username" class="pull-right text-dark font-weight-bold"> </label>
                                                <input type="text" name="job_title" class="form-control form-control-user text-center reslut" style="background-color: white;" value="%<?php  echo $total  ?>" disabled>
                                            </div>

                                            <div class="form-group offset-4 text-center" >

                                            </div>
                                        </div>
                                    </fieldset>

                                </div>

                                <div class="text-center pt-3">
                                    <a href="#"  onclick="window.print();return false;"  class="btn btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-clipboard-list"></i></span><span class="text"> ?????????? ??????????????</span></a>
                                    <?php if ($_SESSION['dashUser:EPS'] != 'employee'):?>
                                    <a href="#" data-toggle="modal" data-target="#delete-ropot" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="far fa-trash-alt"></i></span><span class="text"> ?????? ??????????????</span></a>
                                    <?php endif; ?>
                                </div>

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

<div id="delete-ropot" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header bg-dark">
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-white"> </h4>
            </div>
            <div class="modal-body" style="font-size: 16px;">
                <div class="text-center">
                    <p class="text-justify text-dark text-center">
                        ???? ?????????? ???? ?????????? ??
                    </p>
                    <a href="delete-page.php?id=<?=$emp_id?>&type=report" id="delete-link" class="btn btn-dark"> ?????? </a>
                </div>
            </div>
        </div>

    </div>
</div>

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


<!-- Page level custom scripts -->

</body>

</html>
