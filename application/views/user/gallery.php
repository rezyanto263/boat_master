<main>
    <section class="gallery-section pb-5 pt-3">
        <div class="container my-5">
            <h2 class="text-center mb-5">OUR PRECIOUS MEMORY</h2>
            <?php 
            $i = 0;
            $style = 1;
            foreach($gallery as $key): 
                $i++;
                if ($style == 1) {
                    if ($i == 1) {
            ?>
            <div class="row gx-3 my-3">
                <div class="col-6">
                    <a 
                    class="fancybox position-relative"
                    data-fancybox="gallery" 
                    data-caption="<span class='fw-bold fs-5'><?= $key['galleryName']; ?></span><br><?= $key['galleryDesc']; ?>"
                    data-width="1920"
                    data-height="1080"
                    href="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>">
                        <img class="big" src="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>" alt="">
                    </a>
                </div>
                <?php 
                    } else if ($i > 1) {
                        if ($i == 2) {
                ?>
                <div class="col-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <a 
                            class="fancybox position-relative"
                            data-fancybox="gallery" 
                            data-caption="<span class='fw-bold fs-5'><?= $key['galleryName']; ?></span><br><?= $key['galleryDesc']; ?>"
                            data-width="1920"
                            data-height="1080"
                            href="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>">
                                <img class="small" src="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>" alt="">
                            </a>
                        </div>
                        <?php } else if ($i == 3) { ?>
                        <div class="col-6">
                            <a 
                            class="fancybox position-relative"
                            data-fancybox="gallery" 
                            data-caption="<span class='fw-bold fs-5'><?= $key['galleryName']; ?></span><br><?= $key['galleryDesc']; ?>"
                            data-width="1920"
                            data-height="1080"
                            href="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>">
                                <img class="small" src="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>" alt="">
                            </a>
                        </div>
                        <?php } else if ($i == 4) { ?>
                        <div class="col-6">
                            <a 
                            class="fancybox position-relative"
                            data-fancybox="gallery" 
                            data-caption="<span class='fw-bold fs-5'><?= $key['galleryName']; ?></span><br><?= $key['galleryDesc']; ?>"
                            data-width="1920"
                            data-height="1080"
                            href="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>">
                                <img class="small" src="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>" alt="">
                            </a>
                        </div>
                        <?php } else if ($i == 5) { ?>
                        <div class="col-6">
                            <a 
                            class="fancybox position-relative"
                            data-fancybox="gallery" 
                            data-caption="<span class='fw-bold fs-5'><?= $key['galleryName']; ?></span><br><?= $key['galleryDesc']; ?>"
                            data-width="1920"
                            data-height="1080"
                            href="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>">
                                <img class="small" src="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                    $style = 2;
                    $i = 0;
                    } 
                }
            } else if ($style == 2) { 
                if ($i < 5) {
                    if ($i == 1) {
            ?>
            <div class="row gx-3 my-3">
                <div class="col-6">
                    <div class="row g-3">
                        <div class="col-6">
                            <a 
                            class="fancybox position-relative"
                            data-fancybox="gallery" 
                            data-caption="<span class='fw-bold fs-5'><?= $key['galleryName']; ?></span><br><?= $key['galleryDesc']; ?>"
                            data-width="1920"
                            data-height="1080"
                            href="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>">
                                <img class="small" src="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>" alt="">
                            </a>
                        </div>
                        <?php } else if ($i == 2) { ?>
                        <div class="col-6">
                            <a 
                            class="fancybox position-relative"
                            data-fancybox="gallery" 
                            data-caption="<span class='fw-bold fs-5'><?= $key['galleryName']; ?></span><br><?= $key['galleryDesc']; ?>"
                            data-width="1920"
                            data-height="1080"
                            href="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>">
                                <img class="small" src="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>" alt="">
                            </a>
                        </div>
                        <?php } else if ($i == 3) { ?>
                        <div class="col-6">
                            <a 
                            class="fancybox position-relative"
                            data-fancybox="gallery" 
                            data-caption="<span class='fw-bold fs-5'><?= $key['galleryName']; ?></span><br><?= $key['galleryDesc']; ?>"
                            data-width="1920"
                            data-height="1080"
                            href="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>">
                                <img class="small" src="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>" alt="">
                            </a>
                        </div>
                        <?php } else if ($i == 4) { ?>
                        <div class="col-6">
                            <a 
                            class="fancybox position-relative"
                            data-fancybox="gallery" 
                            data-caption="<span class='fw-bold fs-5'><?= $key['galleryName']; ?></span><br><?= $key['galleryDesc']; ?>"
                            data-width="1920"
                            data-height="1080"
                            href="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>">
                                <img class="small" src="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>" alt="">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-6">
                    <a 
                    class="fancybox position-relative"
                    data-fancybox="gallery" 
                    data-caption="<span class='fw-bold fs-5'><?= $key['galleryName']; ?></span><br><?= $key['galleryDesc']; ?>"
                    data-width="1920"
                    data-height="1080"
                    href="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>">
                        <img class="big" src="<?= base_url('assets/uploads/'.$key['mediaFile']); ?>" alt="">
                    </a>
                </div>
            </div>
            <?php 
                $style = 1;
                $i = 0;
                } 
            }
            endforeach; 
            ?>
        </div>
    </section>
</main>
