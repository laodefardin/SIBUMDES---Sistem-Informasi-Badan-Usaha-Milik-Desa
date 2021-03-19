<?php
$halaman = 'Pelunasan Pinjaman';
include 'global_header.php';
include 'global_navigasi.php';

?>

<div class='content'>
    <div class='container-xl'>
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <?= $halaman ?>
                    </h2>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="card card-lg">
                    <div class="card-body markdown">
                        <h1>Silahkan isi formulir berikut untuk mengajukan Permohonan Pelunasan Pinjaman</h1>
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
                                        <label class="form-label required">Pembayaran Ke</label>
                                        <input type="text" class="form-control" name="pembayaran"
                                            placeholder="Masukkan Pembayaran ke - ">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">lanjut Pinjaman</label>
                                        <select name="user[month]" class="form-select">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">NIK</label>
                                        <input type="text" class="form-control" name="nik"
                                            placeholder="Masukkan nomor nik ">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Sisa Pinjaman</label>
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Masukkan Sisa Pinjaman">
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