<!-- Contact Section Start -->
<section class="contact-section py-3">
    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-6 col-md-12 p-0">
                <img src="<?= base_url('assets/images/email.png') ?>" width="500px" />
                <h2 id="contact">Have questions?</h2>
                <h2>Shoot us an email</h2>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <form action="<?= base_url('user/Contact/sendEmail') ?>" method="post">
                        <div class="mb-3 w-75">
                            <input
                                class="w-100"
                                name="custName"
                                type="text"
                                placeholder="&#xF007;   Your name"
                                value="<?= set_value('custName'); ?>"
                            />
                            <?= form_error('custName', '<small class="text-warning ms-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3 w-75">
                            <input
                                class="w-100"
                                name="custEmail"
                                type="text"
                                placeholder="&#xF0E0;   Your Email"
                                value="<?= set_value('custEmail'); ?>"
                            />
                            <?= form_error('custEmail', '<small class="text-warning ms-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3 w-75">
                            <textarea
                                class="w-100"
                                name="message"
                                type="text"
                                placeholder="Message..."
                                value="<?= set_value('message'); ?>"
                            ></textarea>
                            <?= form_error('message', '<small class="text-warning ms-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn-secondary w-75">SUBMIT</button>
                    </form>
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mt-5 mb-5 find-us-container">
                <h1>Let's Connect!</h1>
                <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <div class="social-media-box gap-4 d-flex align-items-center col-lg-6 col-md-12 mb-5 w-100">
                    <a class="social-icon d-flex align-items-center justify-content-center" href="#">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a class="social-icon d-flex align-items-center justify-content-center" href="#">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                    <a class="social-icon d-flex align-items-center justify-content-center" href="#">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a class="social-icon d-flex align-items-center justify-content-center" href="#">
                        <i class="fa-solid fa-envelope"></i>
                    </a>
                </div>
                <h2 class="find-us-title">Find us here</h2>
                <p class="find-us-paragraph">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.865570572184!2d115.15991207402163!3d-8.79869799125371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244c13ee9d753%3A0x6c05042449b50f81!2sPoliteknik%20Negeri%20Bali!5e0!3m2!1sen!2sid!4v1717516353156!5m2!1sen!2sid"
                    height="400"
                    width="100%"
                    class="mt-5">
                </iframe>
            </div>
        </div>
    </div>
</section>
<!-- Contact & FAQ Section End -->
