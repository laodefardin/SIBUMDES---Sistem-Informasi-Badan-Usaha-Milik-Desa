<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];
$query = "SELECT * FROM permohonan_pinjaman WHERE id_perpinjaman = '$id'";
$sql = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($sql);
$email = $data['email'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('phpmailer/Exception.php');
include('phpmailer/PHPMailer.php');
include('phpmailer/SMTP.php');

$email_pengirim = 'laodemuhzulfardinsyah@gmail.com'; // Isikan dengan email pengirim
$nama_pengirim = 'Admin SIBUMDES - Sistem Informasi Badan Usaha Milik Desa BAJI PA MAI'; // Isikan dengan nama pengirim
$email_penerima = $email; // Ambil email penerima dari inputan form
$subjek = "Mohon maaf Permohonan Anda belum diterima"; // Ambil subjek dari inputan form
// $pesan = $_POST['pesan']; // Ambil pesan dari inputan form
$pesan = "Mohon Maaf Pengajuan Anda tidak dapat kami proses";
// $attachment = $_FILES['attachment']['name']; // Ambil nama file yang di upload

$mail = new PHPMailer;
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->Username = $email_pengirim; // Email Pengirim
$mail->Password = 'aootjwphtlzfpjhk'; // Isikan dengan Password email pengirim
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

$mail->setFrom($email_pengirim, $nama_pengirim);
$mail->addAddress($email_penerima, '');
$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

// Load file content.php
ob_start();
include "content.php";

$content = ob_get_contents(); // Ambil isi file content.php dan masukan ke variabel $content
ob_end_clean();

$mail->Subject = $subjek;
$mail->Body = $content;
$mail->AddEmbeddedImage('image/logo.png', 'logo_mynotescode', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email

if(empty($attachment)){ // Jika tanpa attachment
    $send = $mail->send();

    if($send){ // Jika Email berhasil dikirim
    $_SESSION['pesan'] = 'kirim di Email penerima';
    $update = "UPDATE permohonan_pinjaman SET validasi = 'Ditolak' WHERE id_perpinjaman = '".$id."' ";
    
    $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
            echo "<script> document.location.href='./permohonan-pinjaman';</script>";
    }else{ // Jika Email gagal dikirim
    $_SESSION['pesan'] = 'Gagal terkirim di Email penerima';
            echo "<script> document.location.href='./permohonan-pinjaman';</script>";
        // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
    }
}else{ // Jika dengan attachment
    $tmp = $_FILES['attachment']['tmp_name'];
    $size = $_FILES['attachment']['size'];

    if($size <= 25000000){ // Jika ukuran file <= 25 MB (25.000.000 bytes)
        $mail->addAttachment($tmp, $attachment); // Add file yang akan di kirim

        $send = $mail->send();

        if($send){ // Jika Email berhasil dikirim
            $_SESSION['pesan'] = 'Email berhasil dikirim';
            echo "<script> document.location.href='./permohonan-pinjaman';</script>";
        }else{ // Jika Email gagal dikirim
            $_SESSION['pesan'] = 'Email gagal dikirim';
            echo "<script> document.location.href='./permohonan-pinjaman';</script>";
            // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
        }
    }else{ // Jika Ukuran file lebih dari 25 MB
        echo "<h1>Ukuran file attachment maksimal 25 MB</h1><br /><a href='index.php'>Kembali ke Form</a>";
    }
}
?>