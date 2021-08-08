var pinjaman_pokok = document.getElementById("pinjaman_pokok");
pinjaman_pokok.addEventListener("keyup", function (e) {
	pinjaman_pokok.value = convertRupiah(this.value, "Rp. ");
});


var sdhjasa = document.getElementById("sdhjasa");
sdhjasa.addEventListener("keyup", function(e) {
  sdhjasa.value = convertRupiah(this.value);
});

var sdhpokok = document.getElementById("sdhpokok");
sdhpokok.addEventListener("keyup", function(e) {
  sdhpokok.value = convertRupiah(this.value);
});

var jumlah = document.getElementById("jumlah");
jumlah.addEventListener("keyup", function (e) {
	jumlah.value = convertRupiah(this.value);
});

// function sum() {
// 	var sdhjasa = document.getElementById('sdhjasa').value;
// 	// sdhjasa.addEventListener("keyup", function (e) {
// 	// 	sdhjasa.value = convertRupiah(this.value);
// 	// });

// 	var sdhpokok = document.getElementById('sdhpokok').value;
// 	// sdhpokok.addEventListener("keyup", function (e) {
// 	// 	sdhpokok.value = convertRupiah(this.value);
// 	// });

// 	var result = parseInt(sdhjasa) + parseInt(sdhpokok);
// 	if (!isNaN(result)) {
// 		document.getElementById('jumlah').value = result;
// 	}
// }

// function sum() {
// 	var sdhjasa = document.getElementById('sdhjasa').value;
// 	sdhjasa.addEventListener("keyup", function (e) {
// 		sdhjasa.value = convertRupiah(this.value, "Rp. ");
// 	});

// 	var sdhpokok = document.getElementById('sdhpokok').value;
// 	sdhpokok.addEventListener("keyup", function (e) {
// 		sdhpokok.value = convertRupiah(this.value, "Rp. ");
// 	});

// 	var result = parseInt(sdhjasa) + parseInt(sdhpokok);
// 	if (!isNaN(result)) {
// 		var jumlah = document.getElementById('jumlah');
// 		jumlah.addEventListener("keyup", function (e) {
// 			jumlah.value = convertRupiah(this.value, "Rp. ");
// 		});
// 	}
// }

function convertRupiah(angka, prefix) {
	var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	if (ribuan) {
		separator = sisa ? "." : "";
		rupiah += separator + ribuan.join(".");
	}

	rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
	return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
}

function isNumberKey(evt) {
	key = evt.which || evt.keyCode;
	if (key != 188 // Comma
		&&
		key != 8 // Backspace
		&&
		key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
		&&
		(key < 48 || key > 57) // Non digit
	) {
		evt.preventDefault();
		return;
	}
}
