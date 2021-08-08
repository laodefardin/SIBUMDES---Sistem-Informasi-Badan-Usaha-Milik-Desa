<?php
$halaman = 'KSP';
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

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Cetak Rekap dengan Pencarian Data</h3>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3 row">
                        <label class="form-label col-3 col-form-label">Bulan</label>
                        <div class="col">
                            <select name="bln" id='bln' class="form-control">
                                <option selected="selected">Pilih Bulan</option>
                                <?php
$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$jlh_bln=count($bulan);
for($c=0; $c<$jlh_bln; $c+=1){
    echo"<option value=$bulan[$c]> $bulan[$c] </option>";
}
?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3 row">
                        <label class="form-label col-3 col-form-label">Tahun</label>
                        <div class="col">
                            <?php
$now=date('Y');
echo "<select name='tahun' id='tahun' class='form-control'>";
echo "<option selected='selected'>Pilih Tahun</option>";
for ($a=2018;$a<=$now;$a++)
{
    echo "<option value='$a'>$a</option>";
}
echo "</select>";
?>
                        </div>
                    </div>
                    <div class="form-footer">
                        <input class="btn btn-success btn-sm" name="submit_excel" target ='_blank' type="submit" value="Excel">
                        <input class="btn btn-danger btn-sm" name="submit_pdf" target ='_blank' type="submit" value="PDF">

                        <input class="btn btn-primary btn-sm" name="submit" type="submit" value="Submit">
                        <a style="text-align: right;" class="btn btn-danger btn-sm" href="ksp-1-5">Refresh</a>
                    </div>

            </div>
        </div>
        <br>
        <div class="col-12">
            <div class="card">
                <div class="row row-0">
                    <div class="col">
                        <div class="card-body">
                            <h3 class="card-title">Halaman Edit <?= $halaman ?>
                                <a style="text-align: right;" class="btn btn-primary btn-sm offset-md-9"
                                    href="tambah_ksp15"> <i class="fa fa-plus"></i> Tambah KSP</a>
                            </h3>

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Pinjaman Pokok</th>
                                            <th>Jasa 10 bln</th>
                                            <th>Total Bayar</th>

                                            <th>Pokok (sdh bayar) </th>
                                            <th>Jasa (sdh bayar) </th>
                                            <th>Bln & tahun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_POST['submit'])){
                                            $bln = $_POST['bln'];
                                            $tahun = $_POST['tahun'];

                                            $query = $koneksi->query("SELECT ksp15.*, anggota.* FROM ksp15 INNER JOIN anggota ON ksp15.id_anggota=anggota.id_anggota WHERE bulan = '$bln' AND tahun = '$tahun'");
                                        
                                        }else{
                                        $query = $koneksi->query("SELECT ksp15.*, anggota.* FROM ksp15 INNER JOIN anggota ON ksp15.id_anggota=anggota.id_anggota"); 
                                
                                        }
                                        $nomor = 1;
                                        foreach ($query as $data):
                                        ?>
                                        <tr>
                                            <td><?= $nomor; ?></td>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= rupiah($data['pinjaman_pokok']); ?></td>
                                            <td><?= rupiah($data['totaljasa']); ?></td>
                                            <td><?= rupiah($data['totalbayar']); ?></td>

                                            <td><?= rupiah($data['sdh_pokok']); ?></td>
                                            <td><?= rupiah($data['sdh_jasa']); ?></td>
                                            <td><?= $data['bulan']; ?> - <?= $data['tahun']; ?></td>
                                            <td>
                                                <a class="icon" href="hapusksp15?id=<?=$data['id_ksp15'];?>"
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
                                                <a class="icon" href="edit_ksp15?id=<?=$data['id_ksp15'];?>"><svg
                                                        xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                        <line x1="16" y1="5" x2="19" y2="8" /></svg></a>
                                            </td>
                                        </tr>
                                        <?php $nomor++; endforeach; ?>
                                    </tbody>
                                </table>
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
if (isset($_POST['submit_pdf'])){
$_SESSION["bln"] = $_POST['bln'];
$_SESSION["tahun"] = $_POST['tahun'];
echo "<script>window.open('cetak/export_pdf1.php', '_blank');</script>";
}
?>

<?php
if (isset($_POST['submit_excel'])){
$_SESSION["bln"] = $_POST['bln'];
$_SESSION["tahun"] = $_POST['tahun'];
echo "<script>window.open('cetak/export_excel1.php', '_blank');</script>";
}
?>

<?php include 'global_footer.php'; ?>