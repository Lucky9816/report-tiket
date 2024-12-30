const flashData = $('.flash-data').data('flashdata');
const dataUser = $('.user-data').data('user');

if (flashData == 1) {
	Swal.fire({
		icon: 'success',
		title: 'Berhasil disimpan',
		showConfirmButton: false,
		timer: 1700
	});
} else if (flashData == 2) {
	Swal.fire({
		icon: 'success',
		title: 'Perubahan berhasil disimpan',
		showConfirmButton: false,
		timer: 1700
	});
} else if (flashData == 3) {
	Swal.fire({
		icon: 'error',
		title: 'Password sekarang salah',
		confirmButtonColor: '#0000ff',
		confirmButtonText: 'Ya',
	});
} else if (flashData == 4) {
	Swal.fire({
		icon: 'success',
		title: 'Berhasil dihapus',
		showConfirmButton: false,
		timer: 1700
	});
} else if (flashData == 5) {
	Swal.fire({
		icon: 'warning',
		title: 'Tidak ada perubahan pada data',
		showConfirmButton: false,
		timer: 1700
	});
} else if (flashData == 6) {
	Swal.fire({
		icon: 'error',
		title: 'Tidak ada item yang dipilih',
		showConfirmButton: false,
		timer: 1700
	});
} else if (flashData == 7) {
	Swal.fire({
		icon: 'error',
		title: 'Produk PO ke Supplier tidak sesuai dengan DO',
		showConfirmButton: true
	});
}  else {
	null
};

$('.delete-confirm').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah anda yakin akan menghapus?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#dc3545',
		cancelButtonColor: '#6c757d',
		confirmButtonText: 'Ya, hapus'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});

$('form.delete-confirm-sbm').on('submit', function (e) {
	e.preventDefault();
	const form = $(this);
	Swal.fire({
		title: 'Apakah anda yakin akan menghapus?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#dc3545',
		cancelButtonColor: '#6c757d',
		confirmButtonText: 'Ya, hapus'
	}).then((result) => {
		if (result.value) {
			form.unbind('submit').submit();
		}
	})
});








