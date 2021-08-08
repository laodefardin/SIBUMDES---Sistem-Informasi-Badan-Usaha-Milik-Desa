<?php
$halaman = 'Edit Anggota';
include 'global_header.php';
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
                                <!-- <h1>Silahkan isi formulir berikut untuk mengajukan permohonan pinjaman</h1> -->
                                <!-- <br> -->

                                <?php
                                $id = $_GET['id'];
                                $query = $koneksi->query("SELECT * FROM anggota WHERE id_anggota = '$_GET[id]' ");
                                if(is_array($query) || is_object($query)){
                                foreach ($query as $data) {
                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="mb-6">
                                                <div class="form-label required">Nama</div>
                                                <input type="text" class="form-control" placeholder="Masukkan Nama"
                                                    name="nama" value="<?= $data['nama'] ?>">
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Pinjaman Pokok</div>
                                                <input type="text" class="form-control"
                                                    placeholder="Masukkan Pinjaman Pokok" name="pinjaman_pokok"
                                                    value="<?= $data['pinjaman_pokok'] ?>">
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Jasa Persen</div>
                                                <select class="form-control" name="jasa" id="jasa">
                                                <option selected >Pilih Jasa Persen</option>
                                                <option value="1" <?= $data['jasa'] == '1' ? 'selected' : ' ' ?>>Jasa 1%</option>
                                                <option value="1.5" <?= $data['jasa'] == '1.5' ? 'selected' : ' ' ?>>Jasa 1,5%</option>
                                                </select>
                                            </div>
                                            <!-- <div class="mb-6">
                                                <div class="form-label required">Jasa 1%</div>
                                                <input type="text" class="form-control" placeholder="Masukkan Jasa 1%"
                                                    name="jasa1" required>
                                            </div>
                                            <div class="mb-6">
                                                <div class="form-label required">Jasa 1,5%</div>
                                                <input type="text" class="form-control" placeholder="Masukkan Jasa 1,5%"
                                                    name="jasa1" required>
                                            </div> -->

                                
                                        </div>
                                        <!-- <div class="col-xl-8">
                                            <fieldset>
                                                <legend>Sudah dibayar</legend>
                                                <div class="mb-6">
                                                    <label class="form-label required">Pokok</label>
                                                    <input type="text" class="form-control" name="pokok" required>
                                                </div>
                                                <div class="mb-6">
                                                    <label class="form-label required">Jasa</label>
                                                    <input type="text" class="form-control" name="jasa" required>
                                                </div>
                                            </fieldset>


                                        </div> -->
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
    echo $nama = $_POST['nama'];
    echo $pinjaman_pokok = $_POST['pinjaman_pokok'];
    echo $jasa = $_POST['jasa'];

    echo $totalbayar = $pinjaman_pokok * $jasa / 100;

    $update = "UPDATE anggota SET nama='".$nama."', pinjaman_pokok='".$pinjaman_pokok."', jasa='".$jasa."', totalbayar='".$totalbayar."' WHERE id_anggota = '".$id."' ";

    $proses = $koneksi->query($update);
    if ($proses){
        $_SESSION['pesan'] = 'Update';
        echo "<script> document.location.href='./anggota';</script>";
        exit;
    }

}
?>
<?php include 'global_footer.php'; ?>