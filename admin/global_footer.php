        <footer class="footer footer-transparent d-print-none">
          <div class="container">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2021
                    <a href="." class="link-secondary">SIBUMDES - Sistem Informasi Badan Usaha Milik Desa.</a>
                    All rights reserved.
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
        </div>
        </div>
        <!-- Libs JS -->
        <script src="./assets/jquery.min.js"></script>
        <!-- <script src="./assets/jquery/jquery.min.js"></script> -->

        <script src="../assets/dist/libs/apexcharts/dist/apexcharts.min.js"></script>

        <script src="./assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="./assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="./assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

        <!-- Tabler Core -->
        <script src="../assets/dist/js/tabler.min.js"></script>

        <script src="./assets/ckeditor/ckeditor.js"></script>
        <script src="./assets/sweetalert/sweetalert2.all.min.js"></script>
        <script src="./assets/myscript.js"></script>
        <script src="./assets/my.js"></script>
        <script>
          $(function () {
            $("#example1").DataTable({
              "responsive": true,
              "autoWidth": false,
            });
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });
        </script>
        <script type="text/javascript">
          function cek_database() {
            var nama = $("#nama").val();
            $.ajax({
              url: 'cek_data.php',
              data: "nama=" + nama,
            }).success(function (data) {
              var json = data,
                obj = JSON.parse(json);
              $('#pinjaman_pokok').val(obj.pinjaman_pokok);
              $('#jasa').val(obj.jasa);
              $('#totaljasa').val(obj.totaljasa);
              $('#totalbayar').val(obj.totalbayar);
              $('#id_anggota').val(obj.id_anggota);
            });
          }

          

          function sum() {
            var sdhjasa = document.getElementById('sdhjasa').value;
            var sdhpokok = document.getElementById('sdhpokok').value;
            var resjasa = sdhjasa.replace(".", "");
            var respokok = sdhpokok.replace(".", "");
            var result = parseInt(resjasa) + parseInt(respokok);
            if (!isNaN(result)) {
              document.getElementById('jumlah').value = result;
            }
          }

          function sisa() {
            var pinjaman_pokok = document.getElementById('pinjaman_pokok').value;
            var sdhpokok = document.getElementById('sdhpokok').value;
            var respokok = sdhpokok.replace(".", "");
            var result = parseInt(pinjaman_pokok) - parseInt(respokok);
            if (!isNaN(result)) {
              document.getElementById('sisapokok').value = result;
            }
          }

          function sisa1() {
            var totaljasa = document.getElementById('totaljasa').value;
            var sdhjasa = document.getElementById('sdhjasa').value;
            var resjasa = sdhjasa.replace(".", "");
            var result = parseInt(totaljasa) - parseInt(resjasa);
            if (!isNaN(result)) {
              document.getElementById('sisajasa').value = result;
            }
          }

          function sisa2() {
            var sisapokok = document.getElementById('sisapokok').value;
            var sisajasa = document.getElementById('sisajasa').value;
            var result = parseInt(sisapokok) + parseInt(sisajasa);
            if (!isNaN(result)) {
              document.getElementById('jumlahsisa').value = result;
            }
          }
        </script>
        </body>

        </html>