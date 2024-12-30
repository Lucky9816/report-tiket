const flashData = $('.flash-data').data('flashdata');

if (flashData == 1) {
	Swal.fire({
		icon: 'success',
		title: 'Impor Data Sukses',
		showConfirmButton: false,
		timer: 1700
	});
} else if (flashData == 2) {
	Swal.fire({
		icon: 'error',
		title: 'Tidak Ditemukan Data Pada File Excel atau Semua Data Yang Ada Sudah Tercata Pada Aplikasi',
		confirmButtonColor: '#0000ff',
		confirmButtonText: 'Tutup',
	});
} else if (flashData == 3) {
	Swal.fire({
		icon: 'error',
		title: 'Tida Ada File Excel',
		confirmButtonColor: '#0000ff',
		confirmButtonText: 'Tutup',
	});
} else {
	null
};










