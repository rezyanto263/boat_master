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

                <form action="<?= base_url('user/profile/update/' . ($user->custId)) ?>" method="post" enctype="multipart/form-data" class="form-edit needs-validation" id="edit-profile-form" style="display:none;" novalidate>
                    <div class="row mt-1">
                        <div class="col-md-6 mt-1">
                            <input type="number" name="custId" value="<?= htmlspecialchars($user->custId) ?>" hidden>
                            <div>
                                <label for="custName">Name:</label>
                                <input class="mt-1 form-control" type="text" id="custName" name="custName" value="<?= htmlspecialchars($user->custName) ?>" required>
                                <div class="invalid-feedback">You must provide a Name</div>
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

    <section class="password my-3">
        <div class="container">
            <h2>Password</h2>
            <div class="profile-password">
                <label for="profile-password"><strong>Password:</strong></label>
                <input type="password" id="profile-password" value="<?= set_value('profile-password', $user->custPassword) ?>" readonly>
                <button class="btn-primary" id="edit-password-button">Edit</button>
            </div>
            <form class="form-edit needs-validation" action="<?= base_url('user/profile/updatePassword/' . ($user->custId)) ?>" id="edit-password-form" style="display: none;" method="post" novalidate>
                <div class="row mt-1">
                    <div class="col-md-6 mt-1">
                        <label for="password">Current Password:</label>
                        <div>
                            <input class="form-control" type="password" id="password" name="current_password" required>
                            <div class="invalid-feedback">You must provide a Password</div>
                        </div>
                        <br>
                        <label for="password">New Password:</label>
                        <div>
                            <input class="form-control" type="password" id="password" name="newPass" required>
                            <div class="invalid-feedback">You must provide a Password</div>
                        </div>
                        <br>
                        <label for="password_confirm">Confirm Password:</label>
                        <div>
                            <input class="form-control" type="password" id="password_confirm" name="password_confirm" required>
                            <div class="invalid-feedback">You must provide a Confirm Password</div>
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

<?php if ($this->session->flashdata('success') || $this->session->flashdata('error')) : ?>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast show message" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <?= $this->session->flashdata('success') ? $this->session->flashdata('success') : $this->session->flashdata('error') ?></p>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>