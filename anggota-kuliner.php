<?php
$halaman = 'Anggota Kuliner';
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
            <div class="col-lg-10 col-xl-10">
                <div class="card card-lg">
        <div class="col-12">
            <div class="card">
                <div class="row row-0">
                    <div class="col">
                        <div class="card-body">
                            <h3 class="card-title">Daftar <?= $halaman ?>
                            </h3>

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Alamat</th>
                                            <th>No KTP</th>
                                            <th>No Handphone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $koneksi->query("SELECT * FROM anggota_kuliner");
                                        $nomor = 1;
                                        foreach ($query as $data): ?>
                                        <tr>
                                            <td><?= $nomor; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['jabatan']; ?></td>
                                            <td><?= $data['alamat']; ?></td>
                                            <td><?= $data['noktp']; ?></td>
                                            <td><?= $data['nohp']; ?></td>
                                        </tr>
                                        <?php $nomor++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
            </div>
        </div>

    </div>
</div>


<?php
include 'global_footer.php';
?>