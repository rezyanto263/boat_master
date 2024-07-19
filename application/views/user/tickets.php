<main>
    <!-- Tickets Section Start -->
    <section class="current-tickets-section py-5">
        <div class="container pb-5">
            <h1 class="text-center">CURRENT TICKETS</h1>
            <?php 
            if (!empty($tickets)) {
                $filteredTickets = array_filter($tickets, function($tickets) {
                    return $tickets['bookStatus'] != 'Done' && $tickets['bookStatus'] != 'Cancelled';
                });
            foreach($tickets as $key): 
                if ($key['bookStatus'] != 'Cancelled' && $key['bookStatus'] != 'Done') {
            ?>
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-3 p-0">
                    <div
                        class="qr-code-ticket py-5 ps-4 pe-2 d-flex flex-column align-items-center justify-content-center"
                    >   
                        <div class="d-flex justify-content-center p-0">
                            <img draggable="false" <?= $key['bookStatus']=='Waiting'?'class="blur-qr"':'' ?> src="data:image/png;base64,<?= base64_encode($qrcode[$key['bookId']]); ?>" alt="" />
                        </div>
                        <p class="mt-1 booking-status fw-bold">STATUS: <span><?= $key['bookStatus']!='Waiting'?strtoupper($key['bookStatus']):'WAITING FOR APPROVALS'; ?></span></p>
                        <?php if ($key['bookStatus'] == 'Not Paid') { ?>
                        <a class="btn-secondary text-decoration-none text-center" href="<?= base_url('checkout/'.$key['bookId']); ?>">
                            PAY NOW!
                        </a>
                        <?php }else if ($key['bookStatus'] == 'Waiting') { ?>
                        <button
                        class="btn-secondary"
                        data-bs-toggle="modal"
                        data-bs-target="#qr-code<?= $key['bookId']; ?>" disabled>
                            WAITING...
                        </button>
                        <?php }else { ?>
                        <button
                        class="btn-secondary"
                        data-bs-toggle="modal"
                        data-bs-target="#qr-code<?= $key['bookId']; ?>">
                            SCAN THIS CODE!
                        </button>
                        <?php } ?>
                        <div class="blue-circle"></div>
                    </div>
                </div>
                <div class="col-xl-8 col-xxl-6 col-lg-8 p-0">
                    <div
                        class="details-ticket py-5 ps-lg-5 ps-xl-5 ps-xxl-5 ps-5 pe-4 d-flex flex-column justify-content-start"
                    >
                        <h1 class="mb-0"><?= strtoupper($key['packageName']); ?></h1>
                        <h3 class="mb-0 text-white"><?= strtoupper($key['boatType']); ?> TOUR</h3>
                        <div class="time d-flex align-items-center gap-3 mt-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                            <p class="text-white mb-0"><?= date('l, d-m-Y', strtotime($key['bookSchedule'])); ?></p>
                        </div>
                        <div class="time d-flex align-items-center gap-3 mt-1">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <p class="text-white mb-0">08:00 AM</p>
                        </div>
                        <div class="place d-flex align-items-center gap-3 mt-1">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <a class="text-white" href="#"
                                >Jl. Kemana Hatiku Senang No.1 Sanur, Bali.</a
                            >
                        </div>
                        <div class="ticket-people d-flex gap-5 mt-3">
                            <div
                                class="adult-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">ADULT</p>
                                <div class="adult-total">
                                    <h1><?= $key['bookAdults']; ?></h1>
                                </div>
                            </div>
                            <div
                                class="teen-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">TEEN</p>
                                <div class="teen-total">
                                    <h1><?= $key['bookTeens']; ?></h1>
                                </div>
                            </div>
                            <div
                                class="kid-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">TODDLER</p>
                                <div class="kid-total">
                                    <h1><?= $key['bookToddlers']; ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="blue-circle"></div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-4">
                <div class="col-xxl-8 col-lg-9">
                    <p class="text-white text-center">
                        You can scan the QR code after the payment has been confirmed by
                        the admin. This QR code needs to be scanned at the location before
                        you can use it for the tour. If you want to download it, you can
                        press the "SCAN THIS CODE!" button.
                    </p>
                </div>
            </div>
            <?php }else if(empty($filteredTickets)) { ?>

            <div class="d-flex flex-column align-items-center my-5">
                <img class="w-25 mb-5" src="<?= base_url('assets/images/no-ticket.png'); ?>" alt="">
                <p class="text-white">You haven't booked any ticket yet. Please booking our services.</p>
                <a class="btn-outline-secondary text-decoration-none" href="<?= base_url('boats'); ?>">BOOK NOW</a>
            </div>

            <?php
            break;}
            endforeach;
            }else {
            ?>

            <div class="d-flex flex-column align-items-center my-5">
                <img class="w-25 mb-5" src="<?= base_url('assets/images/no-ticket.png') ?>" alt="">
                <p class="text-white">You haven't booked any ticket yet. Please booking our services.</p>
                <a class="btn-outline-secondary text-decoration-none" href="<?= base_url('boats') ?>">BOOK NOW</a>
            </div>

            <?php } ?>
        </div>
    </section>
    <!-- Tickets Section End -->

    <?php 
    foreach($tickets as $modal): 
        if ($modal['bookStatus'] != 'Waiting' && $modal['bookStatus'] != 'Not Paid') {
    ?>
    <div class="modal" tabindex="-1" aria-hidden="true" id="qr-code<?= $modal['bookId']; ?>">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">SCAN THIS QR CODE!</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid" src="data:image/png;base64,<?= base64_encode($qrcode[$key['bookId']]); ?>" alt=""/>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php }endforeach; ?>


    <!-- Tickets History Section Start -->
    <section class="tickets-history-section py-5">
        <div class="container py-5">
            <h1 class="text-center">TICKETS HISTORY</h1>

            <?php 
            if (!empty($tickets)) {
                $filteredTickets = array_filter($tickets, function($tickets) {
                    return $tickets['bookStatus'] == 'Done' || $tickets['bookStatus'] == 'Cancelled';
                });
            foreach($tickets as $history): 
                if ($history['bookStatus'] == 'Done') {
            ?>

            <div class="row d-flex justify-content-center mt-5">
                <div class="col-3 p-0">
                    <div
                        class="qr-code-ticket py-5 ps-4 pe-2 d-flex flex-column align-items-center justify-content-center"
                    >
                        <div class="d-flex justify-content-center p-0">
                            <img src="data:image/png;base64,<?= base64_encode($qrcode[$key['bookId']]); ?>" alt="" />
                        </div>
                        <p class="mt-1 booking-status fw-bold">STATUS: <span><?= strtoupper($history['bookStatus']); ?></span></p>
                        <button class="btn-secondary">SCAN THIS CODE!</button>
                        <div class="blue-circle"></div>
                    </div>
                </div>
                <div class="col-xl-8 col-xxl-6 col-lg-8 p-0">
                    <div
                        class="details-ticket py-5 ps-lg-5 ps-xl-5 ps-xxl-5 ps-5 pe-4 d-flex flex-column justify-content-start"
                    >
                        <h1 class="mb-0"><?= strtoupper($history['packageName']); ?></h1>
                        <h3 class="mb-0 text-white"><?= strtoupper($history['boatType']); ?> TOUR</h3>
                        <div class="time d-flex align-items-center gap-3 mt-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                            <p class="text-white mb-0"><?= date('l, d-m-Y', strtotime($history['bookSchedule'])); ?></p>
                        </div>
                        <div class="time d-flex align-items-center gap-3 mt-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <p class="text-white mb-0">08:00 AM</p>
                        </div>
                        <div class="place d-flex align-items-center gap-3 mt-1">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <a class="text-white" href="#"
                                >Jl. Kemana Hatiku Senang No.1 Sanur, Bali.</a
                            >
                        </div>
                        <div class="ticket-people d-flex gap-5 mt-3">
                            <div
                                class="adult-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">ADULT</p>
                                <div class="adult-total">
                                    <h1><?= $history['bookAdults']; ?></h1>
                                </div>
                            </div>
                            <div
                                class="teen-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">TEEN</p>
                                <div class="teen-total">
                                    <h1><?= $history['bookTeens']; ?></h1>
                                </div>
                            </div>
                            <div
                                class="kid-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">TODDLER</p>
                                <div class="kid-total">
                                    <h1><?= $history['bookToddlers']; ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="blue-circle"></div>
                    </div>
                </div>
            </div>

            <?php }else if ($history['bookStatus']=='Cancelled') { ?>

            <div class="row d-flex justify-content-center mt-5">
                <div class="col-3 p-0">
                    <div
                        class="qr-code-ticket py-5 ps-4 pe-2 d-flex flex-column align-items-center justify-content-center"
                    >
                        <div class="d-flex justify-content-center p-0">
                            <img src="data:image/png;base64,<?= base64_encode($qrcode[$key['bookId']]); ?>" alt="" />
                        </div>
                        <p class="mt-1 booking-status fw-bold">STATUS: <span><?= strtoupper($history['bookStatus']); ?></span></p>
                        <button class="btn-secondary">SCAN THIS CODE!</button>
                        <div class="blue-circle"></div>
                    </div>
                </div>
                <div class="col-xl-8 col-xxl-6 col-lg-8 p-0">
                    <div
                        class="details-ticket py-5 ps-lg-5 ps-xl-5 ps-xxl-5 ps-5 pe-4 d-flex flex-column justify-content-start"
                    >
                        <h1 class="mb-0"><?= strtoupper($history['packageName']); ?></h1>
                        <h3 class="mb-0 text-white"><?= strtoupper($history['boatType']); ?> TOUR</h3>
                        <div class="time d-flex align-items-center gap-3 mt-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>
                            <p class="text-white mb-0"><?= date('l, d-m-Y', strtotime($history['bookSchedule'])); ?></p>
                        </div>
                        <div class="time d-flex align-items-center gap-3 mt-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <p class="text-white mb-0">08:00 AM</p>
                        </div>
                        <div class="place d-flex align-items-center gap-3 mt-1">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <a class="text-white" href="#"
                                >Jl. Kemana Hatiku Senang No.1 Sanur, Bali.</a
                            >
                        </div>
                        <div class="ticket-people d-flex gap-5 mt-3">
                            <div
                                class="adult-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">ADULT</p>
                                <div class="adult-total">
                                    <h1><?= $history['bookAdults']; ?></h1>
                                </div>
                            </div>
                            <div
                                class="teen-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">TEEN</p>
                                <div class="teen-total">
                                    <h1><?= $history['bookTeens']; ?></h1>
                                </div>
                            </div>
                            <div
                                class="kid-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">TODDLER</p>
                                <div class="kid-total">
                                    <h1><?= $history['bookToddlers']; ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="blue-circle"></div>
                    </div>
                </div>
            </div>

            <?php }else if (empty($filteredTickets)) { ?>

                <div class="d-flex flex-column align-items-center my-5">
                    <img class="w-25 mb-5" src="<?= base_url('assets/images/no-ticket.png') ?>" alt="">
                    <p>You haven't booked any ticket yet. Please booking our services.</p>
                    <a class="btn-outline-secondary text-decoration-none" href="<?= base_url('boats') ?>">BOOK NOW</a>
                </div>

            <?php 
            break;} 
            endforeach;
            }else {
            ?>

                <div class="d-flex flex-column align-items-center my-5">
                    <img class="w-25 mb-5" src="<?= base_url('assets/images/no-ticket.png') ?>" alt="">
                    <p>You haven't booked any ticket yet. Please booking our services.</p>
                    <a class="btn-outline-secondary text-decoration-none" href="<?= base_url('boats') ?>">BOOK NOW</a>
                </div>

            <?php } ?>

        </div>
    </section>
    <!-- Tickets History Section End -->
</main>