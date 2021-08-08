<?php
$halaman = 'Tambah Laporan Badan Usaha';
include 'global_header.php';
?>

<div class="content">
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <?= $halaman ?>
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="row row-0">
                    <div class="col">
                        <div class="card-body">
                            <div class="card-body markdown">
                                <!-- <h1>Silahkan isi formulir berikut untuk mengajukan permohonan pinjaman</h1> -->
                                <!-- <br> -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="mb-6">
                                                <div class="form-label required">Nama</div>
                                                <input type="text" class="form-control" placeholder="Masukkan Nama"
                                                    name="nama" required>
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Tanggal</div>
                                                <input type="date" class="form-control" name="tanggal" required>
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Upload File Laporan</div>
                                                <input type="file" class="form-control" name="laporan" id="laporan">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <input class="btn btn-primary " name="tambah" type="submit" value="Simpan">
                                    <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                        onclick="self.history.back()">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<?php
//after klik
if (isset($_POST['tambah'])){ 
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
  $img = $_FILES['laporan']['name'];
  $tmp = $_FILES['laporan']['tmp_name'];
    // // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $nama_baru = date('dmYHis').$img;
    // // Set path folder tempat menyimpan fotonya
  $path = "./badanusaha/".$nama_baru;
    // // Proses upload
    if(move_uploaded_file($tmp, $path)){
    echo $query = 'INSERT INTO badan_usaha (nama, file, tanggal) values("'.$nama.'","'.$nama_baru.'","'.$tanggal.'")';
    $sql = mysqli_query($koneksi,$query) or die(mysqli_error());
    $_SESSION['pesan']='Tambah';
    echo "<script type='text/javascript'>window.location = 'badan-usaha'</script>";
    }
  }
    ?>
<?php include 'global_footer.php'; ?>