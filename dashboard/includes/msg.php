<?php
$noty = true;
$stm = $conn->prepare("SELECT * FROM `contact` WHERE reared = 0");
$stm->execute();
$count = $stm->rowCount();
?>
<!-- Nav Item - Messages -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <!-- Counter - Messages -->
        <?php if($count != 0): ?>
            <span class="badge badge-danger badge-counter"><?=$count?>+</span>
        <?php endif; ?>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header font-weight-bold text-center fonty-par bg-dark" style="font-size: medium; border-color: white">
           رسائل التواصل
        </h6>

<?php

if($count > 0) {
    $rows = $stm->fetchAll();
    foreach ($rows as $row) {
        $id = $row['id'];
        $date = $row['date'];
    ?>
        <a class="dropdown-item d-flex align-items-center" href="show-msg.php?id=<?=$id?>&read" style="direction: rtl">
            <div class="mr-3">
                <div class="icon-circle ">
                    <i class="fas fa-envelope fa-2x "></i>
                </div>
            </div>
            <div class="text-right mr-2">
                <div class="small text-gray-500"><?php echo  date('d M, Y', $date)?></div>
                <br>
                <div class="fonty-par" style="margin-top: -17px; font-size: medium">رسالة جديدة</div>
            </div>
        </a>
        <?php

    }
}else{
    $noty = false;


    ?>
    <h5 class="text-center p-5">ليس هناك أشعارات</h5>
<?php }?>


        <?php if($noty): ?>
            <a class="dropdown-item text-center small text-gray-500" href="delete-noty.php?msg">حذف الاشعارات</a>
        <?php endif; ?>
    </div>
</li>