<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/gallery_style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">

        <!-- Navbar Start -->
		<nav class="navbar navbar-expand-lg sticky-top shadow login">
			<div class="container">
				<a class="navbar-brand d-flex align-items-center" href="#">
					<img src="../assets/images/logo.png" alt="" width="55px" />
				</a>
				<button
					class="btn"
					id="offcanvas-navbar"
					type="button"
					data-bs-toggle="offcanvas"
					data-bs-target="#offcanvas-navbar"
					aria-controls="offcanvasExample"
				>
					<i class="fa-solid fa-bars"></i>
				</button>
				<ul class="navbar-nav mx-auto d-flex grid gap-5">
					<li class="nav-item">
						<a class="nav-link" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Boats</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Gallery</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact</a>
					</li>
				</ul>
				<a class="btn btn-secondary btn-signin max navbar-nav" href="#">SIGN IN</a>
				<div class="wrapper btn-icon d-flex flex-row">
					<a class="tickets d-flex align-items-center justify-content-center me-3" href="#">
						<i class="fa-solid fa-ticket"></i>
					</a>
					<a class="profile-user d-flex align-items-center justify-content-center" href="#">
						<i class="fa-solid fa-circle-user text-white"></i>
					</a>
				</div>
			</div>
		</nav>
		<!-- Navbar End -->

        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <iframe width="360" height="215" src="https://youtube.com/embed/z4oYIZ5K2R4?si=ZCG2ozkAcM1ar56l"
                        frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="swiper-slide">
                    <iframe width="360" height="215" src="https://youtube.com/embed/YGtRBw3iiN8?si=29djhC0HXVDHYgEm"
                        frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="swiper-slide">
                    <iframe width="360" height="215" src="https://youtube.com/embed/CheTqGBMnqs?si=J8OVuI13GSqlXOAa"
                        frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="swiper-slide">
                    <iframe width="360" height="215" src="https://youtube.com/embed/mP-AfI3MF7I?si=DJAQsh5LkjBGdSvu"
                        frameborder="0" allowfullscreen></iframe>
                </div>
                <!-- Add more slides if needed -->
            </div>
            <!-- Add navigation buttons if needed -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>



        <div class="photo-gallery">



            <div class="column">
                <?php foreach ($photo as $p) { ?>
                    <div class="photo">
                        <a href="<?= base_url('assets/images/') . $p->nama_photo; ?>" data-lightbox="photos">
                            <img src="<?= base_url('assets/images/') . $p->nama_photo; ?>" alt="" srcset="">
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="column">
                <?php
                foreach ($photo2 as $p2) { ?>

                    <div class="photo">
                        <a href="<?= base_url('assets/images/') . $p2->nama_photo; ?>" data-lightbox="photos">
                            <img src="<?= base_url('assets/images/') . $p2->nama_photo; ?>" alt="" srcset="">
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="column">
                <?php
                foreach ($photo3 as $p3) { ?>

                    <div class="photo">
                        <a href="<?= base_url('assets/images/') . $p3->nama_photo; ?>" data-lightbox="photos">
                            <img src="<?= base_url('assets/images/') . $p3->nama_photo; ?>" alt="" srcset="">
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="column">
                <?php
                foreach ($photo4 as $p4) { ?>

                    <div class="photo">
                        <a href="<?= base_url('assets/images/') . $p4->nama_photo; ?>" data-lightbox="photos">
                            <img src="<?= base_url('assets/images/') . $p4->nama_photo; ?>" alt="" srcset="">
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="column">
                <?php
                foreach ($photo5 as $p5) { ?>

                    <div class="photo">
                        <a href="<?= base_url('assets/images/') . $p5->nama_photo; ?>" data-lightbox="photos">
                            <img src="<?= base_url('assets/images/') . $p5->nama_photo; ?>" alt="" srcset="">
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="column">
                <?php
                foreach ($photo6 as $p6) { ?>

                    <div class="photo">
                        <a href="<?= base_url('assets/images/') . $p6->nama_photo; ?>" data-lightbox="photos">
                            <img src="<?= base_url('assets/images/') . $p6->nama_photo; ?>" alt="" srcset="">
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="column">
                <?php
                foreach ($photo7 as $p7) { ?>

                    <div class="photo">
                        <a href="<?= base_url('assets/images/') . $p7->nama_photo; ?>" data-lightbox="photos">
                            <img src="<?= base_url('assets/images/') . $p7->nama_photo; ?>" alt="" srcset="">
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="column">
                <?php
                foreach ($photo8 as $p8) { ?>

                    <div class="photo">
                        <a href="<?= base_url('assets/images/') . $p8->nama_photo; ?>" data-lightbox="photos">
                            <img src="<?= base_url('assets/images/') . $p8->nama_photo; ?>" alt="" srcset="">
                        </a>
                    </div>
                <?php } ?>
            </div>


        </div>

    </div>


    <!-- Swiper JS -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- Pastikan Anda telah memuatkan Swiper.js sebelum skrip ini -->
    <!-- Lightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            spaceBetween: 20,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>