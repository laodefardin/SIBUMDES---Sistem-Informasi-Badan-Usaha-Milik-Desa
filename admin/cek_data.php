<?php
include '../koneksi.php';
$anggota = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from anggota where nama='$_GET[nama]'"));
$data_anggota = array('pinjaman_pokok'  	=>  $anggota['pinjaman_pokok'],
            'jasa'    		    =>  $anggota['jasa'],
            'totaljasa'    		=>  $anggota['totaljasa'],
            'totalbayar'    	=>  $anggota['totalbayar'],
            'id_anggota'        =>  $anggota['id_anggota']);

echo json_encode($data_anggota);