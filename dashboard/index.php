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
            <h1 class="h3 mb-0 text-gray-800 text-right Fonty">الرئيسية </h1>

          </div>



                   <!-- Content Row -->
                   <div class="row" >

                       <?php if($_SESSION['dashUser:EPS'] != "employee"): ?>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <i class="fas fa-users fa-2x text-gray-300"></i>

                            </div>
                            <div class="col mr-2">
                              <div class="font-weight-bold text-dark text-uppercase mb-1 text-right Fonty">أجمالي الموظفين</div>
<!--                                TODO: Print all emp numer-->
                              <div class="h5 mb-0 font-weight-bold text-gray-800  pl-3"><?php echo  $conn->query("SELECT * FROM `employee`  ")->rowCount();  ?> </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <i class="fas fa-user-secret fa-2x text-gray-300"></i>
                            </div>
                            <div class="col mr-2">
                              <div class="Fonty font-weight-bold text-dark text-uppercase mb-1 text-right">أجمالي عدد المشرفين</div>
                                <!--                                TODO: Print all admin numer-->
                              <div class=" h5 mb-1 font-weight-bold text-gray-800 pl-3"><?php echo  $conn->query("SELECT * FROM `admin` ")->rowCount();  ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                       <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <i class="fas fa-user-edit fa-2x text-gray-300"></i>
                            </div>
                            <div class="col mr-2">
                              <div class="Fonty font-weight-bold text-dark text-uppercase mb-1 text-right">أجمالي عدد المقيمين</div>
                                <!--                                TODO: Print all admin numer-->
                              <div class=" h5 mb-1 font-weight-bold text-gray-800 pl-3"><?php echo  $conn->query("SELECT * FROM `evaluator` ")->rowCount();  ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <div class="card border-left-dark shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                            </div>
                            <div class="col mr-2">
                              <div class="font-weight-bold text-dark text-uppercase mb-1 text-right Fonty">أجمالي عمليات التقيم</div>
                                <!--                                TODO: Print all evlete numer-->
                              <div class="h5 mb-0 font-weight-bold text-gray-800  pl-3"><?php echo  $conn->query("SELECT * FROM `evolution` ")->rowCount();  ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                       <?php else: ?>
                       <?php endif; ?>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
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
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
