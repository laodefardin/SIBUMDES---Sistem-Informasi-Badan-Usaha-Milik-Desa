<?php
$halaman = 'Tambah KSP 1%';
include 'global_header.php';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Membuat Form Otomatis menggunakan Ajax</title>
</head>

<body>
	<div class="content">
		<form action="">
			<table>
				<tr>
					<td>Nama</td>
					<td> <select onchange="cek_database()" id="nama">
							<option value='' selected>- Pilih -</option>
							<?php
		include "../koneksi.php";
		$anggota = mysqli_query($koneksi,"SELECT * FROM anggota WHERE jasa = '1'");
		while ($row = mysqli_fetch_array($anggota)) {
			echo "<option value='$row[nama]'>$row[nama]</option>";
		}
	?>
						</select></td>
				</tr>
				<tr>
					<td>Pinjaman Pokok</td>
					<td> <input type="text" id="pinjaman_pokok"></td>
				</tr>
				<tr>
					<td>jasa</td>
					<td> <input type="text" id="jasa"></td>
				</tr>
				<tr>
					<td>totaljasa</td>
					<td> <input type="text" id="totaljasa"></td>
				</tr>
				<tr>
					<td>totalbayar</td>
					<td> <input type="text" id="totalbayar"></td>
				</tr>
				<tr>
					<td>id</td>
					<td> <input type="text" id="anggota"></td>
				</tr>
			</table>
		</form>

		<div class="card-body">
			<div class="form-group">
				<input type="text" id="harga" class="form-control" placeholder="Harga Barang">
			</div>
			<div class="form-group">
				<input type="text" id="jumlah" class="form-control" placeholder="Jumlah Barang">
			</div>
			<div class="form-group mb-0">
				<input type="text" id="total" class="form-control" placeholder="Total" readonly="">
			</div>
		</div>

	</div>

</body>

</html>
<?php include 'global_footer.php'; ?>