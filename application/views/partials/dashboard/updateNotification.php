
<button type="button" class="notifications d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-solid fa-bell"></i>
    <?php if (!empty($countUnclicked)) { ?>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    <?= $countUnclicked ?>
    <span class="visually-hidden">unread messages</span>
    </span>
    <?php } ?>
</button>
<ul class="dropdown-menu rounded">
<?php 
if (!empty($notifications)) {
foreach($notifications as $notif): 
    if ($notif['notifStatus'] == 'Unclicked') {
?>
<li>
    <a href="<?= base_url('dashboard/Bookings/notificationsRedirect/'.$notif['notifId']) ?>" class="dropdown-item unclicked-booking rounded">
        <div class="notification-header">
            <?= $notif['custName'] ?> made a booking! <span class="badge orange-badges" style="padding: 3px;">NEW!</span>
        </div>
        <p class="time mb-0 text-white"><?= date('l, d-m-Y h:i A', strtotime($notif['notifCreatedAt'])); ?></p>
    </a>
</li>
<?php 
    }
endforeach;
foreach($notifications as $notif): 
    if($notif['notifStatus'] == 'Cancelled') { ?>
<li>
    <a class="dropdown-item unclicked-cancel rounded">
        <div class="notification-header">
            <?= $notif['custName'] ?> booking cancelled!
        </div>
        <p class="time mb-0 text-white"><?= date('l, d-m-Y h:i A', strtotime($notif['notifCreatedAt'])); ?></p>
    </a>
</li>
<?php 
    } 
endforeach;
foreach($notifications as $notif): 
    if ($notif['notifStatus'] == 'Clicked') { ?>
<li>
    <a class="dropdown-item clicked rounded">
        <div class="notification-header">
            <?= $notif['custName'] ?> made a booking!
        </div>
        <p class="time mb-0"><?= date('l, d-m-Y h:i A', strtotime($notif['notifCreatedAt'])); ?></p>
    </a>
</li>
<?php 
    }
endforeach;
} else {
?>
<div class="d-flex justify-content-center">
    <h5 class="mb-0">masih koosong</h5>
</div>
<?php } ?>
</ul>
