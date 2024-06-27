<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Boat Master</title>
    <link rel="web icon" href="<?= base_url('assets/images/logo.png') ?>" />

    <!-- Bootstrap 5.3.3 CSS -->
    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?> " />

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- My Styles -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" />

    <style>
        .modal-content {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-header .close {
            margin-top: -10px;
        }

        .modal-body {
            padding: 2rem;
            text-align: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .modal-body p {
            font-size: 1.1rem;
        }

        .modal.fade .modal-dialog {
            transform: scale(0.7);
            transition: transform 0.3s ease-out;
        }

        .modal.fade.show .modal-dialog {
            transform: scale(1);
        }
    </style>

</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg sticky-top shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="<?= base_url('assets/images/logo.png') ?> " alt="" width="55px" />
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
                    <!-- Flashdata Start -->
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="modal fade" id="flashMessageModal" tabindex="-1" role="dialog" aria-labelledby="flashMessageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content alert-success">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="flashMessageModalLabel">Success</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><?= $this->session->flashdata('success') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php elseif ($this->session->flashdata('error')) : ?>
                        <div class="modal fade" id="flashMessageModal" tabindex="-1" role="dialog" aria-labelledby="flashMessageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content alert-danger">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="flashMessageModalLabel">Error</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><?= $this->session->flashdata('error') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Flashdata END -->

                    <form action="<?= base_url('user/profile/update/' . ($user->custId)) ?>" method="post" enctype="multipart/form-data" class="form-edit needs-validation" id="edit-profile-form" style="display:none;" novalidate>
                        <div class="row mt-1">
                            <div class="col-md-6 mt-1">
                                <input type="number" name="custId" value="<?= htmlspecialchars($user->custId) ?>" hidden>
                                <div>
                                    <label for="custName">Name:</label>
                                    <input class="mt-1 form-control" type="text" id="custName" name="custName" value="<?= htmlspecialchars($user->custName) ?>" required>
                                    <div class="invalid-feedback">You must provide a name.</div>
                                    <div class="valid-feedback">Looks Fine.</div>
                                </div>
                                <br>

                                <label for="custEmail">Email:</label>
                                <div>
                                    <input class="mt-1 form-control" type="email" id="custEmail" name="custEmail" value="<?= htmlspecialchars($user->custEmail) ?>" required readonly>
                                    <div class="invalid-feedback">You must provide a valid email.</div>
                                </div>
                                <br>

                                <label for="custAddress">Address:</label>
                                <div>
                                    <input class="mt-1 form-control" type="text" id="custAddress" name="custAddress" value="<?= htmlspecialchars($user->custAddress) ?>" required>
                                    <div class="invalid-feedback">You must provide an address.</div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6 mt-1">
                                <label for="custPhone">Phone:</label>
                                <div>
                                    <input class="mt-1 form-control" type="text" id="custPhone" name="custPhone" value="<?= htmlspecialchars($user->custPhone) ?>" required>
                                    <div class="invalid-feedback">You must provide your Phone Number.</div>
                                </div>
                                <br>

                                <label for="custPic">Profile Picture:</label>
                                <input class="mt-1 form-control" type="file" id="custPic" name="custPic">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" id="save-profile-btn" name="save-profile-btn">Save</button>
                    </form>



                </div>
            </div>
        </section>
        <div id="hasSuccessMessage" style="display:none;">
            <?= json_encode($this->session->flashdata('success') ? true : false) ?>
        </div>
        <div id="hasErrorMessage" style="display:none;">
            <?= json_encode($this->session->flashdata('error') ? true : false) ?>
        </div>

        <section class="password my-3">
            <div class="container">
                <h2>Password</h2>
                <div class="profile-password">
                    <label for="profile-password"><strong>Password:</strong></label>
                    <input type="password" id="profile-password" value="<?= set_value('profile-password', $user->custPassword) ?>" readonly>
                    <button class="btn-primary" id="edit-password-button">Edit</button>
                </div>
                <form class="form-edit needs-validation" id="edit-password-form" style="display: none;" novalidate>
                    <div class="row mt-1">
                        <div class="col-md-6 mt-1">
                            <label for="newPass">New Password:</label>
                            <div>
                                <input class="form-control" type="password" id="newPass" name="newPass" required>
                                <div class="invalid-feedback">You must provide Password</div>
                            </div>
                            <br>
                            <label for="confirmPass">Confirm Password:</label>
                            <div>
                                <input class="form-control" type="password" id="confirmPass" name="confirmPass" required>
                                <div class="invalid-feedback">You must provide Confirm Password</div>
                            </div>
                        </div>
                    </div>
                    <button class="btn-primary mt-3" type="submit" id="save-password-btn">Save</button>
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
    <script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')  ?>"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/1a07ed5a89.js" crossorigin="anonymous"></script>

    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- My Script -->
    <script src="<?= base_url('assets/js/script.js') ?>"></script>
    <script>
        (function() {
            'use strict';

            var forms = document.querySelectorAll('.needs-validation');

            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>


</body>

</html>