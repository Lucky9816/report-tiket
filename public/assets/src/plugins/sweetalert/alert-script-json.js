
// JavaScript function to handle the JSON response
function handleResponse(response) {
	if (response.success) {
		// Show success popup using Swal
		showSuccessPopup(response.message);
	} else if (response.not_valid) {
		// Show success popup using Swal
		showErrorPopup(response.message2);
	} else {
		// Show error popup using Swal
		showErrorPopup(response.message);
	}
}

// JavaScript function to handle AJAX error response
function handleErrorResponse(error) {
	// Show error popup using Swal
	showErrorPopup('Ada masalah. Tolong cek kembali inputan anda');
}

// JavaScript function to show a success popup using Swal
function showSuccessPopup(message) {
	Swal.fire({
		icon: 'success',
		text: message,
		showConfirmButton: false,
		timer: 1500 // Auto close after 1.5 seconds
	}).then((result) => {
		if (result.dismiss === Swal.DismissReason.timer) {
			$('#field2').focus();
		}
	});
}

// JavaScript function to show an error popup using Swal
function showErrorPopup(message) {
	Swal.fire({
		icon: 'error',
		text: message
	});
}