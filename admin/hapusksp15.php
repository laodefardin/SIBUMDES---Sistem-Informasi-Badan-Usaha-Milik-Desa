<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$hapus = "DELETE FROM ksp15 WHERE id_ksp15 = '$id'";

$proses = $koneksi->query($hapus);
if ($proses) {
    $_SESSION['pesan'] = 'Hapus';
    // $_SESSION['pesan'] = '<div class="alert alert-success alert-dismissible" role="alert">
    //                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    //                 <h6><i class="icon fas fa-check"></i> Sukses! Data Berhasil Di hapus</h6></div>';
}
echo "<script> document.location.href='./ksp-1-5';</script>";
die();
