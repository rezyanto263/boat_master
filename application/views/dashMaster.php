<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view($head);?>
</head>
<body class="dashboard">
    <main class="dashboard-admin">
        <?php $this->load->view($navigation);?>
        <?php $this->load->view($content);?>
    </main>

    <?php $this->load->view($script);?>
</body>
</html>