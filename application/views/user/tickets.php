<main>
    <!-- Tickets Section Start -->
    <section class="current-tickets-section py-5">
        <div class="container pb-5">
            <h1 class="text-center">CURRENT TICKETS</h1>
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-3 p-0">
                    <div
                        class="qr-code-ticket py-5 ps-4 pe-2 d-flex flex-column align-items-center justify-content-center"
                    >
                        <img src="<?= base_url('assets/images/qr-code.svg'); ?>" alt="" />
                        <p class="mt-1">ORDER ID : 1234567890</p>
                        <button
                            class="btn-secondary"
                            data-bs-toggle="modal"
                            data-bs-target="#qr-code"
                        >
                            SCAN THIS CODE!
                        </button>
                        <div class="blue-circle"></div>
                    </div>
                </div>
                <div class="col-xl-8 col-xxl-6 col-lg-8 p-0">
                    <div
                        class="details-ticket py-5 ps-lg-5 ps-xl-5 ps-xxl-5 ps-5 pe-4 d-flex flex-column justify-content-start"
                    >
                        <h1 class="mb-0">BOAT TOUR & CLIFF</h1>
                        <h3 class="mb-0 text-white">PRIVATE TOUR</h3>
                        <div class="time d-flex align-items-center gap-3 mt-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <p class="text-white mb-0">08:00 AM - 18:00 PM</p>
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
                                    <h1>4</h1>
                                </div>
                            </div>
                            <div
                                class="teen-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">TEEN</p>
                                <div class="teen-total">
                                    <h1>3</h1>
                                </div>
                            </div>
                            <div
                                class="kid-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">KID</p>
                                <div class="kid-total">
                                    <h1>1</h1>
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
        </div>
    </section>
    <!-- Tickets Section End -->

    <div class="modal" tabindex="-1" aria-hidden="true" id="qr-code">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ORDER ID : 1234567890</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url('assets/images/qr-code.svg'); ?>" alt="">
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tickets History Section Start -->
    <section class="tickets-history-section py-5">
        <div class="container py-5">
            <h1 class="text-center">TICKETS HISTORY</h1>
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-3 p-0">
                    <div
                        class="qr-code-ticket py-5 ps-4 pe-2 d-flex flex-column align-items-center justify-content-center"
                    >
                        <img src="<?= base_url('assets/images/qr-code.svg'); ?>" alt="" />
                        <p class="mt-1">ORDER ID : 1234567890</p>
                        <button class="btn-secondary">SCAN THIS CODE!</button>
                        <div class="blue-circle"></div>
                    </div>
                </div>
                <div class="col-xl-7 col-xxl-6 col-lg-8 p-0">
                    <div
                        class="details-ticket py-5 ps-lg-3 ps-xl-4 ps-xxl-5 pe-4 d-flex flex-column justify-content-start"
                    >
                        <h1 class="mb-0">BOAT TOUR & CLIFF</h1>
                        <h3 class="mb-0 text-white">PRIVATE TOUR</h3>
                        <div class="time d-flex align-items-center gap-3 mt-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <p class="text-white mb-0">08:00 AM - 18:00 PM</p>
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
                                    <h1>4</h1>
                                </div>
                            </div>
                            <div
                                class="teen-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">TEEN</p>
                                <div class="teen-total">
                                    <h1>3</h1>
                                </div>
                            </div>
                            <div
                                class="kid-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">KID</p>
                                <div class="kid-total">
                                    <h1>1</h1>
                                </div>
                            </div>
                        </div>
                        <div class="blue-circle"></div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-3 p-0">
                    <div
                        class="qr-code-ticket py-5 ps-4 pe-2 d-flex flex-column align-items-center justify-content-center"
                    >
                        <img src="<?= base_url('assets/images/qr-code.svg'); ?>" alt="" />
                        <p class="mt-1">ORDER ID : 1234567890</p>
                        <button class="btn-secondary">SCAN THIS CODE!</button>
                        <div class="blue-circle"></div>
                    </div>
                </div>
                <div class="col-xl-7 col-xxl-6 col-lg-8 p-0">
                    <div
                        class="details-ticket py-5 ps-lg-3 ps-xl-4 ps-xxl-5 pe-4 d-flex flex-column justify-content-start"
                    >
                        <h1 class="mb-0">BOAT TOUR & CLIFF</h1>
                        <h3 class="mb-0 text-white">PRIVATE TOUR</h3>
                        <div class="time d-flex align-items-center gap-3 mt-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <p class="text-white mb-0">08:00 AM - 18:00 PM</p>
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
                                    <h1>4</h1>
                                </div>
                            </div>
                            <div
                                class="teen-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">TEEN</p>
                                <div class="teen-total">
                                    <h1>3</h1>
                                </div>
                            </div>
                            <div
                                class="kid-box d-flex flex-column justify-content-center align-items-center"
                            >
                                <p class="mb-0">KID</p>
                                <div class="kid-total">
                                    <h1>1</h1>
                                </div>
                            </div>
                        </div>
                        <div class="blue-circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tickets History Section End -->
</main>