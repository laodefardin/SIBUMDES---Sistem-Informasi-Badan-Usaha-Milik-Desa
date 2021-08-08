<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$query = "SELECT * FROM badan_usaha WHERE id_badanusaha = '$id'";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);

if (is_file("./badanusaha/" . $data['file']))
    unlink("./badanusaha/" . $data['file']);
    
$hapus = "DELETE FROM badan_usaha WHERE id_badanusaha = '$id'";

$proses = $koneksi->query($hapus);
if ($proses) {
    $_SESSION['pesan'] = 'Hapus';
    // $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="alert">
    //                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    //                 <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di hapus</h6></div>';
}
echo "<script> document.location.href='./badan-usaha';</script>";
die();
