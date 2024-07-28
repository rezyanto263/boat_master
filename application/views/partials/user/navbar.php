<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg sticky-top shadow <?= ($this->session->userdata('custName') != false)? 'login ':'', $hidden;?>">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('home'); ?>">
            <img src="<?= base_url('assets/images/logo.png'); ?>" alt="" width="55px" />
        </a>
        <button
            class="btn"
            id="offcanvas-navbar"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvas-navbar"
            aria-controls="offcanvasExample"
        >
            <i class="fa-solid fa-bars"></i>
        </button>
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
        <a class="btn btn-secondary btn-signin max navbar-nav" href="<?= base_url('login'); ?>">
            SIGN IN
        </a>
        <div class="wrapper btn-icon d-flex flex-row">
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
</nav>
<!-- Navbar End -->