<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$query = "SELECT * FROM slide WHERE id_slide = '$id'";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);

if (is_file("./img/slide/" . $data['gambar']))
    unlink("./img/slide/" . $data['gambar']);
    
$hapus = "DELETE FROM slide WHERE id_slide = '$id'";

$proses = $koneksi->query($hapus);
if ($proses) {
    $_SESSION['pesan'] = 'Hapus';
    // $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="alert">
    //                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    //                 <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di hapus</h6></div>';
}
echo "<script> document.location.href='./manage-slide';</script>";
die();
