<?php 
session_start();
include '../koneksi.php';
if (!isset($_SESSION["username"])){
  echo "<script> document.location.href='../login-admin'; </script>";
}

$user = $_SESSION['username'];
$level = $_SESSION['level'];

$query = $koneksi->query("SELECT * FROM user WHERE username = '$user'");
$row = $query->fetch_array();
//jika akun berlevel peserta mengakses page admin
if ($level === "Karyawan"){
  echo "<script> document.location.href='../user/index'; </script>";
  // echo "<script> alert('anda tidak memiliki akses untuk halaman ini!');window.location= '../user/index';</script>";
}
?>
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.23
* @link https://tabler.io
* Copyright 2018-2021 The Tabler Authors
* Copyright 2018-2021 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="icon" href="../favicon.ico" type="image/x-icon"/>
  <title>Dashboard - SIBUMDES - Sistem Informasi Badan Usaha Milik Desa.</title>
  <!-- CSS files -->
  <link href="../assets/dist/css/tabler.min.css" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-flags.min.css" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-payments.min.css" rel="stylesheet" />
  <link href="../assets/dist/css/tabler-vendors.min.css" rel="stylesheet" />
  <link href="../assets/dist/css/demo.min.css" rel="stylesheet" />
</head>

<body class="antialiased">
  <div class="page">
    <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
          <a href=".">
            <img src="../img/logo.png" width="150" height="32" alt="Sibumdes" class="navbar-brand-image">
          </a>
        </h1>
        <?php include 'global_navigasi.php';?>