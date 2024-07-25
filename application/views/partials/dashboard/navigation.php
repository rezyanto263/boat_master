        <!-- Navbar Start -->
        <nav
            class="dashboard-navbar shadow-sm d-flex align-items-center justify-content-between"
            id="dashnav"
        >
            <div
                class="container-fluid d-flex align-items-center justify-content-between"
            >
                <h2 class="mb-0"><?= $title; ?><span>.</span></h2>
                <div class="menu d-flex gap-4 align-items-center">
                    <div class="btn-group dropstart" id="notifications">
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
                    </div>
                    <div class="dropdown">
                        <button class="border-0 profile d-flex align-items-center justify-content-center" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-user"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-start p-0">
                            <li><a class="dropdown-item" href="<?= base_url('auth/logoutAdmin') ?>"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
            
        <!-- Sidebar Start -->
        <aside class="dashboard-sidebar shadow d-flex flex-column">
            <div class="sidebar-logo py-3">
                <img
                    class="d-flex mx-auto small-logo"
                    src="<?= base_url('assets/images/logo.png') ?>"
                    alt=""
                />
                <h4 class="mt-2 text-center textmin mb-0">BOAT MASTER</h4>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item <?= ($title=='DASHBOARD')? 'active':''; ?>">
                    <a class="gap-3" href="<?= base_url('dashboard'); ?>">
                        <div class="icon text-center">
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                        <span class="textmin">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($title=='BOOKINGS')? 'active':''; ?>">
                    <a class="gap-3" href="<?= base_url('dashboard/bookings'); ?>">
                        <div class="icon text-center">
                            <i class="fa-solid fa-ticket"></i>
                        </div>
                        <span class="textmin">Bookings</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($title=='PACKAGES')? 'active':''; ?>">
                    <a class="gap-3" href="<?= base_url('dashboard/packages'); ?>">
                        <div class="icon tex-center">
                            <i class="fa-solid fa-cubes"></i>
                        </div>
                        <span class="textmin">Packages</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($title=='BOATS')? 'active':''; ?>">
                    <a class="gap-3" href="<?= base_url('dashboard/boats'); ?>">
                        <div class="icon tex-center">
                            <i class="fa-solid fa-ship"></i>
                        </div>
                        <span class="textmin">Boats</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($title=='EXTRAS')? 'active':''; ?>">
                    <a class="gap-3" href="<?= base_url('dashboard/extras'); ?>">
                        <div class="icon text-center">
                            <i class="fa-solid fa-circle-plus"></i>
                        </div>
                        <span class="textmin">Extras</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($title=='PROMOS')? 'active':''; ?>">
                    <a class="gap-3" href="<?= base_url('dashboard/promos'); ?>">
                        <div class="icon text-center">
                            <i class="fa-solid fa-fire"></i>
                        </div>
                        <span class="textmin">Promos</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($title=='GALLERY')? 'active':''; ?>">
                    <a class="gap-3" href="<?= base_url('dashboard/gallery'); ?>">
                        <div class="icon text-center">
                            <i class="fa-solid fa-photo-film"></i>
                        </div>
                        <span class="textmin">Gallery</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($title=='BADGES')? 'active':''; ?>">
                    <a class="gap-3" href="<?= base_url('dashboard/badges'); ?>">
                        <div class="icon text-center">
                            <i class="fa-solid fa-tags"></i>
                        </div>
                        <span class="textmin">Badges</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($title=='GUIDES')? 'active':''; ?>">
                    <a class="gap-3" href="<?= base_url('dashboard/guides'); ?>">
                        <div class="icon text-center">
                            <i class="fa-solid fa-id-badge"></i>
                        </div>
                        <span class="textmin">Guides</span>
                    </a>
                </li>
            </ul>
            <button class="btn-sidebar mx-auto">
                <i class="fa-solid fa-chevron-left min"></i>
                <i class="fa-solid fa-chevron-right max"></i>
            </button>
        </aside>
        <!-- Sidebar End -->
