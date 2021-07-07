
<?php include "includes/head.php";?>
<?php
$updated = false;
if(!isset($_GET['id'])){exit(header('Location: index.php')); die();}
$userId = (int)$_GET['id'];
if(empty($userId)){exit(header('Location: index.php')); die();}
$stmt=$conn->prepare("SELECT * FROM employee WHERE id=:id");
$stmt->bindValue(":id", $userId);
$stmt->execute();
$row = $stmt->fetch();
?>
<?php
if(isset($_POST['update'])){

    $stmtu=$conn->prepare("INSERT INTO `evolution`(`employee_id`, `evaluator_id`,`who_evolute`, `gola1`, `gola2`, `gola3`, `gola4`, `merit1`, `merit2`, `merit3`, `merit4`, `date_created`) VALUES (:userID,:evaluator_id,:who_evolute,:g1,:g2,:g3,:g4,:m1,:m2,:m3,:m4,:xdate)");
    $stmtu->bindValue(":userID", $userId);
    $stmtu->bindValue(":evaluator_id", $_SESSION['dashId:EPS']);
    $stmtu->bindValue(":who_evolute", $_SESSION['dashUser:EPS']);
    $stmtu->bindValue(":g1", $_POST['g-element1']);
    $stmtu->bindValue(":g2", $_POST['g-element2']);
    $stmtu->bindValue(":g3", $_POST['g-element3']);
    $stmtu->bindValue(":g4", $_POST['g-element4']);
    $stmtu->bindValue(":m1", $_POST['m-element1']);
    $stmtu->bindValue(":m2", $_POST['m-element2']);
    $stmtu->bindValue(":m3", $_POST['m-element3']);
    $stmtu->bindValue(":m4", $_POST['m-element4']);
    $stmtu->bindValue(":xdate", time());
    $stmtu->execute();
    if($stmtu->rowCount() > 0){
        $_SESSION['alert:true'] = true;
        header("Location: evaluation.php");
        exit();
    }else{
        $_SESSION['alert:false'] = true;
        header("Location: evaluation.php");
        exit();
    }
}
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
                    <h1 class="h3 mb-0 text-gray-800 text-right Fonty">لوحة التحكم</h1>

                </div>
                <!-- Content Row -->
                <div class="row" >


                    <div class="col-xl-12 col-md-12 mb-4" dir="rtl">


                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-dark Font-tajawal text-center">  تقيم الموظف <span class="text-gray-900">  <?php echo $row['name']; ?>  </span>  </h6>
                            </div>
                            <div class="card-body">



                                <form action="" method="post" class="text-right">
                                    <h3 class="text-primary text-center p-2">الاهداف</h3>

                                    <div class="row">
                                    <div class="col-6">
                                    <label for="username" class="pull-right text-dark">
                                      تقديم دورات في نفس المجال
                                         </label>
                                    <div class="form-group">
                                        <select class="form-control" name="g-element1">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    </div>

                                        <div class="col-6">
                                            <label for="username" class="pull-right text-dark">  أنجاز جميع الخطابات المطلوبة </label>
                                            <div class="form-group">
                                                <select class="form-control" name="g-element2">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                    <div class="col-6">
                                    <label for="username" class="pull-right text-dark"> تحسين الأداء الأكاديمي للطلاب </label>
                                    <div class="form-group">
                                        <select class="form-control " name="g-element3">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    </div>

                                        <div class="col-6">
                                            <label for="username" class="pull-right text-dark"> عنصر تقيم 4 </label>
                                            <div class="form-group">
                                                <select class="form-control " name="g-element4">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

                                    <h3 class="text-primary text-center">الجدارة</h3>

                                    <div class="row">


                                        <div class="col-6">
                                            <label for="username" class="pull-right text-dark"> حس المسؤلية     <a href="#" data-toggle="modal" data-target="#Merit1" class="text-info"><i class="fas fa-exclamation-circle"></i></a></label>
                                            <div class="form-group">
                                                <select class="form-control " name="m-element1">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="username" class="pull-right text-dark">التعاون <a href="#" data-toggle="modal" data-target="#Merit2" class="text-info"><i class="fas fa-exclamation-circle"></i></a></label>
                                            <div class="form-group">
                                                <select class="form-control " name="m-element2">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <label for="username" class="pull-right text-dark"> تحقيق النتائج <a href="#" data-toggle="modal" data-target="#Merit3" class="text-info"><i class="fas fa-exclamation-circle"></i></a></label>
                                            <div class="form-group">
                                                <select class="form-control " name="m-element3">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="username" class="pull-right text-dark"> الارتباط الوظيفي     <a href="#" data-toggle="modal" data-target="#Merit4" class="text-info"><i class="fas fa-exclamation-circle"></i></a></label>
                                            <div class="form-group">
                                                <select class="form-control " name="m-element4">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <input type="submit" name="update" value="تقيم" class="btn btn-dark btn-block">

                                </form>


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

