<?php
$halaman = 'Kerjasama';
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
                        <h1>Silahkan isi formulir berikut untuk mengajukan Permohonan Kerjasama</h1>
                        <br>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Nama Kelompok Usaha</label>
                                        <input type="text" class="form-control" name="nama"
                                            placeholder="Masukkan nama kelompok usaha">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Proposal Usaha (File Dokumen)</label>
                                        <input type="file" class="form-control" name="proposalusaha">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label required">Upload Kegiatan Usaha (Foto)</div>
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label class="form-label required">Kegiatan Usaha</label>
                                        <input type="text" class="form-control" name="kegiatanusaha"
                                            placeholder="Masukkan nomor nik ">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Email Usaha</label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Masukkan Email Usaha">
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