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

// Booking Max People
check = document.querySelector(".details-order");
if (check != null) {
	// Adult
	(aplus = document.querySelector(".adult-plus")),
		(aminus = document.querySelector(".adult-minus")),
		(atotal = document.querySelector(".adult-total")),
		// Teen
		(tplus = document.querySelector(".teen-plus")),
		(tminus = document.querySelector(".teen-minus")),
		(ttotal = document.querySelector(".teen-total")),
		// Kids
		(kplus = document.querySelector(".kids-plus")),
		(kminus = document.querySelector(".kids-minus")),
		(ktotal = document.querySelector(".kids-total"));

	discPrice = document.querySelector(".discount-price");
	totalPrice = document.querySelector(".final-price");

	let a = 1;
	let t = 0;
	let k = 0;

	aplus.addEventListener("click", () => {
		a++;
		atotal.innerText = a;
		total = a + t + k;
		discount = -total * 0.1;

		discPrice.innerText = discount;
		totalPrice.innerText = total;
	});

	tplus.addEventListener("click", () => {
		t++;
		ttotal.innerText = t;
		total = a + t + k;
		discount = -total * 0.1;

		discPrice.innerText = discount;
		totalPrice.innerText = total;
	});

	kplus.addEventListener("click", () => {
		c++;
		ktotal.innerText = k;
		total = a + t + k;
		discount = -total * 0.1;

		discPrice.innerText = discount;
		totalPrice.innerText = total;
	});

	aminus.addEventListener("click", () => {
		if (a > 0) {
			a--;
			atotal.innerText = a;
		}
		total = a + t + k;
		discount = -total * 0.1;

		discPrice.innerText = discount;
		totalPrice.innerText = total;
	});

	tminus.addEventListener("click", () => {
		if (t > 0) {
			t--;
			ttotal.innerText = t;
		}
		total = a + t + k;
		discount = -total * 0.1;

		discPrice.innerText = discount;
		totalPrice.innerText = total;
	});

	kminus.addEventListener("click", () => {
		if (k > 0) {
			k--;
			ktotal.innerText = k;
		}
		total = a + t + k;
		discount = -total * 0.1;

		discPrice.innerText = discount;
		totalPrice.innerText = total;
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
boatOverviewSlider = document.querySelector(".boat-overview-slider");
boatBadgesSlider = document.querySelector(".boat-badges-slider");

if (
	(videoSlider || teamSlider || boatOverviewSlider || boatBadgesSlider) != null
) {
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

		$(".boat-overview-slider").owlCarousel({
			loop: true,
			autoplay: true,
			items: 1,
			nav: false,
			center: true,
			dots: true,
		});

		$(".boat-badges-slider").owlCarousel({
			loop: false,
			margin: 10,
			nav: false,
			dots: false,
			autoWidth: true,
		});
	});
}

// Profile

btn_edit_profile = document.addEventListener("DOMContentLoaded", function () {
	var btn_edit_profile = document.getElementById("edit-profile-button");

	if (btn_edit_profile != null) {
		btn_edit_profile.addEventListener("click", function () {
			var form = document.getElementById("edit-profile-form");
			if (form.style.display === "none" || form.style.display === "") {
				form.style.display = "block";
				btn_edit_profile.textContent = "Cancel";
			} else {
				form.style.display = "none";
				btn_edit_profile.textContent = "Edit";
			}
		});
	}
});

btn_edit_password = document.addEventListener("DOMContentLoaded", function () {
	var btn_edit_password = document.getElementById("edit-password-button");

	if (btn_edit_password != null) {
		btn_edit_password.addEventListener("click", function () {
			var form = document.getElementById("edit-password-form");
			if (form.style.display === "none" || form.style.display === "") {
				form.style.display = "block";
				btn_edit_password.textContent = "Cancel";
			} else {
				form.style.display = "none";
				btn_edit_password.textContent = "Edit";
			}
		});
	}
});

// Profile END

// Data Tables
dashboard = document.querySelector(".dashboard");
if (dashboard != null) {
	new DataTable("#datatable", {
		buttons: [
			"copy",
			"csv",
			"excel",
			{
				extend: "pdfHtml5",
				text: "PDF",
				exportOptions: {
					columns: ":visible",
				},
			},
			{
				extend: "colvis",
				collectionLayout: "dropdown",
				text: "Column Visibility",
			},
		],
		layout: {
			topStart: "buttons",
		},
		// fixedHeader: {
		// 	headerOffset: $('#dashnav').outerHeight(),
		// },
		colReorder: true,
		responsive: true,
		paging: true,
		searching: true,
		ordering: true,
		autoWidth: true,
	});
}

(() => {
	"use strict";

	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	const forms = document.querySelectorAll(".needs-validation");

	// Loop over them and prevent submission
	Array.from(forms).forEach((form) => {
		form.addEventListener(
			"submit",
			(event) => {
				if (!form.checkValidity()) {
					event.preventDefault();
					event.stopPropagation();
				}

				form.classList.add("was-validated");
			},
			false
		);
	});
})();

function isNumberKey(evt) {
	var kodeASCII = evt.which ? evt.which : event.keyCode;
	if (kodeASCII > 31 && (kodeASCII < 48 || kodeASCII > 57)) {
		return false;
	}
	return true;
}

function isLetterSpaceKey(evt) {
	var charCode = evt.which ? evt.which : event.keyCode;
	if (
		(charCode < 65 || charCode > 90) &&
		(charCode < 97 || charCode > 122) &&
		charCode != 32
	) {
		return false;
	}
	return true;
}

function addTour() {
	var container  = document.querySelector('.add-tour-input')
	var newContent = `
	<label class="mt-3">Package Tour Details</label>
	<div class="input-tour-container">
		<div class="input-tour d-flex gap-3 mb-3">
			<input class="form-control w-75" type="text" name="tourNames[]" placeholder="Tour Name">
			<input class="form-control w-25" type="time" name="tourTimes[]">
		</div>
		<textarea class="form-control w-100" type="text" name="tourDescs[]" placeholder="Simple description about the tour..." maxlength="50"></textarea>
	</div>`;
	container.insertAdjacentHTML('beforeend', newContent);
}

function addTourEdit(packageId) {
	var container  = document.querySelector('.edit-tour-input'+packageId);
	var newContent = `
	<label class="mt-3">Package Tour Details</label>
	<div class="input-tour-container">
		<div class="input-tour d-flex gap-3 mb-3">
			<input class="form-control w-75" type="text" name="tourNames[]" placeholder="Tour Name">
			<input class="form-control w-25" type="time" name="tourTimes[]">
		</div>
		<textarea class="form-control w-100" type="text" name="tourDescs[]" placeholder="Simple description about the tour..." maxlength="50"></textarea>
	</div>`;
	container.insertAdjacentHTML('beforeend', newContent);
}

$('.message').delay(3000).fadeOut(300);