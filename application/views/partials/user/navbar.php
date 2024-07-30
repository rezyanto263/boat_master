<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg sticky-top shadow <?= ($this->session->userdata('custName') != false)? 'login ':'', $hidden;?>">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('home'); ?>">
            <img src="<?= base_url('assets/images/logo.png'); ?>" alt="" width="55px" />
        </a>
        <ul class="navbar-nav mx-auto d-flex grid gap-5">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('home'); ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('boats'); ?>">Boats</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('gallery'); ?>">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('about'); ?>">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('contact'); ?>">Contact</a>
            </li>
        </ul>
        <div class="d-flex">
            <button
                class="btn"
                id="offcanvas-navbar"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvas-menu"
            >
                <i class="fa-solid fa-bars"></i>
            </button>
            <a class="btn btn-secondary btn-signin max" href="<?= base_url('login'); ?>">
                SIGN IN
            </a>
            <div class="btn-icon d-flex">
                <a
                    class="tickets d-flex align-items-center justify-content-center me-3 position-relative notification"
                    href="<?= base_url('tickets') ?>"
                >
                    <i class="fa-solid fa-ticket"></i>
                    <span class="notif-circle text-center">
                        <i class="notif-icon fa-solid fa-exclamation"></i>
                    </span>
                </a>
                <a
                    class="profile-user d-flex align-items-center justify-content-center"
                    href="<?= base_url('profile'); ?>"
                >
                    <?= empty($this->session->userdata('custPicture'))?'<i class="fa-solid fa-circle-user"></i>':'<img class="profile-image" src="'.base_url('assets/uploads/'.$this->session->userdata('custPicture')).'">'; ?>
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas-menu">
    <div class="offcanvas-header">
        <img src="<?= base_url('assets/images/logo.png')?>" width="50">
        <h4 class="offcanvas-title ms-3">MENU</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr class="offcanvas-divider m-0">
    <div class="offcanvas-body w-100">
        <ul class="offcanvas-menu ps-0">
            <li class="offcanvas-item">
                <a href="<?= base_url('home'); ?>" class="offcanvas-link <?= $title == 'Home'?'active':'' ?>">HOME</a>
            </li>
            <li class="offcanvas-item">
                <a href="<?= base_url('boats'); ?>" class="offcanvas-link <?= $title == 'Boats'?'active':'' ?>">BOATS</a>
            </li>
            <li class="offcanvas-item">
                <a href="<?= base_url('gallery'); ?>" class="offcanvas-link <?= $title == 'Gallery'?'active':'' ?>">GALLERY</a>
            </li>
            <li class="offcanvas-item">
                <a href="<?= base_url('about'); ?>" class="offcanvas-link <?= $title == 'About'?'active':'' ?>">ABOUT</a>
            </li>
            <li class="offcanvas-item">
                <a href="<?= base_url('contact'); ?>" class="offcanvas-link <?= $title == 'Contact'?'active':'' ?>">CONTACT</a>
            </li>
        </ul>
    </div>
</div>
<!-- Navbar End -->