
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
                                <h6 class="m-0 font-weight-bold text-dark Font-tajawal text-center">  تعديل بيانات الموظف  </h6>
                            </div>
                            <div class="card-body">

                                <?php
                                if(isset($_POST['update'])){
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $dept = $_POST['dept'];
                                    $emp_num = $_POST['emp_num'];
                                    $job_title = $_POST['job_title'];
                                    $password = $_POST['password'];

                                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                       exit("<div class=\"alert alert-danger text-center \"> الائميل غير صحيح </div>");
                                    }

                                    // check if email is alredy used
                                    $stmte=$conn->prepare("SELECT email FROM employee where email = :email");
                                    $stmte->bindValue(":email", $email);
                                    $stmte->execute();

                                            if($email == $row['email']):
                                            else:
                                               if($stmte->rowCount() > 0){
                                                   exit("<div class=\"alert alert-danger text-center \"> هذا الائميل مُسجل مسبقاً <a href='' class='btn-link'> عودة </a> </div>");
                                               }
                                            endif;

                                        $stmtu=$conn->prepare("UPDATE `employee` SET `name`=:name,`email`=:email, `depart` = :dept, `job_title` = :job_title , `employee_number` = :emp_num, `password` = :pass  WHERE id = :id");
                                        $stmtu->bindValue(":name", $name);
                                        $stmtu->bindValue(":email", $email);
                                        $stmtu->bindValue(":id", $userId);
                                        $stmtu->bindValue(":dept", $dept);
                                        $stmtu->bindValue(":job_title", $job_title);
                                        $stmtu->bindValue(":emp_num", $emp_num);
                                        $stmtu->bindValue(":pass", $password);
                                        $stmtu->execute();

                                        if($stmtu->rowCount() > 0){
                                            $updated = true;
                                            echo "<div class=\"alert alert-success text-right \"> تم تحديث بيانات الموظف بنجاح <a href='show-emp.php' class='btn-link'> عودة </a> </div>";
                                        }
                                    }
                                ?>

                                <form action="" method="post" class="text-right">

                                    <label for="username" class="pull-right text-dark"> اسم الموظف </label>
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control form-control-user"  value="<?php if($updated){ echo $name;}else{  echo $row['name']; }?>" required>
                                    </div>

                                    <label for="username" class="pull-right text-dark">المسمى الوظيفي</label>
                                    <div class="form-group">
                                        <input type="text" name="job_title" class="form-control form-control-user" value="<?php if($updated){ echo $job_title;}else{  echo $row['job_title']; }?>" required>
                                    </div>


                                    <label for="username" class="pull-right text-dark">الرقم الوظيفي</label>
                                    <div class="form-group">
                                        <input type="text" name="emp_num" class="form-control form-control-user" value="<?php if($updated){ echo $dept;}else{  echo $row['employee_number']; }?>" required>
                                    </div>

                                    <label for="username" class="pull-right text-dark">إئميل الموظف</label>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" value="<?php if($updated){ echo $email;}else{  echo $row['email']; }?>" required>
                                    </div>

                                    <label for="username" class="pull-right text-dark">القسم</label>
                                    <div class="form-group">
                                        <input type="text" name="dept" class="form-control form-control-user" value="<?php if($updated){ echo $dept;}else{  echo $row['depart']; }?>" required>
                                    </div>

                                    <label for="username" class="pull-right text-dark">كلمة سر جديدة <small class="text-dark">أختياري</small>  </label>
                                    <div class="form-group">
                                        <input type="password" name="password" value="<?php $row['employee']; ?>" class="form-control form-control-user"  >
                                    </div>


                                    <input type="submit" name="update" value="تعديل" class="btn btn-dark btn-block">

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
