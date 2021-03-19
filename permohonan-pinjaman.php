<?php
$halaman = 'Permohonan Pinjaman';
include 'global_header.php';
include 'global_navigasi.php';
?>
<?php
if(isset($_POST['upload'])){

    $date = date('d-M-Y');
    echo $nama = htmlentities(strip_tags(trim($_POST['nama'])));
    echo $nokk = htmlentities(strip_tags(trim($_POST['nokk'])));
    echo $alamat = htmlentities(strip_tags(trim($_POST['alamat'])));

    echo $nik = htmlentities(strip_tags(trim($_POST['nik'])));
    echo $email = htmlentities(strip_tags(trim($_POST['email'])));
    echo $nohp = htmlentities(strip_tags(trim($_POST['nohp'])));
    echo $jmlpengajuan = htmlentities(strip_tags(trim($_POST['jmlpengajuan'])));

    $foto1 = htmlentities(strip_tags(trim($_FILES['fotousaha']['name'])));
    $tmp1 = htmlentities(strip_tags(trim($_FILES['fotousaha']['tmp_name'])));
    $barufoto1 = date('dYHiS').$foto1;
    $path1 = "./img/fotousaha/".$barufoto1;


    $foto2 = htmlentities(strip_tags(trim($_FILES['fotoketusaha']['name'])));
    $tmp2 = htmlentities(strip_tags(trim($_FILES['fotoketusaha']['tmp_name'])));
    $barufoto2 = date('dYHiS').$foto2;
    $path2 = "./img/fotoketeranganusaha/".$barufoto2;

    if (move_uploaded_file($tmp1, $path1)){
        move_uploaded_file($tmp2, $path2);

        echo $query = 'INSERT INTO permohonan_pinjaman (nama, nokk, alamat, nik, email, nohp, jmlpengajuan, fotousaha, fotoketusaha, tanggal) VALUES ("'.$nama.'","'.$nokk.'", "'.$alamat.'", "'.$nik.'", "'.$email.'", "'.$nohp.'", "'.$jmlpengajuan.'", "'.$barufoto1.'", "'.$barufoto2.'", "'.$date.'" )';
    }
}
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


        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="card card-lg">
                    <div class="card-body markdown">
                        <h1>Silahkan isi formulir berikut untuk mengajukan permohonan pinjaman</h1>
                        <br>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama"
                                            placeholder="Masukkan nama anda">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">No Kartu Keluarga</label>
                                        <input type="text" class="form-control" name="nokk"
                                            placeholder="Masukkan No Kartu Keluarga anda">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Alamat</label>
                                        <input type="text" class="form-control" name="alamat"
                                            placeholder="Masukkan Alamat">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label required">Upload Foto Usaha</div>
                                        <input type="file" class="form-control" accept="image/jpeg" name="fotousaha">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label required">Upload Surat Keterangan Usaha (Foto)</div>
                                        <input type="file" class="form-control" accept="image/jpeg" name="fotoketusaha">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">NIK</label>
                                        <input type="text" class="form-control" name="nik"
                                            placeholder="Masukkan nomor nik ">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Masukkan Email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">No HP</label>
                                        <input type="text" class="form-control" name="nohp"
                                            placeholder="Masukkan nomor hp ">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Jumlah Pengajuan</label>
                                        <input type="text" class="form-control" name="jmlpengajuan"
                                            placeholder="Masukkan jumlah pengajuan ">
                                    </div>
                                </div>
                            </div>
                            <br>
                                <input class="btn btn-primary " name="upload" type="submit" value="Ajukan Permohonan">
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