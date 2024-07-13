<main>
    <section class="profile-details-section my-5">
        <div class="container">
            <h1>Profile</h1>
            <div class="profile-info">
                <img id="profile-pic" src="<?= empty($customer['custPicture'])? 'https://via.placeholder.com/150':base_url('assets/uploads/'.$customer['custPicture']); ?>" width="150" height="150" alt="Profile Picture">
                <div class="details">
                    <p><strong>Name:</strong> <span id="profile-name"><?= $customer['custName']; ?></span></p>
                    <p><strong>Email:</strong> <span id="profile-email"><?= $customer['custEmail']; ?></span></p>
                    <p><strong>Address:</strong> <span id="profile-address"><?= $customer['custAddress']; ?></span></p>
                    <p><strong>Phone:</strong> <span id="profile-phone"><?= $customer['custPhone']; ?></span></p>
                    <button class="btn-primary" id="edit-profile-button">EDIT</button>
                    <a class="ms-3 btn btn-outline-secondary text-decoration-none" href="<?= base_url('logout') ?>">LOGOUT</a>
                </div>
            </div>

            <div class="container">
                <!-- Flashdata Start -->

                <form action="<?= base_url('user/profile/editCustomer') ?>" method="post" enctype="multipart/form-data" class="form-edit needs-validation" id="edit-profile-form" style="display:none;" novalidate>
                    <div class="row mt-1">
                        <div class="col-md-6 mt-1">
                            <div>
                                <label>Name:</label>
                                <input class="mt-1 form-control" type="text" name="custName" value="<?= $customer['custName']; ?>" required>
                                <div class="invalid-feedback">You must provide a Name</div>
                                <div class="valid-feedback">Looks Fine.</div>
                            </div>
                            <br>

                            <label>Email:</label>
                            <div>
                                <input class="mt-1 form-control" type="email" id="custEmail" name="custEmail" value="<?= $customer['custEmail']; ?>" required readonly>
                                <div class="invalid-feedback">You must provide a valid email.</div>
                            </div>
                            <br>

                            <label>Address:</label>
                            <div>
                                <input class="mt-1 form-control" type="text" id="custAddress" name="custAddress" value="<?= $customer['custAddress']; ?>" required>
                                <div class="invalid-feedback">You must provide an address.</div>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-6 mt-1">
                            <label>Phone:</label>
                            <div>
                                <input class="mt-1 form-control" type="text" id="custPhone" name="custPhone" value="<?= $customer['custPhone']; ?>" required>
                                <div class="invalid-feedback">You must provide your Phone Number.</div>
                            </div>
                            <br>

                            <label>Profile Picture:</label>
                            <input class="mt-1 form-control" type="file" name="custPicture">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">SAVE</button>
                </form>
            </div>
        </div>


    </section>

    <section class="change-password-section my-5">
        <div class="container">
            <h2>Change Password</h2>
            <div class="profile-password">
                <button class="btn-primary" id="edit-password-button">EDIT</button>
            </div>
            <form class="form-edit needs-validation" action="<?= base_url('user/profile/changePassword') ?>" id="edit-password-form" style="display: none;" method="post" novalidate>
                <div class="row mt-1">
                    <div class="col-md-6 mt-1">
                        <label>Current Password:</label>
                        <div>
                            <input class="form-control" type="password" name="oldcustPassword" required>
                            <div class="invalid-feedback">You must provide a Password</div>
                        </div>
                        <br>
                        <label>New Password:</label>
                        <div>
                            <input class="form-control" type="password" name="newcustPassword" required>
                            <div class="invalid-feedback">You must provide a Password</div>
                        </div>
                        <br>
                        <label>Confirm Password:</label>
                        <div>
                            <input class="form-control" type="password" name="confirmNewPassword" required>
                            <div class="invalid-feedback">You must provide a Confirm Password</div>
                        </div>
                    </div>
                </div>
                <button class="btn-primary mt-3" type="submit">SAVE</button>
            </form>
        </div>
    </section>

    <section class="reviews-section my-5">
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

<?php if ($this->session->flashdata('message')) : ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <?= $this->session->flashdata('message'); ?>
    </div>
<?php endif; ?>