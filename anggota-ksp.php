<?php
$halaman = 'Anggota KSP';
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

         <?php
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    $pesan = $_SESSION['pesan'];
                    echo '<div class="flash-data" data-flashdata="' . $_SESSION['pesan'] . '"></div>';
                }
                $_SESSION['pesan'] = '';
                ?>
                
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-10">
                <div class="card card-lg">
        <div class="col-12">
            <div class="card">
                <div class="row row-0">
                    <div class="col">
                        <div class="card-body">
                            <h3 class="card-title">Daftar <?= $halaman ?>
                            <a href="daftar-anggota" class="btn btn-primary btn-sm" name="daftar">Klik Daftar Anggota</a>
                            </h3>
                            
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Pekerjaan</th>
                                            <th>Alamat</th>
                                            <th>Status Anggota Aktif</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $koneksi->query("SELECT * FROM anggota_ksp");
                                        $nomor = 1;
                                        foreach ($query as $data): ?>
                                        <tr>
                                            <td><?= $nomor; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['pekerjaan']; ?></td>
                                            <td><?= $data['alamat']; ?></td>
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