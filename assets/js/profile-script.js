// btn_edit_profile = document.getElementById("edit-profile-button");
// if (btn_edit_profile != null) {
// 	btn_edit_profile.addEventListener("click", function () {
// 		var form = document.getElementById("edit-profile-form");
// 		if (form.style.display === "none" || form.style.display === "") {
// 			form.style.display = "block";
// 		} else {
// 			form.style.display = "none";
// 		}
// 	});
// }

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
