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
var btn_edit_profile = document.getElementById("edit-profile-button");

if (btn_edit_profile != null) {
	btn_edit_profile.addEventListener("click", function () {
		var form = document.getElementById("edit-profile-form");
		if (form.style.display === "none" || form.style.display === "") {
			form.style.display = "block";
			btn_edit_profile.textContent = "CANCEL";
		} else {
			form.style.display = "none";
			btn_edit_profile.textContent = "EDIT";
		}
	});
}

var btn_edit_password = document.getElementById("edit-password-button");

if (btn_edit_password != null) {
	btn_edit_password.addEventListener("click", function () {
		var form = document.getElementById("edit-password-form");
		if (form.style.display === "none" || form.style.display === "") {
			form.style.display = "block";
			btn_edit_password.textContent = "CANCEL";
		} else {
			form.style.display = "none";
			btn_edit_password.textContent = "EDIT";
		}
	});
}


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
	var container = document.querySelector(".add-tour-input");
	var newContent = `
	<label class="mt-3">Package Tour Details</label>
	<div class="input-tour-container">
		<div class="input-tour d-flex gap-3 mb-3">
			<input class="form-control w-75" type="text" name="tourNames[]" placeholder="Tour Name">
			<input class="form-control w-25" type="time" name="tourTimes[]">
		</div>
		<textarea class="form-control w-100" type="text" name="tourDescs[]" placeholder="Simple description about the tour..." maxlength="50"></textarea>
	</div>`;
	container.insertAdjacentHTML("beforeend", newContent);
}

function addTourEdit(packageId) {
	var container = document.querySelector(".edit-tour-input" + packageId);
	var newContent = `
	<label class="mt-3">Package Tour Details</label>
	<div class="input-tour-container">
		<div class="input-tour d-flex gap-3 mb-3">
			<input class="form-control w-75" type="text" name="tourNames[]" placeholder="Tour Name">
			<input class="form-control w-25" type="time" name="tourTimes[]">
		</div>
		<textarea class="form-control w-100" type="text" name="tourDescs[]" placeholder="Simple description about the tour..." maxlength="50"></textarea>
	</div>`;
	container.insertAdjacentHTML("beforeend", newContent);
}

var checkFancyBox = document.querySelector(".fancybox");
if (checkFancyBox != null) {
	Fancybox.bind('[data-fancybox="video"]', {
		buttons: [
			"zoom",
			"slideShow",
			"fullScreen",
			"thumbs",
			"close"
		],
		youtube: {
			controls: 1,
			showinfo: 0,
		},
		vimeo: {
			color: "f00",
		},
		iframe: {
			css: {
				width: "80%",
				height: "80%",
			},
		},
		protect: true,
		loop: true,
		transitionEffect: "slide",
		transitionDuration: 500,
		thumbs: {
			autoStart: true,
			axis: "x",
		},
	});

	Fancybox.bind('[data-fancybox="gallery"]', {
		buttons: [
			"zoom",
			"slideShow",
			"fullScreen",
			"thumbs",
			"close"
		],
		protect: true,             
		loop: true,                
		transitionEffect: "slide", 
		transitionDuration: 500,   
		thumbs: {
			autoStart: true, 
			axis: "x"        
		}
	});
}




const playButton = document.getElementById("playButton");
const videoContainer = document.getElementById("videoContainer");
const video = document.getElementById("fullscreenVideo");

if ((video && playButton && videoContainer) != null) {
	let isPlaying = false;
	playButton.addEventListener("click", () => {
		if (isPlaying) {
			video.pause();
			video.currentTime = 0;
			videoContainer.style.display = "none";
		} else {
			videoContainer.style.display = "block";
			video.play();
		}
		isPlaying = !isPlaying;
	});

	function stopVideo() {
		if (isPlaying) {
			video.pause();
			video.currentTime = 0;
			videoContainer.style.display = "none";
			isPlaying = false;
		}
	}

	window.addEventListener("scroll", stopVideo);
	window.addEventListener("touchmove", stopVideo);
	window.addEventListener("resize", stopVideo);
}

$('.message').delay(5000).fadeOut(300);

var datepicker = document.querySelector('.datepicker');
if (datepicker != null) {
	var date = new Date();
	date.setDate(date.getDate() + 2);
	$('.datepicker').datepicker({
		autoclose: true,
		format: "dd-mm-yyyy",
		maxViewMode: "years",
		startDate: date,
		todayHighlight: true,
	});
}

const qrscanner = document.getElementById('qrscanner');
let scanner = new Instascan.Scanner({ video: document.getElementById('ticket-scanner') });
qrscanner.addEventListener('shown.bs.modal', event => {
	scanner.addListener('scan', function (content) {
		var data = content;
		var qrdata = document.getElementById('qrdata');
		qrdata.value = data;
		document.getElementById('qrform').submit();
	});
	Instascan.Camera.getCameras().then(function (cameras) {
		if (cameras.length > 0) {
			scanner.start(cameras[0]);
		} else {
			console.error('No cameras found.');
		}
	}).catch(function (e) {
		console.error(e);
	});
});

qrscanner.addEventListener('hidden.bs.modal', event => {
	scanner.stop();
});
