
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
                            <div class="card-header py-3 ">
                                <h5 class="m-0 font-weight-bold text-dark text-center"> ?????????? ??????????????</h5>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body" style="direction: ltr;">


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


                                <?php

                                if (isset($_POST['submit'])){

                                    $name = $_POST['element_name'];

                                    $stmt=$conn->prepare("SELECT id FROM elements_evaluation WHERE evaluate_name=:ele");
                                    $stmt->bindValue(":ele", $name);
                                    $stmt->execute();

                                    if(empty($name)){
                                        echo "<div class=\"alert alert-danger text-right\">  ?????? ?????????? ?????? ???????????? </div>";

                                    }elseif($stmt->rowCount() > 0){
                                        echo "<div class=\"alert alert-danger text-right\"> ?????? ???????????? ?????????? ????????????</div>";
                                    }else{

                                        $stmtz = $conn->prepare("INSERT INTO `elements_evaluation`(`evaluate_name`) VALUES (:name) ");
                                        $stmtz->bindValue(":name", $name);
                                        $stmtz->execute();

                                        if ($stmtz->rowCount() > 0) {
                                            echo "<div class=\"alert alert-success text-right\"> ???? ?????????????? ?????????? </div>";
                                        } else {
                                            echo "<div class=\"alert alert-danger text-right\"> ?????? ?????? ?????? ??????????????. ???????? ?????? ???????? </div>";
                                        }

                                    }
                                }
                                ?>


                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0" dir="rtl">
                                        <thead dir="">
                                        <tr>
                                            <th>#</th>
                                            <th>?????? ????????????</th>
                                            <th>????????????</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        // TODO:: Chenge table name to new element evlation
                                        $stmt=$conn->prepare("SELECT * FROM `elements_evaluation` ");
                                        $stmt->execute();
                                        $count = 0;
                                        if($stmt->rowCount() > 0) :
                                            $rows = $stmt->fetchAll();
                                            foreach ($rows as $row) :
                                                ?>
                                                <tr>
                                                    <td><?=$row['id']?></td>
                                                    <td><?=$row['evaluate_name']?></td>
                                                    <td><a href="edit_element_evaluation.php?id=<?=$row['id']?>" class="btn btn-info">??????????</a> &nbsp;<a href="#dlete" onclick="myf(<?=$row['id']?>)" class="btn btn-danger">??????</a> </td>
                                                </tr>
                                            <?php
                                            endforeach;
                                        endif;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#add-user-form" class="btn btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text"> ?????????? ???????? ??????????</span></a>
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


<div id="add-user-form" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header bg-dark">
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-white"> ?????????? ???????? ?????????? </h4>
            </div>
            <div class="modal-body" style="font-size: 16px;">
                <div class=" text-right p-3"  >
                    <form method="post" action="">
                        <div class="form-group">
                            <label class="text-dark">?????? ???????? ??????????????</label>
                            <input type="text" class="form-control" name="element_name">
                        </div>
                        <input type="submit" class="btn btn-secondary" name="submit" value="??????????">

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<div id="delete-lost" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header bg-dark">
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-white"> </h4>
            </div>
            <div class="modal-body" style="font-size: 16px;">
                <div class="text-center">
                    <p class="text-justify text-dark text-center">
                        ???? ?????????? ???? ?????? ??????????????????
                    </p>
                    <a href="#" id="delete-link" class="btn btn-dark"> ?????? </a>
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

<script>
    function  myf(id){

        $("#delete-link").attr("href", "delete-page.php?type=ele&id="+id);
        $("#delete-lost").modal("show");
    }
</script>
</body>

</html>
