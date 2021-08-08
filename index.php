<?php 
$halaman = 'index';
include 'global_header.php'; 
include 'global_navigasi.php';
include 'koneksi.php';
?>
<div class="content">
  <div class="container-xl">
    <!-- Page title -->
    <div class="page-header text-white d-print-none">
      <div class="row align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Dashboard
          </div>
          <h2 class="page-title">
            SIBUMDES - Sistem Informasi Badan Usaha Milik Desa BAJI PA'MAI.
          </h2>
        </div>
      </div>
    </div>
    <div class="row row-deck row-cards">
      <div class="card">
        <div class="card-body">
          <div id="carousel-indicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
              <?php

        $count = $koneksi->query("SELECT COUNT(*) FROM slide") or die(mysqli_error());
        $count = mysqli_num_rows($count);
      
        $no = 0;
        for($no;$no<3;$no++){
          ?>
              <li data-bs-target="#carousel-indicators" data-bs-slide-to="<?php echo $no ?>"
                class="<?php if($no == 0){echo 'active';}else{echo 'notactive';}?>"></li>
              <?php 
        }
        ?>
            </ol>
            <div class="carousel-inner">
              <?php
        $sql = $koneksi->query("SELECT * FROM slide ORDER BY active DESC");
        while ($row = mysqli_fetch_assoc($sql)) {
          echo '
          <div class="carousel-item '; if($row['active'] == 1){ echo 'active'; } echo '">
          <img class="d-block w-100" src="./admin/img/slide/'.$row['gambar'].'" />
          <div class="carousel-caption">
          </div>
          </div>';
        }
        ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
           #informasi #headline
          </div>
          <h2 class="page-title">
            Informasi Kegiatan Terbaru
          </h2>
        </div>
      </div>

              <div class="row row-cards">
            <?php
            $page = (isset($_GET['page']))? $_GET['page'] : 1;
            $limit = 6;
            $limit_start = ($page - 1) * $limit;
            $sql = mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY tanggal DESC LIMIT ".$limit_start.",".$limit);
            $no = $limit_start + 1;
            foreach ($sql as $data): ?>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <a href="kegiatan_view?id=<?= $data['id_kegiatan']; ?>" class="d-block"><img
                            src="./admin/img/kegiatan/<?= $data['gambar']; ?>" style="height: 250px;"
                            class="card-img-top"></a>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <div style="font-weight: 700;"><a style="color:#000;" href="kegiatan_view?id=<?= $data['id_kegiatan']; ?>"><?= $data['judul']; ?></a> </div>
                                <div class="text-muted"><?= $data['tanggal']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $no++; endforeach; ?>
            <div class="d-flex">
                <ul class="pagination ms-auto">
                    <?php if($page == 1){ ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="15 6 9 12 15 18" /></svg>
                            prev
                        </a>
                    </li>
                    <?php }else{ $link_prev = ($page > 1)? $page - 1 : 1;?>
                    <li class="page-item disabled">
                        <a class="page-link" href="kegiatan?page=<?php echo $link_prev; ?>" tabindex="-1"
                            aria-disabled="true">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="15 6 9 12 15 18" /></svg>
                            prev
                        </a>
                    </li>

                    <?php }?>

                    <?php 
            $sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM kegiatan");
            $get_jumlah = mysqli_fetch_array($sql2);

            $jumlah_page = ceil($get_jumlah['jumlah'] / $limit);
            $jumlah_number = 3;
            $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
            $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;

            for($i = $start_number; $i <= $end_number; $i++){
            $link_active = ($page == $i)? ' active' : '';
            ?>
                    <li class="page-item <?php echo $link_active; ?>"><a class="page-link"
                            href="kegiatan?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>

                    <?php if ($page == $jumlah_page) { ?>

                    <li class="page-item">
                        <a class="page-link" href="kegiatan?page=<?php echo $link_next; ?>">
                            next <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="9 6 15 12 9 18" /></svg>
                        </a>
                    </li>
                    <?php }else{
            $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
            ?>
                    <li class="page-item">
                        <a class="page-link" href="kegiatan?page=<?php echo $jumlah_page; ?>">
                            next <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="9 6 15 12 9 18" /></svg>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
          

  </div>

  <?php include 'global_footer.php'; ?>