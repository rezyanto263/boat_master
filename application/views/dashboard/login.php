<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view($head); ?>
</head>
<body class="auth">
    <div class="container">
        <div class="row">
            <div class="col-lg">
                <div class="wrapper-auth admin mx-auto shadow">
                    <div class="login-logo d-flex justify-content-center w-100 mb-3">
                        <img src="<?= base_url('assets/images/logo.png') ?>" alt="">
                    </div>
                    <div class="text-center">
                        <h3 class="mb-4">LOGIN ADMIN</h3>
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <form method="post" action="<?= base_url('loginadmin') ?>" class="user">
                        <div class="input-box mb-1">
                            <input type="text" name="adminName" placeholder="Username" value="<?= set_value('adminName'); ?>">
                            <i class="fas fa-envelope"></i>
                            <?= form_error('adminName', '<small class="text-warning ms-3">', '</small>'); ?>
                        </div>
                        <div class="input-box mb-3">
                            <input type="password" name="adminPassword" placeholder="Password" value="<?= set_value('adminPassword'); ?>">
                            <i class="fas fa-lock"></i>
                            <?= form_error('adminPassword', '<small class="text-warning ms-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-4">
                            LOGIN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view($script); ?>
</body>
</html>
