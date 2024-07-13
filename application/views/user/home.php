<section class="navbar2 <?= ($this->session->userdata('custName') != null)? 'login':''; ?>">
    <div class="container py-3">
        <div class="row">
            <div class="col-3">
                <img src="<?= base_url('assets/images/Logo2.svg') ?>" alt="" />
            </div>
            <div class="col-6 d-flex align-items-center justify-content-center">
                <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-item">
                        <a href="<?= base_url('home'); ?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('boats'); ?>" class="nav-link">Boats</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('gallery'); ?>" class="nav-link">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('about'); ?>" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('contact'); ?>" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-end ">
                <a class="btn btn-secondary max btn-signin" href="<?= base_url('login'); ?>">SIGN IN</a>
                <div class="wrapper btn-icon d-flex flex-row">
                    <a
                        class="tickets d-flex align-items-center justify-content-center me-3 position-relative notification"
                        href="<?= base_url('tickets') ?>"
                    >
                        <i class="fa-solid fa-ticket"></i>
                        <span class="notif-circle text-center">
                            <i class="notif-icon fa-solid fa-exclamation"></i>
                        </span>
                    </a>
                    <a
                        class="profile-user d-flex align-items-center justify-content-center"
                        href="<?= base_url('profile'); ?>"
                    >
                        <?= empty($this->session->userdata('custPicture'))?'<i class="fa-solid fa-circle-user"></i>':'<img class="profile-image" src="'.base_url('assets/uploads/'.$this->session->userdata('custPicture')).'">'; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<main class="user">
    <!-- Hero Section Start -->
    <section class="hero-section pt-lg-0 pt-4">
        <div class="container">
            <div class="row h-100" id="hero">
                <div class="col-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 px-5 d-flex align-items-center">
                                <div class="box w-100">
                                    <h1>EXPLORE HEAVEN WITH BOAT MASTER</h1>
                                    <p>
                                        Experience the ultimate marine escape with Boat Master. Sail through crystal-clear waters, relax in style, and enjoy unparalleled ocean views. Start your adventure now!
                                    </p>
                                    <a class="btn btn-secondary me-3" href="<?= base_url('boats') ?>">BOOK NOW</a>
                                    <a class="btn btn-outline-primary" href="#wwyd-section">
                                        LEARN MORE
                                    </a>
                                </div>
                            </div>
                            <div
                                class="col-6 d-flex align-items-center justify-content-center"
                            >
                                <button class="btn btn-play" id="playButton">
                                    <i class="fa-solid fa-play ms-1"></i>
                                </button>
                                <div id="videoContainer">
                                    <video id="fullscreenVideo" playsinline loop>
                                        <source src="<?= base_url('assets/uploads/hero-video.mp4') ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 tour-package">
                <div class="col-6 col-lg-4">
                    <div class="container bg-white px-5 py-3">
                        <a class="text-decoration-none" href="<?= base_url('boats'); ?>">
                            <div class="row m-0 p-0">
                                <div class="col-10 m-0 p-0">
                                    <h4>PRIVATE TOUR</h4>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <i class="fa-solid fa-star mb-2"></i>
                                </div>
                            </div>
                            <hr class="mt-0" />
                            <p>Have a wonderful boat ride with your dearest ones!</p>
                            <div class="row">
                                <div class="price">1.200.00 IDR</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="container bg-white px-5 py-3">
                        <a class="text-decoration-none" href="<?= base_url('boats'); ?>">
                            <div class="row m-0 p-0">
                                <div class="col-10 m-0 p-0">
                                    <h4>SHARED TOUR</h4>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <i class="fa-solid fa-users mb-2"></i>
                                </div>
                            </div>
                            <hr class="mt-0" />
                            <p>Join others for a fun boat ride and make new friends along the way.</p>
                            <div class="row">
                                <div class="price">1.200.00 IDR</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="container px-5 py-3 design-a-tour">
                        <a class="text-decoration-none" href="<?= base_url('boats'); ?>">
                            <div class="row m-0 p-0">
                                <div class="col-10 m-0 p-0">
                                    <h4>DESIGN A TOUR</h4>
                                </div>
                                <div class="col-2 d-flex align-items-center">
                                    <i class="fa-solid fa-sailboat mb-2"></i>
                                </div>
                            </div>
                            <hr class="mt-0" />
                            <p>Customize your boat tour for a unique adventure. Book online now!</p>
                            <div class="row">
                                <div class="price">Book Online</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section End-->

    <!-- Watch Section Start -->
    <section class="watch-section py-5">
        <div class="container my-5">
            <h2>WATCH OUR TOUR VIDEOS</h2>
            <p>Get a sneak peek into our unforgettable boat adventures and experiences.</p>
            <div class="row mt-5">
                <div class="video-slider owl-carousel owl-theme">
                    <div class="item card"><a class="fancybox" data-fancybox="video" data-width="470" data-height="835" data-caption="Single image" src="https://youtube.com/embed/pI1Fm3wDNDg?si=l_yI6teYIBQss_a_"><img src="https://img.youtube.com/vi/pI1Fm3wDNDg/maxresdefault.jpg" alt=""><span class="btn-play"><i class="fa-solid fa-play"></i></span></a></div>
                    <div class="item card"><a class="fancybox" data-fancybox="video" data-width="470" data-height="835" data-caption="Single image" src="https://youtube.com/embed/2jIkrnyFJFA?si=vkeFIAxj2GkPi9wW"><img src="https://img.youtube.com/vi/2jIkrnyFJFA/maxresdefault.jpg" alt=""><span class="btn-play"><i class="fa-solid fa-play"></i></span></a></div>
                    <div class="item card"><a class="fancybox" data-fancybox="video" data-width="470" data-height="835" data-caption="Single image" src="https://youtube.com/shorts/0IHun0xT4tQ?si=YmYBxog0Z3AeVsVN"><img src="https://img.youtube.com/vi/0IHun0xT4tQ/maxresdefault.jpg" alt=""><span class="btn-play"><i class="fa-solid fa-play"></i></span></a></div>
                    <div class="item card"><a class="fancybox" data-fancybox="video" data-width="470" data-height="835" data-caption="Single image" src="https://youtube.com/shorts/jvg5F6lYiOY?si=hrLpEHIFzv24OEc9"><img src="https://img.youtube.com/vi/jvg5F6lYiOY/maxresdefault.jpg" alt=""><span class="btn-play"><i class="fa-solid fa-play"></i></span></a></div>
                    <div class="item card"><a class="fancybox" data-fancybox="video" data-width="470" data-height="835" data-caption="Single image" src="https://youtube.com/shorts/Vx_IJmIU6bE?si=kT8QZf1tjZGx03lp"><img src="https://img.youtube.com/vi/Vx_IJmIU6bE/maxresdefault.jpg" alt=""><span class="btn-play"><i class="fa-solid fa-play"></i></span></a></div>
                    <div class="item card"><a class="fancybox" data-fancybox="video" data-width="470" data-height="835" data-caption="Single image" src="https://youtube.com/shorts/7QMlc3Tg4Dc?si=1VTk39KBgZjiwUNS"><img src="https://img.youtube.com/vi/7QMlc3Tg4Dc/maxresdefault.jpg" alt=""><span class="btn-play"><i class="fa-solid fa-play"></i></span></a></div>
                    <div class="item card"><a class="fancybox" data-fancybox="video" data-width="470" data-height="835" data-caption="Single image" src="https://youtube.com/shorts/skE8JMm0YKg?si=N0QOHzNzhOoxVXnH"><img src="https://img.youtube.com/vi/skE8JMm0YKg/maxresdefault.jpg" alt=""><span class="btn-play"><i class="fa-solid fa-play"></i></span></a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Watch Section End -->

    <!-- What Will You Do Section Start -->
    <section class="wwyd-section py-5" id="wwyd-section">
        <div class="container my-5">
            <h2>WHAT YOU WILL DO</h2>
            <p>Unforgettable adventure awaits.</p>
            <div class="row mt-4 gx-4 gy-4">
                <div class="col-lg-6">
                    <div class="card p-4">
                        <div class="row px-3">
                            <div class="col-1 p-0 d-flex align-items-center">
                                <span
                                    class="bg-icon d-flex justify-content-center align-items-center p-0 m-0"
                                    ><i class="fa-solid fa-sun"></i
                                ></span>
                            </div>
                            <div class="col-11 d-flex align-items-center">
                                <h3 class="mb-0">Sunset Cruises</h3>
                            </div>
                        </div>
                        <div class="row px-3 mt-2">
                            <p class="p-0">
                                Experience a breathtaking sunset cruise. Relax and enjoy the stunning views as the sun dips below the horizon.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card p-4">
                        <div class="row px-3">
                            <div class="col-1 p-0 d-flex align-items-center">
                                <span
                                    class="bg-icon d-flex justify-content-center align-items-center p-0 m-0"
                                    ><i class="fa-solid fa-mask"></i
                                ></span>
                            </div>
                            <div class="col-11 d-flex align-items-center">
                                <h3 class="mb-0">Snorkeling in Four Spots</h3>
                            </div>
                        </div>
                        <div class="row px-3 mt-2">
                            <p class="p-0">
                                Explore the underwater world with snorkeling at four amazing spots. Discover vibrant marine life and beautiful coral reefs.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card p-4">
                        <div class="row px-3">
                            <div class="col-1 p-0 d-flex align-items-center">
                                <span
                                    class="bg-icon d-flex justify-content-center align-items-center p-0 m-0"
                                    ><i class="fa-solid fa-person-swimming"></i
                                ></span>
                            </div>
                            <div class="col-11 d-flex align-items-center">
                                <h3 class="mb-0">Swim with Manta Rays</h3>
                            </div>
                        </div>
                        <div class="row px-3 mt-2">
                            <p class="p-0">
                                Get up close with majestic manta rays. A unique and unforgettable swimming experience with these gentle giants.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card p-4">
                        <div class="row px-3">
                            <div class="col-1 p-0 d-flex align-items-center">
                                <span
                                    class="bg-icon d-flex justify-content-center align-items-center p-0 m-0"
                                    ><i class="fa-solid fa-martini-glass-citrus"></i
                                ></span>
                            </div>
                            <div class="col-11 d-flex align-items-center">
                                <h3 class="mb-0">Lunch in Restaurant</h3>
                            </div>
                        </div>
                        <div class="row px-3 mt-2">
                            <p class="p-0">
                                Savor a delicious lunch at a fine restaurant. Enjoy a variety of culinary delights in a pleasant atmosphere.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- What Will You Do Section End -->

    <!-- What is Included Section Start -->
    <section class="wii-section py-5">
        <div class="container my-5">
            <h2>WHAT IS INCLUDED</h2>
            <p>Cruise Bali's waters, snorkel reefs, and see amazing sights!</p>
            <div class="row mt-4 gx-4 gy-4">
                <div class="col-lg-6">
                    <div class="card p-4">
                        <div class="row px-3">
                            <div class="col-1 p-0 d-flex align-items-center">
                                <span
                                    class="bg-icon d-flex justify-content-center align-items-center p-0 m-0"
                                    ><i class="fa-solid fa-mask"></i
                                ></span>
                            </div>
                            <div class="col-11 d-flex align-items-center">
                                <h3 class="mb-0">Snorkeling Equipments</h3>
                            </div>
                        </div>
                        <div class="row px-3 mt-2">
                            <p class="p-0">
                                We provide all the snorkeling gear you’ll need, including fins, a mask, and a snorkel. Just bring your swimsuit and sense of adventure!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card p-4">
                        <div class="row px-3">
                            <div class="col-1 p-0 d-flex align-items-center">
                                <span
                                    class="bg-icon d-flex justify-content-center align-items-center p-0 m-0"
                                    ><i class="fa-solid fa-camera"></i
                                ></span>
                            </div>
                            <div class="col-11 d-flex align-items-center">
                                <h3 class="mb-0">Beautiful Footage</h3>
                            </div>
                        </div>
                        <div class="row px-3 mt-2">
                            <p class="p-0">
                                Capture stunning underwater memories with our complimentary underwater cameras available for rent.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card p-4">
                        <div class="row px-3">
                            <div class="col-1 p-0 d-flex align-items-center">
                                <span
                                    class="bg-icon d-flex justify-content-center align-items-center p-0 m-0"
                                    ><i class="fa-solid fa-utensils"></i
                                ></span>
                            </div>
                            <div class="col-11 d-flex align-items-center">
                                <h3 class="mb-0">Lunch</h3>
                            </div>
                        </div>
                        <div class="row px-3 mt-2">
                            <p class="p-0">
                                Indulge in a delicious and satisfying lunch buffet prepared with fresh, local ingredients.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card p-4">
                        <div class="row px-3">
                            <div class="col-1 p-0 d-flex align-items-center">
                                <span
                                    class="bg-icon d-flex justify-content-center align-items-center p-0 m-0"
                                    ><i class="fa-solid fa-plus"></i
                                ></span>
                            </div>
                            <div class="col-11 d-flex align-items-center">
                                <h3 class="mb-0">More</h3>
                            </div>
                        </div>
                        <div class="row px-3 mt-2">
                            <p class="p-0">
                                Elevate your Balinese getaway with our selection of optional extras, designed to curate an unforgettable experience tailored to your desires.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- What is Included Section End -->

    <!-- How to Make a Booking? Section Start -->
    <section class="booking-section py-5">
        <div class="container my-5">
            <h2>HOW TO MAKE A BOOKING?</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <div class="row mt-5">
                <div class="col-3">
                    <div class="card p-2">
                        <div class="card-header border-0 d-flex align-items-center">
                            <span
                                class="bg-icon d-flex align-items-center justify-content-center me-2"
                                ><h4 class="mb-0">1</h4></span
                            >
                            <h4 class="mb-0">Choose a Boat</h4>
                        </div>
                        <div class="card-body">
                            <p class="mb-0 text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Debitis quam qui optio voluptatibus repellat molestiae.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-2">
                        <div class="card-header border-0 d-flex align-items-center">
                            <span
                                class="bg-icon d-flex align-items-center justify-content-center me-2"
                                ><h4 class="mb-0">2</h4></span
                            >
                            <h4 class="mb-0">Choose The Tour</h4>
                        </div>
                        <div class="card-body">
                            <p class="mb-0 text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Debitis quam qui optio voluptatibus repellat molestiae.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-2">
                        <div class="card-header border-0 d-flex align-items-center">
                            <span
                                class="bg-icon d-flex align-items-center justify-content-center me-2"
                                ><h4 class="mb-0">3</h4></span
                            >
                            <h4 class="mb-0">Make a Booking</h4>
                        </div>
                        <div class="card-body">
                            <p class="mb-0 text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Debitis quam qui optio voluptatibus repellat molestiae.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card p-2">
                        <div class="card-header border-0 d-flex align-items-center">
                            <span
                                class="bg-icon d-flex align-items-center justify-content-center me-2"
                                ><h4 class="mb-0">4</h4></span
                            >
                            <h4 class="mb-0">Enjoy!</h4>
                        </div>
                        <div class="card-body">
                            <p class="mb-0 text-justify">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Debitis quam qui optio voluptatibus repellat molestiae.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How to Make a Booking? Section End -->

    <!-- Call to Action Section Start -->
    <section class="cta-section pb-5">
        <div class="container text-center mb-5">
            <h1 class="my-3">READY TO EXPLORE THE HEAVEN?</h1>
            <p class="my-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                lorem purus, venenatis faucibus varius id, rutrum eget nisl. Quisque
                vitae nisl elit. Duis dapibus sodales arcu vel tristique.
                Pellentesque ipsum nisl, feugiat tristique suscipit sed, blandit eu
                tortor. Suspendisse egestas urna elementum, imperdiet elit ac,
                elementum magna.
            </p>
            <a class="btn btn-primary" href="<?= base_url('boats') ?>">BOOK NOW</a>
        </div>
    </section>
    <!-- Call to Action Section End -->

    <!-- Benefits You Will Get Section Start -->
    <section class="benefits-section py-5">
        <div class="container my-5">
            <h2>BENEFITS YOU WILL GET</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <div class="row gy-4 gx-4 mt-4">
                <div class="col-4">
                    <div class="card p-2">
                        <div class="card-header border-0 bg-white">
                            <span
                                class="bg-icon d-flex align-items-center justify-content-center"
                                ><i class="fa-solid fa-globe"></i
                            ></span>
                            <h4 class="mb-0 mt-3">Book online</h4>
                        </div>
                        <div class="card-body pt-0">
                            <p class="text-justify mb-0">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nostrum unde animi et autem a eligendi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card p-2">
                        <div class="card-header border-0 bg-white">
                            <span
                                class="bg-icon d-flex align-items-center justify-content-center"
                                ><i class="fa-solid fa-ban"></i
                            ></span>
                            <h4 class="mb-0 mt-3">Simple Cancellation</h4>
                        </div>
                        <div class="card-body pt-0">
                            <p class="text-justify mb-0">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nostrum unde animi et autem a eligendi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card p-2">
                        <div class="card-header border-0 bg-white">
                            <span
                                class="bg-icon d-flex align-items-center justify-content-center"
                                ><i class="fa-solid fa-ranking-star"></i
                            ></span>
                            <h4 class="mb-0 mt-3">High Rating Reviews</h4>
                        </div>
                        <div class="card-body pt-0">
                            <p class="text-justify mb-0">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nostrum unde animi et autem a eligendi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-2">
                        <div class="card-header border-0 bg-white">
                            <span
                                class="bg-icon d-flex align-items-center justify-content-center"
                                ><i class="fa-solid fa-medal"></i
                            ></span>
                            <h4 class="mb-0 mt-3">Certified Guides</h4>
                        </div>
                        <div class="card-body pt-0">
                            <p class="text-justify mb-0">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nostrum unde animi et autem a eligendi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card p-2">
                        <div class="card-header border-0 bg-white">
                            <span
                                class="bg-icon d-flex align-items-center justify-content-center"
                                ><i class="fa-solid fa-credit-card"></i
                            ></span>
                            <h4 class="mb-0 mt-3">No Hidden Commissions</h4>
                        </div>
                        <div class="card-body pt-0">
                            <p class="text-justify mb-0">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nostrum unde animi et autem a eligendi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Benefits You Will Get Section End -->

    <!-- Meet Our Teams Section Start -->
    <section class="teams-section py-5">
        <div class="container my-5">
            <h2>MEET OUR TEAMS</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
            <div class="row mt-5">
                <div class="teams-slider owl-carousel owl-theme h-100">
                    <?php foreach($guides as $key): ?>
                    <div class="item">
                        <div class="card border-0">
                            <div class="card-header h-50 border-0">
                                <img src="<?= base_url('assets/uploads/'.$key['guidesPicture']) ?>" alt="">
                            </div>
                            <div class="card-body">
                                <h3><?= $key['guidesName'] ?></h3>
                                <hr class="my-2" />
                                <div class="row">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 text-white">5.0</p>
                                        <div
                                            class="ms-3 rating-star d-flex align-items-center gap-1"
                                        >
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="wrapper-langguage d-flex align-items-center">
                                        <i class="fa-solid fa-globe"></i>
                                        <p class="ms-3 mb-0">Indonesia, English</p>
                                    </div>
                                </div>
                                <hr class="my-2" />
                                <p class="text-justify">
                                    <?= $key['guidesBio'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Meet Our Teams Section End -->

    <!-- Review Section Start -->
    <section class="review-section py-5">
        <div class="container">
            <h2>REVIEW FROM CUSTOMERS</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
            <div class="row p-4 my-5">
                <div class="col-4">
                    <div class="review-rating"></div>
                </div>
                <div class="col-8">
                    <div class="review-content"></div>
                    <div class="review-content"></div>
                    <div class="review-content"></div>
                    <div class="review-content"></div>
                    <div class="review-content"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Review Section End -->

    <!-- Contact & FAQ Section Start -->
    <section class="contact-faq-section py-5" id="contactfaq">
        <div class="container py-5">
            <div class="row">
                <div class="col-4 p-0">
                    <h2>CONTACT US</h2>
                    <p class="mb-5">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                    <form action="<?= base_url('user/Home/sendEmail') ?>" method="post">
                        <div class="mb-3">
                            <input
                                class="w-100"
                                name="custName"
                                type="text"
                                placeholder="&#xF007;   Your name"
                                value="<?= set_value('custName'); ?>"
                            />
                            <?= form_error('custName', '<small class="text-warning ms-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <input
                                class="w-100"
                                name="custEmail"
                                type="text"
                                placeholder="&#xF0E0;   Your Email"
                                value="<?= set_value('custEmail'); ?>"
                            />
                            <?= form_error('custEmail', '<small class="text-warning ms-3">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <textarea
                                class="w-100"
                                name="message"
                                type="text"
                                placeholder="Message..."
                                value="<?= set_value('message'); ?>"
                            ></textarea>
                            <?= form_error('message', '<small class="text-warning ms-3">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn-secondary">SUBMIT</button>
                    </form>
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <div class="col-7 offset-1 p-0">
                    <h2>FREQUENTLY ASK QUESTION</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <div class="content mt-5">
                        <div class="accordion" id="accordion-faq">
                            <div class="accordion-item mb-3">
                                <h5 class="accordion-header">
                                    <button
                                        class="accordion-button fw-bold bg-white"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#faq1"
                                        aria-expanded="true"
                                    >
                                        Are there any age restrictions for the tour?
                                    </button>
                                </h5>
                                <div
                                    id="faq1"
                                    class="accordion-collapse collapse show"
                                    data-bs-parent="#accordion-faq"
                                >
                                    <div class="accordion-body pb-2">
                                        While there is a limitation on our insurance coverage
                                        for individuals over 70 years old and under 8 years old,
                                        we recommend this tour for guests in good health and
                                        fitness. Parents should use their discretion when
                                        considering the safety and enjoyment of their children.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mb-3">
                                <h5 class="accordion-header">
                                    <button
                                        class="accordion-button fw-bold bg-white"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#faq2"
                                        aria-expanded="false"
                                    >
                                        Do you offer any discounts for children or large groups?
                                    </button>
                                </h5>
                                <div
                                    id="faq2"
                                    class="accordion-collapse collapse"
                                    data-bs-parent="#accordion-faq"
                                >
                                    <div class="accordion-body pb-2">
                                        While there is a limitation on our insurance coverage
                                        for individuals over 70 years old and under 8 years old,
                                        we recommend this tour for guests in good health and
                                        fitness. Parents should use their discretion when
                                        considering the safety and enjoyment of their children.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h5 class="accordion-header">
                                    <button
                                        class="accordion-button fw-bold bg-white"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#faq3"
                                        aria-expanded="false"
                                    >
                                        How do I get to the departure point for the tour?
                                    </button>
                                </h5>
                                <div
                                    id="faq3"
                                    class="accordion-collapse collapse"
                                    data-bs-parent="#accordion-faq"
                                >
                                    <div class="accordion-body pb-2">
                                        While there is a limitation on our insurance coverage
                                        for individuals over 70 years old and under 8 years old,
                                        we recommend this tour for guests in good health and
                                        fitness. Parents should use their discretion when
                                        considering the safety and enjoyment of their children.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper w-100 d-flex justify-content-center pt-3">
                        <a class="btn-secondary text-decoration-none" href="#">
                            SEE MORE
                        </a>
                    </div>
                </div>
            </div>
            <div class="row p-0 pt-5 mt-5">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.865570572184!2d115.15991207402163!3d-8.79869799125371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244c13ee9d753%3A0x6c05042449b50f81!2sPoliteknik%20Negeri%20Bali!5e0!3m2!1sen!2sid!4v1717516353156!5m2!1sen!2sid"
                    height="400"
                    style="border: 0"
                    allowfullscreen="true"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>
    </section>
    <!-- Contact & FAQ Section End -->
</main>


