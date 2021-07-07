<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-bitbucket"></i>
        </div>
        <div class="sidebar-brand-text mx-3">EPES</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item  ">
        <a class="nav-link text-center" href="index.php" >
            <i class="fas fa-home"></i>
            <span>الرئيسية</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-center Fonty">
        <div class="head-menu">المستخدمين</div>
    </div>
    <!-- Nav Item - Utilities Collapse Menu -->
    <?php if($_SESSION['dashUser:EPS'] == "admin"): ?>
    <li class="nav-item">
        <a class="nav-link text-center" href="show-admin.php">
            <i class="fas fa-user-secret"></i>
            <span> المشرفين </span>
        </a>
    </li>
    <?php endif; ?>

    <?php if($_SESSION['dashUser:EPS'] == "admin"): ?>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link text-center" href="show-evletor.php">
            <i class="fas fa-user-edit"></i>
            <span> المقيمين </span>
        </a>
    </li>
    <?php endif; ?>


    <?php if($_SESSION['dashUser:EPS'] == "admin" || $_SESSION['dashUser:EPS'] == "evaluator"): ?>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link text-center" href="show-emp.php">
        <i class="fas fa-users"></i>
    <span> الموظفين</span>
    </a>
    </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading text-center Fonty" >
        <div class="head-menu">التقيم</div>
    </div>

    <?php if($_SESSION['dashUser:EPS'] == "admin" || $_SESSION['dashUser:EPS'] == "evaluator"): ?>
        <li class="nav-item">
            <a class="nav-link text-center" href="evaluation.php">
                <i class="fas fa-edit"></i>
                <span>تقيم الموظفين</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if($_SESSION['dashUser:EPS'] == "admin" || $_SESSION['dashUser:EPS'] == "evaluator"): ?>
<!--        <li class="nav-item">-->
<!--            <a class="nav-link text-center" href="evaluation.php">-->
<!--                <i class="fas fa-edit"></i>-->
<!--                <span>تقيم بالعناصر المخصصه</span>-->
<!--            </a>-->
<!--        </li>-->
    <?php endif; ?>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link text-center" href="show-evaluation.php">
            <i class="fas fa-clipboard-list"></i>
            <span> عرض التقيمات</span>
        </a>
    </li>

    <?php if($_SESSION['dashUser:EPS'] == "admin"): ?>
        <li class="nav-item">
            <a class="nav-link text-center" href="element_evaluation.php">
                <i class="fas fa-ellipsis-v"></i>
                <span> عناصر التقييم </span>
            </a>
        </li>
    <?php endif; ?>





    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>