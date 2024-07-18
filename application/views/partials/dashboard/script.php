<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- Bootstrap 5.3.3 Script-->
<script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Bootstrap Select -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

<!-- Bootstrap Date Picker -->
<script src="<?= base_url('node_modules/bootstrap-datepicker/js/bootstrap-datepicker.js') ?>"></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/1a07ed5a89.js" crossorigin="anonymous"></script>

<!-- DataTables -->
<script src="<?= base_url('node_modules/datatables/datatables.min.js'); ?>"></script>

<script type="text/javascript">
$(document).ready(function (){

    function cancelExpiredBookings() {
        var xhr = new XMLHttpRequest();
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    console.log(response.message);
                    console.log("Cancelled bookings count: " + response.cancelledBookings);
                }
            }
        }
    
        xhr.open('GET', '<?= base_url('dashboard/Bookings/autoCancelExpiredBooking') ?>', true);
        xhr.send();
    }

    setInterval(cancelExpiredBookings, 10000);
    cancelExpiredBookings();
});
</script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- My Script -->
<script src="<?= base_url('assets/js/script.js'); ?>"></script>

