<?php
$halaman = 'Pendaftaran Anggota';
include 'global_header.php';
include 'global_navigasi.php';
?>
<div class='content'>
    <div class='container-xl'>
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <?= $halaman?>
                    </h2>
                </div>
            </div>
        </div>

        <?php
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    $pesan = $_SESSION['pesan'];
                    echo '<div class="flash-data" data-flashdata="' . $_SESSION['pesan'] . '"></div>';
                }
                $_SESSION['pesan'] = '';
                ?>

        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="card card-lg">
                    <div class="card-body markdown">
                        <h1>Silahkan isi formulir berikut untuk melakukan pendaftaran</h1>
                        <br>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama"
                                            placeholder="Masukkan nama anda" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempatlahir" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggallahir" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">NIK KTP</label>
                                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control"
                                            name="nik" maxlength="16" placeholder="Masukkan nomor nik" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">No Kartu Keluarga</label>
                                        <input type="text" class="form-control" onkeypress="return hanyaAngka(event)"
                                            maxlength="16" name="nokk" placeholder="Masukkan No Kartu Keluarga anda"
                                            required>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Pekerjaan</label>
                                        <input type="text" class="form-control" name="pekerjaan"
                                            placeholder="Masukkan pekerjaan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" cols="20" rows="3"
                                            placeholder="Masukkan Alamat, Dusun, Desa, Kec., Kab" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Agama</label>
                                        <select name='agama' class="form-control">
                                            <option> -- Pilih Agama -- </option>
                                            <option value='Islam'>Islam</option>
                                            <option value='Kristen'>Kristen</option>
                                            <option value='Katholik'>Katholik</option>
                                            <option value='Hindu'>Hindu</option>
                                            <option value='Budha'>Budha</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Masukkan Email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">No HP</label>
                                        <input type="text" class="form-control" onkeypress="return hanyaAngka(event)"
                                            maxlength="12" name="nohp" placeholder="Masukkan nomor hp " required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <input class="btn btn-primary " name="upload" type="submit" value="Daftar Anggota">
                            <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                onclick="self.history.back()">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
include 'global_footer.php';
?>

    <?php
if(isset($_POST['upload'])){

    $nama = htmlentities(strip_tags(trim($_POST['nama'])));
    $tanggallahir = htmlentities(strip_tags(trim($_POST['tanggallahir'])));
    $tempatlahir = htmlentities(strip_tags(trim($_POST['tempatlahir'])));
    $nik = htmlentities(strip_tags(trim($_POST['nik'])));
    $nokk = htmlentities(strip_tags(trim($_POST['nokk'])));

    $pekerjaan = htmlentities(strip_tags(trim($_POST['pekerjaan'])));
    $alamat = htmlentities(strip_tags(trim($_POST['alamat'])));
    $agama = htmlentities(strip_tags(trim($_POST['agama'])));
    $email = htmlentities(strip_tags(trim($_POST['email'])));
    $nohp = htmlentities(strip_tags(trim($_POST['nohp'])));
    
    $query = 'INSERT INTO anggota_ksp (nama, tanggallahir, tempatlahir, nik, nokk, pekerjaan, alamat, agama, email, nohp) VALUES ("'.$nama.'","'.$tanggallahir.'", "'.$tempatlahir.'", "'.$nik.'", "'.$nokk.'", "'.$pekerjaan.'", "'.$alamat.'", "'.$agama.'", "'.$email.'", "'.$nohp.'")';

    $proses = $koneksi->query($query);
    if ($proses){
        $_SESSION['pesan'] = 'Tambah';
        echo "<script> document.location.href='./anggota-ksp';</script>";
        }
    }
?>