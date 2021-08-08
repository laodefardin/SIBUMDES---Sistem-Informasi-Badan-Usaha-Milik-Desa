<?php
$halaman = 'Edit KSP';
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

        <div class="col-12">
            <div class="card">
                <div class="row row-0">
                    <div class="col">
                        <div class="card-body">
                            <div class="card-body markdown">
                        <?php
                    $query = $koneksi->query("SELECT ksp15.*, anggota.* FROM ksp15 INNER JOIN anggota ON ksp15.id_anggota=anggota.id_anggota WHERE id_ksp15 = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="mb-6">
                                                <div class="form-label required">Nama</div>
                                                <select onchange="cek_database()" class="form-control" name="nama"
                                                    id="nama">
                                                    <option value="" selected> - Pilih - </option>
                                                    <?php
                                                $anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE jasa = '1.5'");
                                                while ($row = mysqli_fetch_array($anggota)){?>
                                                <option value='<?= $row['nama']?>' <?= $data['nama'] == $row['nama'] ? 'selected' : ' ' ?> ><?= $row['nama']?> </option>
                                                <?php }?>
                                                </select>
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Pinjaman Pokok</div>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan Pinjaman Pokok" id="pinjaman_pokok"
                                                    name="pinjaman_pokok" value='<?= rupiah2($data['pinjaman_pokok'])?>' onkeyup="sisa();" readonly>
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Jasa 1%</div>
                                                <input type="text" class="form-control" placeholder="Masukkan Jasa 1.5%"
                                                    name="jasa" id="jasa" value='<?= rupiah2($data['jasa'])?>' readonly>
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Total Jasa 10 Bln</div>
                                                <input type="text" value='<?= rupiah2($data['totaljasa'])?>' class="form-control" name="totaljasa" id="totaljasa" onkeyup="sisa1();"
                                                    readonly>
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Total Bayar</div>
                                                <input type="text" class="form-control" value='<?= rupiah2($data['totalbayar'])?>' name="totalbayar"
                                                    id="totalbayar" readonly>
                                            </div>
                                            
                                                <input type="text" class="form-control" value='<?= $data['id_anggota']?>' name="id_anggota"
                                                    id="id_anggota" hidden>
                                            
                                        </div>
                                        <div class="col-xl-8">

                                            <div class="mb-6">
                                                <div class="form-label required">Bulan</div>
                                                <select name="bln" class="form-control">
                                                    <option selected="selected">Pilih Bulan</option>
                                                    <?php
$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$jlh_bln=count($bulan);
for($c=0; $c<$jlh_bln; $c+=1){?>
<option value='<?= $bulan[$c]?>' <?= $data['bulan'] == $bulan[$c] ? 'selected' : ' ' ?>><?= $bulan[$c]?></option>
<?php } ?>

                                                </select>
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Tahun</div>
                                                <?php
$now=date('Y');
echo "<select name='tahun' class='form-control'>";
echo "<option selected='selected'>Pilih Tahun</option>";
for ($a=2018;$a<=$now;$a++){ ?>
<option value='<?= $a ?>' <?= $data['tahun'] == $a ? 'selected' : ' ' ?>><?= $a ?></option>
<?php }
echo "</select>";
?>
                                            </div>
                                            <div class="row">
                                                <legend>Sudah dibayar</legend>
                                                <div class="col-xl-5">
                                                    <fieldset>
                                                        <div class="mb-6">
                                                            <label class="form-label required">Pokok</label>
                                                            <input type="text" id="sdhpokok" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);sum();sisa();" value='<?= rupiah2($data['sdh_pokok']) ?>' name="sdhpokok" class="form-control">
                                                        </div>
                                                        <div class="mb-6">
                                                            <label class="form-label required">Jasa</label>
                                                            <input type="text" class="form-control" name="sdhjasa"
                                                                id="sdhjasa" value='<?= rupiah2($data['sdh_jasa']) ?>' onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);sum();sisa1();" required>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <!-- <div class="col-xl-10">
                                                    <fieldset>
                                                        <div class="mb-6">
                                                            <label class="form-label required">Jumlah</label>
                                                            <input type="text" id="jumlah" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);sum();"
                                                                name="jumlah" class="form-control" readonly>
                                                        </div>
                                                    </fieldset>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <input class="btn btn-primary " name="tambah" type="submit" value="Simpan">
                                    <input class="btn btn-danger" id="reset" type="reset" value="Batal"
                                        onclick="self.history.back()">
                                </form>
                                <?php }} ?>
                            
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
    // $id = $_POST['nama']; 
    // $pinjaman_pokok = $_POST['pinjaman_pokok'];
    // $jasa = $_POST['jasa'];
    // $totaljasa = $_POST['totaljasa'];
    // $totalbayar = $_POST['totalbayar'];

    $id = $_GET['id'];

    $anggota = $_POST['id_anggota'];
    $sdhpokok = $_POST['sdhpokok'];
    $sdpokok= str_replace(".", "", $sdhpokok);
    $sdhjasa = $_POST['sdhjasa'];
    $sdjasa= str_replace(".", "", $sdhjasa);
    $jumlah = $_POST['jumlah'];
    $bln = $_POST['bln'];
    $tahun = $_POST['tahun'];

    $waktu = date('d-m-Y H:i:s');

    
    // $sisapokok = $_POST['sisapokok'];
    // $sisajasa = $_POST['sisajasa'];
    // $jumlahsisa = $_POST['jumlahsisa'];

    $sum = "SELECT sum(sdh_pokok) AS totalsdhpokok FROM ksp15 WHERE id_anggota='$anggota'";
    $query = mysqli_query($koneksi, $sum);
    $data = mysqli_fetch_assoc($query);
    echo $totpokok = $sdpokok + $data['totalsdhpokok'];

    $sum = "SELECT sum(sdh_jasa) AS totalsdhjasa FROM ksp15 WHERE id_anggota='$anggota'";
    $query = mysqli_query($koneksi, $sum);
    $data = mysqli_fetch_assoc($query);
    echo $totjasa= $sdjasa + $data['totalsdhjasa'];

    $update = "UPDATE ksp15 SET sdh_pokok='".$sdpokok."', sdh_jasa='".$sdjasa."', totpokok='".$totpokok."', totjasa='".$totjasa."', bulan='".$bln."', tahun='".$tahun."', waktu='".$waktu."' WHERE id_ksp15 = '".$id."' ";

    $proses = $koneksi->query($update);
    if ($proses){
        $_SESSION['pesan'] = 'Tambah';
        echo "<script> document.location.href='./ksp-1-5';</script>";
        exit;
    }
}
?>
<?php include 'global_footer.php'; ?>