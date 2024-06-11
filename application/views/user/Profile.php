<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Boat Master</title>
    <link rel="web icon" href="../assets/images/logo.png" />

    <!-- Bootstrap 5.3.3 CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- My Styles -->
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg sticky-top shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="../assets/images/logo.png" alt="" width="55px" />
            </a>
            <button class="btn" id="offcanvas-navbar" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-navbar" aria-controls="offcanvasExample">
                <i class="fa-solid fa-bars"></i>
            </button>
            <ul class="navbar-nav mx-auto d-flex grid gap-5">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Boats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            <a class="btn btn-secondary navbar-nav" href="#">SIGN IN</a>
        </div>
    </nav>
    <!-- Nav End -->

    
    <main>
        <section class="profile-details py-5">
            <div class="container">
                <h1>Profile</h1>
                <div class="profile-info">
                    <img id="profile-pic" src="https://via.placeholder.com/150" alt="Profile Picture">
                    <div class="details">
                        <p><strong>Name:</strong> <span id="profile-name"><?= set_value('profile-name', $user->custName) ?></span></p>
                        <p><strong>Email:</strong> <span id="profile-email"><?= set_value('profile-name', $user->custEmail) ?></span></p>
                        <p><strong>Address:</strong> <span id="profile-address"><?= set_value('profile-name', $user->custAddress) ?></span></p>
                        <p><strong>Phone:</strong> <span id="profile-phone"><?= set_value('profile-name', $user->custPhone) ?></span></p>
                        <button class="btn-primary" id="edit-profile-button">Edit</button>
                    </div>
                </div>

                <div class="container">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <p class="alert alert-success"><?= $this->session->flashdata('success') ?></p>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')) : ?>
                        <p class="alert alert-danger"><?= $this->session->flashdata('error') ?></p>
                    <?php endif; ?>

                    <?= form_open_multipart('user/profile/update', array('class' => 'form-edit', 'id' => 'edit-profile-form')); ?>
                    <div class="row mt-1">
                        <div class="col-md-6 mt-1">
                            <label for="custName">Name:</label>
                            <input class="mt-1 form-control" type="text" id="custName" name="custName" value="<?= set_value('custName', $user->custName) ?>"><br>
                            <label for="custEmail">Email:</label>
                            <input class="mt-1 form-control" type="email" id="custEmail" name="custEmail" value="<?= set_value('profile-name', $user->custEmail) ?>"><br>
                            <label for="custAddress">Address:</label>
                            <input class="mt-1 form-control" type="text" id="custAddress" name="custAddress" value="<?= set_value('profile-name', $user->custAddress) ?>">
                        </div>
                        <div class="col-md-6 mt-1">
                            <label for="custPhone">Phone:</label>
                            <input class="mt-1 form-control" type="text" id="custPhone" name="custPhone" value="<?= set_value('profile-name', $user->custPhone) ?>"><br>
                            <label for="custPic">Profile Picture:</label>
                            <input class="mt-1 form-control" type="file" id="custPic" name="custPic">
                        </div>
                    </div>
                    <button class="btn-primary" type="submit" id="save-profile-btn" name="save-profile-btn">Save</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </section>

        <section class="password my-3">
            <div class="container">
                <h2>Password</h2>
                <div class="profile-password">
                    <label for="profile-password"><strong>Password:</strong></label>
                    <input type="password" id="profile-password" value="<?= set_value('profile-password', $user->custPassword) ?>" readonly>
                    <button class="btn-primary" id="edit-password-button">Edit</button>
                </div>
                <form class="form-edit" id="edit-password-form" style="display:none;">
                    <div class="row mt-1">
                        <div class="col-md-6 mt-1">
                            <label for="newPass">New Password:</label>
                            <input class="form-control" type="password" id="newPass" name="newPass">
                            <label for="confirmPass">Confirm Password:</label>
                            <input class="form-control" type="password" id="confirmPass" name="confirmPass">
                        </div>
                    </div>
                    <button class="btn-primary mt-3" type="button" id="save-password-btn">Save</button>
                </form>
            </div>
        </section>

        <section class="reviews my-3">
            <div class="container">
                <h2>My Reviews</h2>
                <ul>
                    <li>Review 1: Great stay at Hotel XYZ!</li>
                    <li>Review 2: Wonderful experience at Resort ABC.</li>
                    <li>Review 3: Cozy apartment at DEF.</li>
                </ul>
            </div>
        </section>
    </main>


    <!-- Footer Section Start -->
    <footer>
        <div class="container">
            <div class="row h-100">
                <div class="col-4 d-flex align-items-center px-0">
                    <p class="mb-0">@2024 BOAT MASTER | All Right Reserved.</p>
                </div>
                <div class="col-4 d-flex gap-5 justify-content-center align-items-center">
                    <a class="social-media d-flex align-items-center justify-content-center" href="#">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a class="social-media d-flex align-items-center justify-content-center" href="#">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                    <a class="social-media d-flex align-items-center justify-content-center" href="#">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a class="social-media d-flex align-items-center justify-content-center" href="#">
                        <i class="fa-solid fa-envelope"></i>
                    </a>
                </div>
                <div class="col-4 px-0 d-flex justify-content-end align-items-center gap-2">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Return & Refund Policy</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Bootstrap 5.3.3 Script-->
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/1a07ed5a89.js" crossorigin="anonymous"></script>

    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- My Script -->
    <script src="../assets/js/script.js"></script>
</body>

</html>