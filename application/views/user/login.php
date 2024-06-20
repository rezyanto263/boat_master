<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view($head); ?>
</head>
<body class="auth">
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <div class="wrapper-auth mx-auto shadow">
                    <div class="text-center">
                        <h3 class="mb-4">LOGIN ACCOUNT</h3>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <form method="post" action="<?= base_url('Auth/login') ?>" class="user">
                        <div class="input-box mb-1">
                            <input type="text" name="custEmail" placeholder="Email Address" value="<?= set_value('custEmail'); ?>">
                            <i class="fas fa-envelope"></i>
                            <?= form_error('custEmail', '<small class="text-warning ms-3">', '</small>'); ?>
                        </div>
                        <div class="input-box mb-3">
                            <input type="password" name="custPassword" placeholder="Password" value="<?= set_value('custPassword'); ?>">
                            <i class="fas fa-lock"></i>
                            <?= form_error('custPassword', '<small class="text-warning ms-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-secondary w-100 mt-4">
                            LOGIN
                        </button>
                    </form>
                    <hr>
                    <div class="sign-up text-center d-flex align-items-center justify-content-center gap-1">
                        Don't have an account? 
                        <a class="my-0" href="<?= base_url('register') ?>">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view($script); ?>
</body>
</html>
