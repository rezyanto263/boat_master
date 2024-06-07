// Navbar Show Up and Hide In
navhidden = document.querySelector(".hidden")
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

// Dashboard SideBar
sidebarbtn = document.querySelector(".btn-sidebar");
if (sidebarbtn != null) {
	sidebarbtn.addEventListener("click", () => {
		main = document.querySelector(".dashboard-admin");
		main.classList.toggle("minimize");
	});
}

// Owl Carousel
videoSlider = document.querySelector(".video-slider");
teamSlider = document.querySelector(".video-slider");

if ((videoSlider && teamSlider) != null) {
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
}
