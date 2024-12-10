<?php
session_start();
$hostname   = "localhost"; //hostname
$username   = "root";      //username untuk login ke mysql 123
$password   = "";          //password untuk login ke mysql 456
$database   = "titipin";          //nama database

$konek = new mysqli($hostname, $username, $password, $database);
if ($konek->connect_error) {
  // jika terjadi error, matikan proses dengan die() atau exit();
  die('Maaf koneksi gagal: ' . $connect->connect_error);
}

// Fungsi untuk menambahkan produk ke keranjang
if (isset($_POST['add_to_cart'])) {
  $product_id = $_POST['add_to_cart']; // Mengambil ID produk dari input hidden
  $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;

  // Query untuk mengambil data produk berdasarkan ID
  $query = mysqli_query($konek, "SELECT * FROM produk WHERE id = $product_id");
  $product = mysqli_fetch_array($query);

  // Cek apakah produk sudah ada di keranjang
  if (isset($_SESSION['cart'][$product_id])) {
    // Jika produk sudah ada, tambah jumlahnya
    $_SESSION['cart'][$product_id]['quantity'] += $quantity;
  } else {
    // Jika produk belum ada, tambahkan ke keranjang
    $_SESSION['cart'][$product_id] = [
      'name' => $product['namaproduk'],
      'price' => $product['hargaproduk'],
      'quantity' => $quantity
    ];
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forum</title>
  <link rel="stylesheet" href="CSS/footer.css">
  <!-- Bootstrap -->
  <!-- Tambahkan di <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <?php
  $kategori = "kosong";
  if (!isset($_GET['kategori'])) {
  } else {
    $kategori = $_GET['kategori'];
  }
  ?>

  <?php
  if ($kategori == "kosong") {
  ?>
    <div style="display: flex; margin-top: 50px; margin-left: 20px;">
      <div style="background-color: black; height: 98px; width: 98px;">

      </div>

      <div style="display: flex; gap: 50px; margin-left: 100px;">

        <a href="Belanja.php?kategori=Food" style="text-decoration: none;">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Shirt">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Bag">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Shoes">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

      </div>

    </div>
  <?php
  } else if ($kategori == "Food") {
  ?>

    <div style="display: flex; margin-top: 50px; margin-left: 20px;">
      <div style="background-color: black; height: 98px; width: 98px;">

      </div>

      <div style="display: flex; gap: 50px; margin-left: 100px;">

        <a href="Belanja.php?kategori=Food" style="text-decoration: none;">
          <div
            style="background-color: #4A628A; height: 98px; width: 256px; border-radius: 10px; align-items: center; display: flex;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Shirt">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Bag">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Shoes">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

      </div>

    </div>

  <?php
  } else if ($kategori == "Shirt") {
  ?>

    <div style="display: flex; margin-top: 50px; margin-left: 20px;">
      <div style="background-color: black; height: 98px; width: 98px;">

      </div>

      <div style="display: flex; gap: 50px; margin-left: 100px;">

        <a href="Belanja.php?kategori=Food" style="text-decoration: none;">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Shirt">
          <div style="background-color: #4A628A; height: 98px; width: 256px; border-radius: 10px; align-items: center; display: flex;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Bag">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Shoes">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

      </div>

    </div>

  <?php
  } else if ($kategori == "Bag") {
  ?>

    <div style="display: flex; margin-top: 50px; margin-left: 20px;">
      <div style="background-color: black; height: 98px; width: 98px;">

      </div>

      <div style="display: flex; gap: 50px; margin-left: 100px;">

        <a href="Belanja.php?kategori=Food" style="text-decoration: none;">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Shirt">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Bag">
          <div style="background-color: #4A628A; height: 98px; width: 256px; border-radius: 10px; align-items: center; display: flex;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Shoes">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

      </div>

    </div>

  <?php
  } else if ($kategori == "Shoes") {
  ?>

    <div style="display: flex; margin-top: 50px; margin-left: 20px;">
      <div style="background-color: black; height: 98px; width: 98px;">

      </div>

      <div style="display: flex; gap: 50px; margin-left: 100px;">

        <a href="Belanja.php?kategori=Food" style="text-decoration: none;">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Shirt">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Bag">
          <div style="background-color: #B9E5E8; height: 98px; width: 256px; border-radius: 10px;">

          </div>
        </a>

        <a href="Belanja.php?kategori=Shoes">
          <div style="background-color: #4A628A; height: 98px; width: 256px; border-radius: 10px; align-items: center; display: flex;">

          </div>
        </a>

      </div>

    </div>

  <?php
  }
  ?>


  <?php
  if ($kategori == "Food") {
  ?>
    <img src="Gambar/chiki.png" alt="" style="height: 340px; margin-left: 180px; margin-top: 50px;">
  <?php
  } else if ($kategori == "Bag") {
  ?>
    <img src="Gambar/tas.png" alt="" style="height: 340px; margin-left: 180px; margin-top: 50px;">
  <?php
  } else if ($kategori == "Shirt") {
  ?>
    <img src="Gambar/baju.png" alt="" style="height: 340px; margin-left: 180px; margin-top: 50px;">
  <?php
  } else if ($kategori == "Shoes") {
  ?>
    <img src="Gambar/spatu.png" alt="" style="height: 340px; margin-left: 180px; margin-top: 50px;">
  <?php
  } else {
  ?>
    <img src="Gambar/all.png" alt="" style="height: 340px; margin-left: 180px; margin-top: 50px;">
  <?php
  }
  ?>

  <p style="margin-left: 180px; font-size: 20px; margin-top: 10px;">Best Deal For You!</p>
  <!-- hallo1 -->
  <div style="display: flex; gap: 25px; margin-left: 170px;">
    <?php
    $i = 4;
    if ($kategori == 'Food' || $kategori == 'Bag' || $kategori == 'Shirt' || $kategori == 'Shoes') {
      $query = mysqli_query($konek, "SELECT * FROM produk WHERE kategoriproduk = '$kategori'");
    } else {
      $query = mysqli_query($konek, "SELECT * FROM produk");
    }
    while ($data = mysqli_fetch_array($query)) { ?>
      <div style="height: 400px; width: 300px;">
        <div style="width: 300px; height: 200px; background-color: #4A628A;"></div>
        <div style="padding-top: 10px;">
          <h1 style="font-size: 22px;"><?= $data['namaproduk']; ?></h1>
          <p style="font-size: large;">Rp. <?= number_format($data['hargaproduk'], 0, ',', '.'); ?></p>
          <p style="font-size: 12px;"><?= $data['deskripsiproduk']; ?></p>

          <!-- Formulir untuk menambahkan produk ke keranjang -->
          <form method="POST" action="Pembayaran.php" id="cartForm<?= $data['id']; ?>">
            <input type="hidden" name="add_to_cart" value="<?= $data['id']; ?>">
            <input type="hidden" name="kategori" value="<?= $kategori ?>">
            <input type="hidden" name="quantity" value="1">
            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#confirmationModal" onclick="setModalData(<?= $data['id']; ?>, '<?= $data['namaproduk']; ?>', '<?= number_format($data['hargaproduk'], 0, ',', '.'); ?>')">Add to Cart</button>
          </form>
        </div>
      </div>
    <?php } ?>
  </div>

  <!-- Modal Konfirmasi -->
  <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pembelian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action=""id="cartForm<?= $data['id']; ?>">
                <div class="modal-body">
                    <p><strong>Nama Produk:</strong> <span id="modal-product-name"></span></p>
                    <p><strong>Harga:</strong> Rp. <span id="modal-product-price"></span></p>
                    <input type="hidden" name="add_to_cart" id="modal-product-id">
                    <input type="hidden" name="quantity" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="cartForm" id="confirm-add-to-cart">Tambahkan ke Keranjang</button>
                    </div>
            </form>
        </div>
    </div>
</div>


    <script>
        // Fungsi untuk mengisi data ke modal konfirmasi
        function setModalData(productId, productName, productPrice) {
            document.getElementById('modal-product-name').textContent = productName;
            document.getElementById('modal-product-price').textContent = productPrice;
            document.getElementById('modal-product-id').value = productId;
        }
    </script>



  <!-- <footer style="background-color: #4A628A; height: 250px; margin-top: 100px;">

  </footer> -->

  <footer style="background-color: #4A628A; margin-top: 100px;">
    <div class=" footer-container">
      <div class="footer-section">
        <h4>About Us</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="footer-section">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Shop</a></li>
          <!-- <li><a href="#">Contact</a></li> -->
          <li><a href="#">About</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h4>Contact US</h4>
        <!-- <ul class="social-links"> -->
        <ul>
          <li><a href="#">info@titipin</a></li>
          <li><a href="#">+011 2 345 678</a></li>
          <!-- <li><a href="#">Twitter</a></li> -->
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2024 Titipin. All rights reserved.</p>
    </div>
  </footer>

  <script>
    // Fungsi untuk mengisi data ke modal konfirmasi
    function setModalData(productId, productName, productPrice) {
      document.getElementById('modal-product-name').textContent = productName;
      document.getElementById('modal-product-price').textContent = productPrice;

      // Set form action dan id untuk masing-masing produk
      const form = document.getElementById('cartForm' + productId);
      document.getElementById('confirm-add-to-cart').onclick = function() {
        form.submit();
      };
    }
  </script>
</body>

</html>