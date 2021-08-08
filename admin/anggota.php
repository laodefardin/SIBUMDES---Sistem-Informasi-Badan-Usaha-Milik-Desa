<?php
$halaman = 'Input Anggota';
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
                            <h3 class="card-title">Halaman <?= $halaman ?>
                                <a style="text-align: right;" class="btn btn-primary btn-sm offset-md-10"
                                    href="tambah-anggota"> <i class="fa fa-plus"></i> Tambah Anggota</a>
                            </h3>

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Pinjaman Pokok</th>
                                            <th>Jasa Persen</th>
                                            <th>Jasa (10 Bln)</th>
                                            <th>Total Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = $koneksi->query("SELECT * FROM anggota");
                                        $nomor = 1;
                                        foreach ($query as $data): ?>
                                        <tr>
                                            <td><?= $nomor; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= rupiah($data['pinjaman_pokok']) ?></td>
                                            <td><?= $data['jasa']; ?> %</td>
                                            <td><?= rupiah($data['totaljasa']); ?></td>
                                            <td><?= rupiah($data['totalbayar']); ?></td>
                                            <td>
                                                <a class="icon"
                                                    href="hapusanggota?id=<?=$data['id_anggota'];?>"
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
                                                <a class="icon"
                                                    href="editanggota?id=<?=$data['id_anggota'];?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg></a>
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

<?php
if (isset($_POST['tambah'])){
    $visimisi = $_POST['visimisi'];

$update = $koneksi->query("UPDATE profil SET isiprofil = '".$visimisi."' WHERE id_profil = '1'  ");
$_SESSION['pesan'] = 'Ubah';
echo "<script> document.location.href='./visi-misi';</script>";
exit;
}
?>
<?php
include 'global_footer.php'
?>