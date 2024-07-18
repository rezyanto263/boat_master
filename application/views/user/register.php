<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view($head); ?>
    </head>
    <body class="auth">
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                    <div class="wrapper-auth registers mx-auto shadow">
                        <div class="text-center">
                            <h3 class="mb-4">CREATE AN ACCOUNT!</h3>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <form method="post" action="<?= base_url('register') ?>" class="user">
                            <div class="row mb-4">
                                <div class="col-6">
                                    <div class="input-box my-3">
                                        <input type="text" name="custName" value="<?= set_value('custName') ?>" placeholder="Full Name" onkeypress="return isLetterSpaceKey(event)" autocomplete="off">
                                        <i class="fas fa-user"></i>
                                        <?= form_error('custName', '<small class="text-warning ms-3">', "</small>"); ?>
                                    </div>
                                </div>    
                                <div class="col-6">
                                    <div class="input-box my-3">
                                        <input type="text" name="custEmail" value="<?= set_value('custEmail') ?>" placeholder="Email Address">
                                        <i class="fas fa-envelope"></i>
                                        <?= form_error('custEmail', '<small class="text-warning ms-3">', "</small>"); ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-box my-3">
                                        <input type="password" name="custPassword" value="<?= set_value('custPassword') ?>" placeholder="Password">
                                        <i class="fas fa-lock"></i>
                                        <?= form_error('custPassword', '<small class="text-warning ms-3">', "</small>"); ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-box my-3">
                                        <input type="password" name="passconf" value="<?= set_value('passconf') ?>" placeholder="Password Confirmation">
                                        <i class="fas fa-lock"></i>
                                        <?= form_error('passconf', '<small class="text-warning ms-3">', "</small>"); ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-box my-3">
                                        <input type="text" name="custPhone" value="<?= set_value('custPhone') ?>" placeholder="Phone" onkeypress="return isNumberKey(event)">
                                        <i class="fas fa-phone"></i>
                                        <?= form_error('custPhone', '<small class="text-warning ms-3">', "</small>"); ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-box my-3">
                                        <input type="text" name="custAddress" value="<?= set_value('custAddress') ?>" placeholder="Address">
                                        <i class="fas fa-map-marked"></i>
                                        <?= form_error('custAddress', '<small class="text-warning ms-3">', "</small>"); ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary w-100">
                            Register
                            </button>
                        </form>
                        <hr>
                        <div class="sign-in text-center d-flex align-items-center justify-content-center gap-1">
                            Already have an account?
                            <a class="my-0"  href="<?= base_url('login') ?>">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->session->userdata('message'); ?>
        <?php $this->load->view($script); ?>
    </body>
</html>