<?php
$halaman = 'Pertamini';
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
                            <h3 class="card-title">Laporan <?= $halaman ?>
                            </h3>

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Laporan</th>
                                            <th>Tanggal</th>
                                            <th>Laporan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $koneksi->query("SELECT * FROM pertamini");
                                        $nomor = 1;
                                        foreach ($query as $data): ?>
                                        <tr>
                                            <td><?= $nomor; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['tanggal']; ?></td>
                                            <td> <a href="./admin/pertamini/<?= $data['file']; ?>" target="_blank">Unduh</a></td>
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