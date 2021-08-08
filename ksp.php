<?php
$halaman = 'KSP';
include 'global_header.php';
include 'global_navigasi.php';
include 'admin/lib.php';
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
            <div class="col-lg-11 col-xl-11">
                <div class="card card-lg">
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
                                        <h3 class="card-title">Laporan <?= $halaman ?>
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
        </div>

    </div>
</div>

<?php
if (isset($_POST['submit_pdf'])){
$_SESSION["bln"] = $_POST['bln'];
$_SESSION["tahun"] = $_POST['tahun'];
echo "<script>window.open('admin/cetak/export_pdf1.php', '_blank');</script>";
}
?>

<?php
if (isset($_POST['submit_excel'])){
$_SESSION["bln"] = $_POST['bln'];
$_SESSION["tahun"] = $_POST['tahun'];
echo "<script>window.open('admin/cetak/export_excel1.php', '_blank');</script>";
}
?>
<?php
include 'global_footer.php';
?>