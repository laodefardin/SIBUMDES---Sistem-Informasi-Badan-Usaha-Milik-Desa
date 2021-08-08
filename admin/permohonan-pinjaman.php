<?php
$halaman = 'Permohonan Pinjaman';
include 'global_header.php';
include 'lib.php';
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
        <?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    $pesan = $_SESSION['pesan'];
                    echo '<div class="flash-data" data-flashdata="' . $_SESSION['pesan'] . '"></div>';
                }
                $_SESSION['pesan'] = '';
                ?>
        <div class="col-12">
            <div class="card">
                <div class="row row-0">
                    <div class="col">
                        <div class="card-body">
                            <h3 class="card-title">Halaman Edit <?= $halaman ?></h3>
                            <div class="table-responsive">
                                <table id="example1" class="table table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Validasi</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>NIK</th>
                                            <th>No Kartu Keluarga</th>
                                            <th>No HP</th>
                                            <th>Jumlah Ajuan</th>
                                            <th>Foto Usaha</th>
                                            <th>Surat Keterangan Usaha</th>
                                            <th>Alamat</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $koneksi->query("SELECT * FROM permohonan_pinjaman");
                                        $nomor = 1;
                                        foreach ($query as $data): ?>
                                        <tr>
                                            <td><?= $nomor; ?></td>
                                            <td>
                                                <?php
                                                if ($data['validasi'] == NULL) {?>
                                                <a href="sendterima?id=<?= $data['id_perpinjaman']; ?>" class="btn btn-sm btn-primary w-100">Terima</a> <br>
                                                <a href="sendtolak?id=<?= $data['id_perpinjaman']; ?>" class="btn btn-sm btn-danger w-100">Tolak</a>
                                                <?php }elseif($data['validasi'] == 'Diterima'){?>
                                                    <span>Diterima</span>
                                                <?php }else{ ?>
                                                    <span>Ditolak</span>
                                                <?php } ?>
                                            </td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['email']; ?></td>
                                            <td><?= $data['nik'] ?></td>
                                            <td><?= $data['nokk']; ?></td>
                                            <td><?= $data['nohp']; ?></td>
                                            <td><?= rupiah2($data['jmlpengajuan']); ?></td>
                                            <td><a href="../img/fotousaha/<?= $data['fotousaha']; ?>" target="_blank" rel="noopener noreferrer">Lihat</a></td>
                                            <td><a href="../img/fotoketeranganusaha/<?= $data['fotoketusaha']; ?>" target="_blank" rel="noopener noreferrer">Lihat</a></td>
                                            <td><?= $data['alamat']; ?></td>
                                            <td><?= $data['tanggal'];?></td>
                                            <td>
                                            <a class="icon" href="hapuspermohonanpinjaman?id=<?= $data['id_perpinjaman']; ?>"
                                                    onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"><svg
                                                        xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <line x1="4" y1="7" x2="20" y2="7" />
                                                        <line x1="10" y1="11" x2="10" y2="17" />
                                                        <line x1="14" y1="11" x2="14" y2="17" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></a>
                                            </td>
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

<?php include 'global_footer.php'; ?>