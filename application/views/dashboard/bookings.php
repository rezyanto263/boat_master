<!-- Content Section Start -->
<section class="content-section">
    <div class="container-fluid 100vh p-5">
        <div class="table-content shadow">
            <div class="table-header w-100 gap-3 d-flex flex-row">
                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addbooking">
                    <i class="fa-solid fa-circle-plus me-1"></i>
                    ADD
                </button>
            </div>
            <hr>
            <div class="text-center">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <table id="datatable" class="display table my-3" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-start" width="20px">#</th>
                        <th class="text-start">Customer</th>
                        <th class="text-start">Schedule</th>
                        <th class="text-start">Boat</th>
                        <th class="text-start">Package</th>
                        <th class="text-start">Anchor</th>
                        <th class="text-start">Adults</th>
                        <th class="text-start">Teens</th>
                        <th class="text-start">Toddlers</th>
                        <th class="text-start">Status</th>
                        <th class="text-start">Expired At</th>
                        <th class="text-start">Promo Code</th>
                        <th class="text-start">Price</th>
                        <th class="text-start">Notes</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php $num=0; foreach($booking as $key): $num++;?>
                    <tr>
                        <td><?= $num; ?></td>
                        <td><?= $key['custName']; ?></td>
                        <td><?= date('d-m-Y', strtotime($key['bookSchedule'])); ?></td>
                        <td><?= $key['boatName']; ?></td>
                        <td><?= $key['packageName']; ?></td>
                        <td><?= $key['boatStartPoint']; ?></td>
                        <td><?= $key['bookAdults']; ?></td>
                        <td><?= $key['bookTeens']; ?></td>
                        <td><?= $key['bookToddlers']; ?></td>
                        <td><?= $key['bookStatus']; ?></td>
                        <td><?= empty($key['bookExpiredAt'])?'NEED APPROVALS':date('D, d-m-Y h:i A', strtotime($key['bookExpiredAt'])); ?></td>
                        <td><?= $key['procodeName']; ?></td>
                        <td><?= number_format($key['bookPrice']); ?> IDR</td>
                        <td class="overflow-hidden"><?= $key['bookNotes']; ?></td>
                        <td class="action-button justify-content-end">
                            <div class="d-flex flex-row gap-1">
                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delbooking<?= $key['bookId']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editbooking<?= $key['bookId']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <?php if ($key['bookStatus'] == 'Waiting') { ?>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#approvebooking<?= $key['bookId']; ?>">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-start">#</th>
                        <th class="text-start">Customer</th>
                        <th class="text-start">Schedule</th>
                        <th class="text-start">Boat</th>
                        <th class="text-start">Package</th>
                        <th class="text-start">Anchor</th>
                        <th class="text-start">Adults</th>
                        <th class="text-start">Teens</th>
                        <th class="text-start">Toddlers</th>
                        <th class="text-start">Status</th>
                        <th class="text-start">Expired At</th>
                        <th class="text-start">Promo Code</th>
                        <th class="text-start">Price</th>
                        <th class="text-start">Notes</th>
                        <th class="text-start">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
<!-- Content Section End -->

<!-- Modal Add -->
<div class="modal fade" id="addbooking" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form class="needs-validation" action="<?= base_url('dashboard/bookings/addBooking'); ?>" method="post" novalidate>
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD BOOKING</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gy-3">
                    <div class="col-9 pe-0">
                        <label>Customer</label>
                        <select class="selectpicker w-100" data-live-search="true" name="custId" required>
                            <?php foreach($customer as $key): ?>
                            <option value="<?= $key['custId'] ?>"><?= $key['custName'].' - '.$key['custEmail']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            You must select a customer!
                        </div>
                    </div>
                    <div class="col-3 position-relative ps-4">
                        <label>Schedule</label>
                        <input type="date" placeholder="Schedule" name="bookSchedule" min="<?= date('Y-m-d', strtotime('+2 day')); ?>" required>
                    </div>
                    <div class="col-6">
                        <label>Boat</label>
                        <select class="selectpicker w-100" data-live-search="true" name="boatId" required>
                            <?php foreach($boat as $key): ?>
                                <option value="<?= $key['boatId']; ?>"><?= $key['boatName'].' - '.$key['boatType'].' ('.$key['maxPeople'].')'; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            You must select a boat!
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Package</label>
                        <select class="selectpicker w-100" data-live-search="true" name="packageId" required>
                            <?php foreach($package as $key): ?>
                            <option value="<?= $key['packageId'] ?>"><?= $key['packageName'].' - '.$key['packageType']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            You must select a package!
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Adults (14-60)</label>
                        <input class="text-center" type="number" name="bookAdults" value="1" min="1" max="12" required>
                        <div class="invalid-feedback">
                            You must provide an adult people!
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Teens (6-13)</label>
                        <input class="text-center" type="number" name="bookTeens" value="0" min="0" max="5" required>
                        <div class="invalid-feedback">
                            You must provide a teens people!
                        </div>
                    </div>
                    <div class="col-4">
                        <label>Toddlers (0-5)</label>
                        <input class="text-center" type="number" name="bookToddlers" value="0" min="0" max="5" required>
                        <div class="invalid-feedback">
                            You must provide a toddlers people!
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Status</label>
                        <select class="form-select w-100" name="bookStatus">
                            <option value="Waiting">Waiting for Approvals</option>
                            <option value="Not Paid">Not Paid</option>
                            <option value="Paid">Paid</option>
                            <option value="Searching Guides">Searching Guides</option>
                            <option value="Enjoy">Wait For The Day!</option>
                            <option value="Done">Done</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label>Promo Code</label>
                        <?php $null; ?>
                        <select class="selectpicker w-100" data-live-search="true" name="procodeId">
                            <?php foreach($promo as $key): ?>
                                <option value="<?= $key['procodeId']; ?>"><?= $key['procodeName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label>Extras</label>
                        <select class="selectpicker w-100" name="extraIds[]" data-live-search="true" multiple>
                            <?php foreach($extra as $key): ?>
                                <option value="<?= $key['extraId']; ?>"><?= $key['extraName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label>Booking Notes</label>
                        <textarea class="form-control" name="bookNotes" placeholder="Give us some notes for your extra or something you need..." maxlength="256"></textarea>
                    </div>
                    <div class="col-12 d-flex flex-column">
                        <label>Total Price</label>
                        <input type="number" name="bookPrice" hidden>
                        <span id="displayFinalPrice" class="displayFinalPrice w-100 fw-bold">0 IDR</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                <button type="submit" class="btn btn-primary">ADD</button>
            </div>
        </div>
        </form>
    </div>
</div>


<?php foreach($booking as $edit): ?>
<!-- Modal Edit -->
<div class="modal fade" id="editbooking<?= $edit['bookId']; ?>" data-bs-backdrop="static" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 mb-0" id="staticBackdropLabel">EDIT BOOKING</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="needs-validation" action="<?= base_url('dashboard/bookings/editBooking'); ?>"  method="POST" novalidate>
            <div class="modal-body">
                <div class="row gy-3">
                <input type="number" name="bookId" value="<?= $edit['bookId']; ?>" hidden>
                    <div class="col-9 pe-0">
                        <label>Customer</label>
                        <select class="selectpicker w-100" name="custId" required>
                            <?php foreach($customer as $key): ?>
                                <option value="<?= $key['custId'] ?>" <?= $edit['custId']==$key['custId']?'selected':''; ?>><?= $key['custName'].' - '.$key['custEmail']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-3 position-relative ps-4">
                        <label>Schedule</label>
                        <input type="date" placeholder="Schedule" name="bookSchedule" min="<?= date('Y-m-d', strtotime('+2 day')); ?>" value="<?= $edit['bookSchedule']; ?>" required>
                    </div>
                    <div class="col-6">
                        <label>Boat</label>
                        <select class="selectpicker w-100" name="boatId" required>
                            <?php foreach($boat as $key): ?>
                                <option value="<?= $key['boatId']; ?>" <?= $edit['boatId']==$key['boatId']?'selected':''; ?>><?= $key['boatName'].' - '.$key['boatType'].' ('.$key['maxPeople'].')'; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-6">
                        <label>Package</label>
                        <select class="selectpicker w-100" name="packageId" required>
                            <?php foreach($package as $key): ?>
                            <option value="<?= $key['packageId'] ?>" <?= $edit['packageId']==$key['packageId']?'selected':''; ?>><?= $key['packageName'].' - '.$key['packageType']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-4">
                        <label>Adults</label>
                        <input class="text-center" type="number" name="bookAdults" value="<?= $edit['bookAdults']; ?>" min="0" max="12" required>
                    </div>
                    <div class="col-4">
                        <label>Teens</label>
                        <input class="text-center" type="number" name="bookTeens" value="<?= $edit['bookTeens']; ?>" min="0" max="5" required>
                    </div>
                    <div class="col-4">
                        <label>Toddlers</label>
                        <input class="text-center" type="number" name="bookToddlers" value="<?= $edit['bookToddlers']; ?>" min="0" max="5" required>
                    </div>
                    <div class="col-6">
                        <label>Status</label>
                        <select class="form-select w-100" name="bookStatus">
                            <option value="Waiting" <?= $edit['bookStatus']=='Waiting'?'selected':''; ?>>Waiting for Approvals</option>
                            <option value="Not Paid" <?= $edit['bookStatus']=='Not Paid'?'selected':''; ?>>Not Paid</option>
                            <option value="Paid" <?= $edit['bookStatus']=='Paid'?'selected':''; ?>>Paid</option>
                            <option value="Searching Guides" <?= $edit['bookStatus']=='Searching Guides'?'selected':''; ?>>Searching Guides</option>
                            <option value="Enjoy" <?= $edit['bookStatus']=='Enjoy'?'selected':''; ?>>Wait For The Day!</option>
                            <option value="Done" <?= $edit['bookStatus']=='Done'?'selected':''; ?>>Done</option>
                            <option value="Cancelled" <?= $edit['bookStatus']=='Cancelled'?'selected':''; ?>>Cancelled</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label>Promo Code</label>
                        <select class="selectpicker w-100" name="procodeId" required>
                            <?php foreach($promo as $key): ?>
                                <option value="<?= $key['procodeId']; ?>" <?= $edit['procodeId']==$key['procodeId']?'selected':''; ?>><?= $key['procodeName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label>Extras</label>
                        <select class="selectpicker w-100" name="extraIds[]" data-live-search="true" multiple>
                            <?php $selectedExtraIds = explode(',', $edit['bookextraIds']); ?>
                            <?php foreach($extra as $key): ?>
                                <?php $selected = in_array($key['extraId'], $selectedExtraIds) ? 'selected' : ''; ?>
                                <option value="<?= htmlspecialchars($key['extraId']); ?>" <?= $selected; ?>><?= htmlspecialchars($key['extraName']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label>Booking Notes</label>
                        <textarea class="form-control" name="bookNotes" placeholder="Give us some notes for your extra or something you need..." maxlength="256"><?= $edit['bookNotes'] ?></textarea>
                    </div>
                    <div class="col-12 d-flex flex-column">
                        <label>Total Price</label>
                        <input type="number" name="bookPrice" hidden>
                        <span id="displayFinalPrice" class="displayFinalPrice w-100 fw-bold">0 IDR</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                <button type="submit" class="btn btn-primary">SAVE</button>
            </div>
        </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php foreach ($booking as $del) : ?>
    <!-- Modal Delete -->
    <div class="modal fade" id="delbooking<?= $del['bookId'] ?>" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="mb-0 fs-5">DELETE BOOKING</h3>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">CLOSE</button>
                    <a class="btn btn-secondary" href="<?= base_url('dashboard/bookings/delBooking/' . $del['bookId']); ?>">DELETE</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>

<?php 
    foreach($booking as $approve): 
        if ($approve['bookStatus'] == 'Waiting') {
?>
<!-- Modal Delete -->
<div class="modal fade" id="approvebooking<?= $approve['bookId'] ?>" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url('dashboard/bookings/approveBooking'); ?>" method="POST">
            <div class="modal-header">
                <h1 class="mb-0 fs-5">APPROVE BOOKING</h3>
            </div>
            <div class="modal-body">
                Do you want to approve this booking to set the booking status to 'Not Paid' and send an email notification to the customer?
                <input type="hidden" name="bookId" value="<?= $approve['bookId']; ?>">
                <input type="hidden" name="custEmail" value="<?= $approve['custEmail']; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">CLOSE</button>
                <button type="submit" class="btn btn-secondary">APPROVE</button>
            </div>  
            </form>
        </div>
    </div>
</div>
<?php }endforeach;?>

<?php
$boatPrices = [];
foreach ($boat as $b) {
    $boatPrices[$b['boatId']] = $b['boatPrice'];
}
$packagePrices = [];
foreach ($package as $p) {
    $packagePrices[$p['packageId']] = $p['packagePrice'];
}
$procodeDiscount = [];
foreach ($promo as $p) {
    $procodeDiscount[$p['procodeId']] = $p['procodeDiscount'];
}
$extraPrices = [];
foreach ($extra as $e) {
    $extraPrices[$e['extraId']] = $e['extraPrice'];
}
?>

<script>
var boatPrices = <?= json_encode($boatPrices); ?>;
var packagePrices = <?= json_encode($packagePrices); ?>;
var procodeDiscount = <?= json_encode($procodeDiscount); ?>;
var extraPrices = <?= json_encode($extraPrices); ?>;

document.addEventListener('DOMContentLoaded', function() {
    function updateTotalPrice(modal) {
        var boatSelect = modal.querySelector('select[name="boatId"]');
        var packageSelect = modal.querySelector('select[name="packageId"]');
        var adultsInput = modal.querySelector('input[name="bookAdults"]');
        var teensInput = modal.querySelector('input[name="bookTeens"]');
        var toddlersInput = modal.querySelector('input[name="bookToddlers"]');
        var promoSelect = modal.querySelector('select[name="procodeId"]');
        var extraSelect = modal.querySelector('select[name="extraIds[]"]');
        var finalPriceInput = modal.querySelector('input[name="bookPrice"]');
        var displayTotalPrice = modal.querySelector('.displayFinalPrice');

        if (!boatSelect || !packageSelect || !adultsInput || !teensInput || !toddlersInput || !promoSelect || !extraSelect || !finalPriceInput || !displayTotalPrice) {
            console.warn("Elemen tidak ditemukan di modal:", modal);
            return;
        }

        var boatPrice = parseFloat(boatPrices[boatSelect.value]) || 0;
        var packagePrice = parseFloat(packagePrices[packageSelect.value]) || 0;
        var promoDiscount = parseFloat(procodeDiscount[promoSelect.value]) || 0;
        var adults = parseInt(adultsInput.value, 10) || 0;
        var teens = parseInt(teensInput.value, 10) || 0;
        var toddlers = parseInt(toddlersInput.value, 10) || 0;

        var perAdultPrice = 400000;
        var perTeenPrice = 250000;
        var perToddlerPrice = 50000;

            var extraPrice = 0;
            var selectedExtras = [].slice.call(extraSelect.selectedOptions);

            selectedExtras.forEach(function(option) {
                var extraId = option.value;
                extraPrice += parseFloat(extraPrices[extraId]) || 0;
            });

        var finalPrice = boatPrice + packagePrice + extraPrice + (adults * perAdultPrice) + (teens * perTeenPrice) + (toddlers * perToddlerPrice);
        var webDiscount = finalPrice - (finalPrice * 0.1);
        finalPrice = webDiscount - (webDiscount * (promoDiscount / 100));

            finalPriceInput.value = finalPrice;
            displayTotalPrice.textContent = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(finalPrice);
        }

    function addEventListeners(modal) {
        var boatSelect = modal.querySelector('select[name="boatId"]');
        var packageSelect = modal.querySelector('select[name="packageId"]');
        var adultsInput = modal.querySelector('input[name="bookAdults"]');
        var teensInput = modal.querySelector('input[name="bookTeens"]');
        var toddlersInput = modal.querySelector('input[name="bookToddlers"]');
        var promoSelect = modal.querySelector('select[name="procodeId"]');
        var extraSelect = modal.querySelector('select[name="extraIds[]"]');

        if (boatSelect) boatSelect.addEventListener('change', function() { updateTotalPrice(modal); });
        if (packageSelect) packageSelect.addEventListener('change', function() { updateTotalPrice(modal); });
        if (adultsInput) adultsInput.addEventListener('input', function() { updateTotalPrice(modal); });
        if (teensInput) teensInput.addEventListener('input', function() { updateTotalPrice(modal); });
        if (toddlersInput) toddlersInput.addEventListener('input', function() { updateTotalPrice(modal); });
        if (promoSelect) promoSelect.addEventListener('change', function() { updateTotalPrice(modal); });
        if (extraSelect) extraSelect.addEventListener('change', function() { updateTotalPrice(modal); });
    }

    document.querySelectorAll('.modal').forEach(function(modal) {
        modal.addEventListener('shown.bs.modal', function() {
            updateTotalPrice(modal);  
            addEventListeners(modal); 
        });
    });
});
</script>