// Navbar Show Up and Hide In
navhidden = document.querySelector(".hidden");
if (navhidden != null) {
	document.addEventListener("scroll", () => {
		const navbar = document.querySelector(".navbar");

		if (window.scrollY > 95) {
			navbar.classList.remove("hidden");
		} else {
			navbar.classList.add("hidden");
		}
	});
}

// Owl Carousel
$(document).ready(function () {
	$(".video-slider").owlCarousel({
		loop: false,
		margin: 24,
		nav: false,
		dots: false,
		autoWidth: true,
	});

	$(".teams-slider").owlCarousel({
		loop: false,
		margin: 24,
		nav: false,
		dots: false,
		autoWidth: true,
	});
});

// Icon Placeholder Input