<!-- Model for Merit1 -->
<div id="Merit1" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header bg-dark">
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-white"> حس المسؤلية </h4>
            </div>
            <div class="modal-body" style="font-size: 16px;">
                <div class="text-center">
                    <p class="text-justify text-dark text-center p-3">
                       - يتحمل مسؤولية أعماله وقراراته، والا يلقى اللوم على الاخرين.
                        <Br>
                        - يفهم دوره، وكيفية ارتابطه و بألاهداف العامة لجهة عمله.
                        <br>
                       - يفصح عن مايوجهه من تحديات يشفافية.

                    </p>
                    <button type="button" class=" btn btn-dark text-white" data-dismiss="modal">أغلاق</button>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Model for Merit2 -->
<div id="Merit2" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header bg-dark">
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-white"> التعاون </h4>
            </div>
            <div class="modal-body" style="font-size: 16px;">
                <div class="text-center">
                    <p class="text-justify text-dark text-center p-3">
                       - يشارك المعلومات بانفتاح وفق متطلبات العمل.
                        <Br>
                        - يسعى الى الاستفادة من اراء الأخرين من خارج ادارته ،تهيئة
                        الأخرين لدعم الاعمال التي يقوم بها من خلال بناء علاقات داعمة معهم .

                    </p>
                    <button type="button" class=" btn btn-dark text-white" data-dismiss="modal">أغلاق</button>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Model for Merit3 -->
<div id="Merit3" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header bg-dark">
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-white"> تحقيق النتائج </h4>
            </div>
            <div class="modal-body" style="font-size: 16px;">
                <div class="text-center">
                    <p class="text-justify text-dark text-center p-3">
                       - يستطيع القيام وبمهام متعددة و تحديد أولوياتها  حسب اهميتها  النسبيه.
                        <Br>
                        - يمكن الاعتما د عليه , وينفذ مهامه في وقتها بمستوى عال من الجوده.
                        <br>
                        - مبادر ويعمل  بدون توجيه من رئيسه عند تنفيذه لمهامه.

                    </p>
                    <button type="button" class=" btn btn-dark text-white" data-dismiss="modal">أغلاق</button>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Model for Merit4 -->
<div id="Merit4" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header bg-dark">
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-white"> الارتباط الوظيفي </h4>
            </div>
            <div class="modal-body" style="font-size: 16px;">
                <div class="text-center">
                    <p class="text-justify text-dark text-center p-3">
                       - لدية الاستعداد لمواجهة تحديات العمل.
                        <Br>
                        - يتطلع إلئ مستوى أعلئ من الانجاز والابتكار عند تنفيذ تنفيذ العمل
                        يلتزم بمواعيد العمو و يكون متواجدا عند الحا جة اليه.

                    </p>
                    <button type="button" class=" btn btn-dark text-white" data-dismiss="modal">أغلاق</button>
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

</body>

</html>
