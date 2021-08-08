<?php
$halaman = 'Tambah Anggota Kuliner';
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
                                        <div class="col-xl-5">
                                            <div class="mb-6">
                                                <div class="form-label required">Nama</div>
                                                <input type="text" class="form-control" placeholder="Masukkan Nama"
                                                    name="nama" required>
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Jabatan</div>
                                                <input type="text" class="form-control" name="jabatan" id="jabatan" required>                                           
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Alamat</div>
                                                <input type="text" class="form-control" name="alamat" id="alamat"
                                                    required>                                           
                                            </div>                  
                                        </div>
                                        <div class="col-xl-5">
                                                <div class="mb-6">
                                                    <label class="form-label required">No KTP</label>
                                                    <input type="text" class="form-control" name="noktp" id="noktp" required>
                                                </div>
                                                <div class="mb-6">
                                                    <label class="form-label required">No Handphone</label>
                                                    <input type="text" class="form-control" name="nohp" id="nohp" required>
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
if (isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $alamat = $_POST['alamat'];
    $noktp = $_POST['noktp'];
    $nohp = $_POST['nohp'];

    $query = 'INSERT INTO anggota_kuliner (nama, jabatan, alamat, noktp, nohp) VALUES ("'.$nama.'","'.$jabatan.'","'.$alamat.'","'.$noktp.'", "'.$nohp.'") ';     

    $proses = $koneksi->query($query);
    if ($proses){
        $_SESSION['pesan'] = 'Tambah';
        echo "<script> document.location.href='./anggota-kuliner';</script>";
        exit;
    }
}
?>
<?php include 'global_footer.php'; ?>