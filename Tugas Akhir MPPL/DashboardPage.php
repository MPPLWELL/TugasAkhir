<?php
session_start();

$hostname   = "localhost"; //hostname
$username   = "root";      //username untuk login ke mysql
$password   = "";          //password untuk login ke mysql
$database   = "titipin";          //nama database

$konek=new mysqli($hostname,$username,$password, $database);
if ($konek->connect_error) 
{
 // jika terjadi error, matikan proses dengan die() atau exit();
  die('Maaf koneksi gagal: '. $connect->connect_error);
} 

session_start();
if(empty($_SESSION['email']))
{
header("location:LoginPage.php?pesan=belum_login");
}

// untuk mengambil nama

$id = $_GET['id'];

$query=mysqli_query($konek,"select * from akun where
id='$id'");
while($data=mysqli_fetch_array($query)){
    $nama = $data['Username'];
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forum</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #4A628A;">
    <div class="container-fluid">
      <!-- Menggunakan container-fluid untuk lebar penuh -->
      <a class="navbar-brand text-white fw-bold fs-4" href="#">Titipin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="btn-group ms-auto">
          <!-- Menggunakan ms-auto untuk memindahkan ke kanan -->
          <button type="button"
            style="height: 40px; width:210px; padding: 1px; border: 5px #EEE0C9; border-radius:10px; background-color:#4A628A; color:#F3EEEA;">
            <span style="font-size: 15pt; margin-right: 5px;">User X</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
              class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
              <path fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <div class="container-fluid mt-2 pt-5">
    <!-- Menggunakan container-fluid untuk lebar penuh -->
    <div class="row">
      <!-- Kolom 1: Dashboard dan daftar negara -->
      <div class="col-2 ps-0 pt-4" style="background-color: #001C30; color: white; height:102vh;">
        <!-- Menambahkan background color dan warna teks -->
        <h5>Dashboard</h5>
        <ul class="list-unstyled">
          <li>
            <img src="gambar/Malaysia.png" alt="Bendera Negara 1" width="30"> Malaysia
          </li>
          <li>
            <img src="gambar/Thailand.png" alt="Bendera Negara 2" width="30"> Thailand
          </li>
          <li>
            <img src="gambar/Singapore.png" alt="Bendera Negara 3" width="30"> Singapore
          </li>
          <li>
            <img src="gambar/KoreaSelatan.png" alt="Bendera Negara 3" width="30"> Korea Selatan
          </li>
          <li>
            <img src="gambar/Australia.png" alt="Bendera Negara 3" width="30"> Australia
          </li>
          <!-- Tambahkan lebih banyak negara sesuai kebutuhan -->
        </ul>
      </div>

      <!-- Kolom 2: Selamat datang -->
      <div class="col-10 pt-4 px-5">
        <div class="d-flex align-items-center p-3" style="background-color: #7AB2D3;">
          <!-- Flexbox dengan hanya center alignment secara vertikal -->
          <div class="me-auto ps-5 pb-4">
            <!-- Margin kanan otomatis untuk mendorong gambar ke kanan -->
            <h2 class="fs-3 text-white">Welcome Back <?= $nama; ?></h2>
            <h5 class="pt-2 fs-6 text-white-50">Mari pakai JastipIn untuk kemudahan berbelanja lintas Negara</h5>
          </div>
          <img src="Gambar/Group 1.png" alt="" style="width: 8rem; margin-left: 20px;"> <!-- Gambar di sebelah kanan -->
        </div>

        <!-- Kartu di bawah -->
        <div class="row mt-4">
          <!-- Tambahkan margin atas untuk jarak -->
          <div class="col-md-3 mb-4">
            <!-- Ukuran kartu 3 per 12 -->

            <a href="" style="text-decoration : none">

              <div class="card h-100" style="background-color: #B9E5E8;">
                <!-- Kartu dengan tinggi 100% -->
                <div class="d-flex align-items-center p-3">
                  <!-- Flexbox untuk gambar dan teks berdampingan -->
                  <img src="gambar/Malaysia.png" alt="food" class="me-3" style="width: 50px;"> <!-- Gambar negara -->
                  <h5 class="card-title">Malaysia</h5> <!-- Nama negara -->
                </div>
              </div>

            </a>

          </div>
          <div class="col-md-3 mb-4">
            <!-- Ukuran kartu 3 per 12 -->

            <a href="" style="text-decoration : none">

              <div class="card h-100" style="background-color: #B9E5E8;">
                <div class="d-flex align-items-center p-3">
                  <!-- Flexbox untuk gambar dan teks berdampingan -->
                  <img src="gambar/Thailand.png" alt="Shirt" class="me-3" style="width: 50px;"> <!-- Gambar negara -->
                  <h5 class="card-title">Thailand</h5> <!-- Nama negara -->
                </div>
              </div>

            </a>

          </div>
          <div class="col-md-3 mb-4">
            <!-- Ukuran kartu 3 per 12 -->

            <a href="" style="text-decoration : none">

              <div class="card h-100" style="background-color: #B9E5E8;">
                <div class="d-flex align-items-center p-3">
                  <!-- Flexbox untuk gambar dan teks berdampingan -->
                  <img src="gambar/Singapore.png" alt="Bag" class="me-3" style="width: 50px;"> <!-- Gambar negara -->
                  <h5 class="card-title">Singapore</h5> <!-- Nama negara -->
                </div>
              </div>

            </a>

          </div>
          <div class="col-md-3 mb-4">
            <!-- Ukuran kartu 3 per 12 -->

            <a href="" style="text-decoration : none">

              <div class="card h-100" style="background-color: #B9E5E8;">
                <div class="d-flex align-items-center p-3">
                  <!-- Flexbox untuk gambar dan teks berdampingan -->
                  <img src="gambar/KoreaSelatan.png" alt="Shoes" class="me-3" style="width: 50px;">
                  <!-- Gambar negara -->
                  <h5 class="card-title">Korea Selatan</h5> <!-- Nama negara -->
                </div>
              </div>

            </a>

          </div>
        </div>
        <!-- Kartu -->

        <!-- Kolom Berita dan Notifikasi -->
        <div class="row mt-4">
          <div class="col-md-9">
            <!-- Kolom 3/4 untuk berita -->
            <h5>Berita dan Informasi</h5>
            <div
              style="max-height: 300px; overflow-y: auto; background-color: #f8f9fa; border: 1px solid #ced4da; padding: 10px;">
              <?php
              $query=mysqli_query($konek,"select * from paketinformasi");
              while($data=mysqli_fetch_array($query))
              {
                ?>
              <p><?= $data['informasi'] ?></p>
              <p style="margin-top: -30px;"><br> Nama paket : <?= $data['namapaket'] ?><br> Jumlah paket :
                <?= $data['jumlahpaket'] ?><br> Id supir : <?= $data['idsupir'] ?><br> Kode pengiriman :
                <?= $data['kodepengirimanbarang'] ?><br> Tanggal : <?= $data['tanggal'] ?> <br><a href=""
                  style="text-decoration: none;">Lihat detail pengiriman</a></p>
              <!-- Tambahkan lebih banyak berita sesuai kebutuhan -->
              <?php
              }
              ?>
            </div>
          </div>

          <div class="col-md-3" style="border: #001C30;">
            <!-- Kolom 1/4 untuk notifikasi -->
            <h5>Notifikasi</h5>

            <div style="max-height: 300px; overflow-y: auto;">
              <?php
              $query=mysqli_query($konek,"select * from paketinformasi where notif ='1'");
              while($data=mysqli_fetch_array($query))
              {
                ?>
              <div class="card mb-2">
                <div class="card-body">
                  <h6 class="card-title" style="margin-top : 5px"><?= $data['namapaket'] ?></h6>
                  <p class="card-text"><?= $data['informasi'] ?></p>

                  <div style="margin-top : -10px">
                    <a href="" style="text-decoration : none;">Detail</a>
                  </div>

                  <?php $id = $_GET['id'] ?>

                  <a href="hapusnotifikasi.php?id=<?= $data['id']?>&idakun=<?= $id ?>">
                    <button type="button" class="btn btn-outline-info"
                      style="color : #146C94; margin-left : 180px; border-color: #146C94;">Read</button>
                  </a>

                </div>
              </div>
              <?php 
              }
              ?>
              <!-- Tambahkan lebih banyak notifikasi sesuai kebutuhan -->
            </div>
            <button type="button" class="btn btn-outline-info" style="color : #146C94; border-color: #146C94;">Read
              All</button>
          </div>
        </div>
        <!-- Kolom Berita dan Notifikasi -->


      </div>
      <!-- Kolom 2 -->
    </div>
  </div>

  <!-- Javascript -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>