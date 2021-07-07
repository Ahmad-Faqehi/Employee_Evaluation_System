
<?php
$noty = true;
$stm = $conn->prepare("SELECT * FROM `order` WHERE reared = 0");
$stm->execute();
$count = $stm->rowCount();
?>
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <?php if($count != 0): ?>
        <span class="badge badge-danger badge-counter"><?=$count?>+</span>
        <?php endif; ?>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header font-weight-bold text-center fonty-par bg-dark" style="font-size: medium; border-color: white">
            أشعارات التواصل
        </h6>

        <?php

        if($count > 0) {
            $rows = $stm->fetchAll();
            foreach ($rows as $row) {
                $id = $row['id'];
                $do = $row['to_who'];
                $import = $row['important'];
                $reared = $row['reared'];
                $date = $row['date_order'];


                switch ($do){
                    case 'support':
                        $job = "لدعم الفني";
                        $icon = "far fa-question-circle";
                        break;

                    case 'key':
                        $job = "لمسؤولة المفاتيح";
                        $icon = "fas fa-key";
                        break;

                    case 'security':
                        $job = "للامن";
                        $icon = "fas fa-user-shield";
                        break;

                    case 'doctor':
                        $job = "على الطبيبة";
                        $icon = "fas fa-user-md";
                        break;

                    default:
                        $job = "";
                        $icon = "";
                }

                if($import == 0){
                    $title = "طلب جديد " . $job;
                }else{
                    $title = "طلب جديد " . $job . "- هام";
                }

                ?>
        <a class="dropdown-item d-flex align-items-center" href="page_details.php?do=<?=$do?>&order_id=<?=$id?>&read" style="direction: rtl">
            <div class="mr-3">
                <div class="icon-circle bg-<?php if($import): echo "danger"; else: echo "dark"; endif;?>">
                    <i class="<?=$icon?> fa-1x text-white"></i>
                </div>
            </div>
            <div class="text-right mr-2">
                <div class="small text-gray-500"><?php echo  date('d M, Y', $date)?></div>
                <br>
                <div class="fonty-par" style="margin-top: -17px; font-size: medium"><?=$title?> </div>
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
        <a class="dropdown-item text-center small text-gray-500" href="delete-noty.php?order">حذف الاشعارات</a>
        <?php endif; ?>
    </div>
</li>