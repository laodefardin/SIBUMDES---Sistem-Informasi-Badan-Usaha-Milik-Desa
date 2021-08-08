<?php
$halaman = 'Tambah Slide';
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
                                                <div class="form-label required">Gambar Slide</div>
                                                <input type="file" class="form-control" name="foto" id="foto"
                                                    accept="image/jpeg"><br>
                                                <br>
                                            </div>

                                            <div class="mb-6">
                                                <div class="form-label required">Aktif Slide</div>
                                                <select name="aktif" id="aktif" class="form-control">
                                                <option><-Pilih Aktif-></option>
                                                <option value="0">0 Gambar Akhir</option>
                                                <option value="1">1 Gambar Awal</option>
                                                </select>
                                                
                                                <br><button class="btn btn-primary"
                                                    name="upload" type="submit">Upload</button>
                                                <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                                    onclick="self.history.back()">
                                                <br>
                                            </div>
                                </form>

                            </div>

                        </div>
                        <br>
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
if (isset($_POST['upload'])){ 
$aktif = $_POST['aktif'];
  $img = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
    // // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $nama_baru = date('dmYHis').$img;
    // // Set path folder tempat menyimpan fotonya
  $path = "./img/slide/".$nama_baru;
    // // Proses upload
    if(move_uploaded_file($tmp, $path)){
    echo $query = 'INSERT INTO slide (gambar, active) values("'.$nama_baru.'","'.$aktif.'")';
    $sql = mysqli_query($koneksi,$query) or die(mysqli_error());
    $_SESSION['pesan']='Tambah';
    echo "<script type='text/javascript'>window.location = 'manage-slide'</script>";
    }
  }
    ?>

<?php include 'global_footer.php'; ?>