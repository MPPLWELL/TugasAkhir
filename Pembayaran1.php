<?php
session_start();
$hostname   = "localhost"; //hostname
$username   = "root";      //username untuk login ke mysql
$password   = "";          //password untuk login ke mysql
$database   = "titipin";   //nama database

$konek = new mysqli($hostname, $username, $password, $database);
if ($konek->connect_error) {
    die('Maaf koneksi gagal: ' . $konek->connect_error);
}

// Menambahkan produk ke keranjang
if (isset($_POST['add_to_cart'])) {
    $product_id = intval($_POST['add_to_cart']); // Mengamankan input
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    // Gunakan prepared statement untuk keamanan
    $stmt = $konek->prepare("SELECT * FROM produk WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    // Menambahkan ke keranjang
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = [
            'name' => $product['namaproduk'],
            'price' => $product['hargaproduk'],
            'quantity' => $quantity
        ];
    }
}

// Menghitung total harga keranjang
$total_price = 0;
foreach ($_SESSION['cart'] as $product) {
    $total_price += $product['price'] * $product['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Kembali -->
        <div class="mb-3">
            <a href="Belanja.php" class="btn btn-outline-secondary">&larr; Kembali</a>
        </div>

        <!-- Form Keranjang -->
        <form id="paymentForm">
            <div class="card p-3">
                <?php foreach ($_SESSION['cart'] as $product_id => $product): ?>
                <div class="d-flex align-items-center" id="product-<?= $product_id ?>" data-product-id="<?= $product_id ?>">
                    <div class="product-image me-3" style="width: 50px; height: 50px; background-color: #ddd;"></div>
                    <div class="flex-grow-1">
                        <h5 class="mb-0"><?= $product['name'] ?></h5>
                        <p class="mb-0 text-muted">Rp. <?= number_format($product['price'], 0, ',', '.') ?></p>
                        <input type="hidden" name="product_name[]" value="<?= $product['name'] ?>">
                        <input type="hidden" name="product_price[]" value="<?= $product['price'] ?>">
                    </div>
                    <div class="quantity-control d-flex align-items-center">
                        <button type="button" class="btn btn-sm btn-outline-secondary decrease-btn" data-id="<?= $product_id ?>">-</button>
                        <input type="text" id="quantity-<?= $product_id ?>" class="form-control text-center mx-2" value="<?= $product['quantity'] ?>" style="width: 50px;">
                        <button type="button" class="btn btn-sm btn-outline-secondary increase-btn" data-id="<?= $product_id ?>">+</button>
                    </div>
                </div>
                <hr>
                <?php endforeach; ?>
            </div>

            <!-- Total Harga -->
            <div class="d-flex justify-content-between align-items-center mt-3">
                <span>Total Harga:</span>
                <span id="total-price">Rp. <?= number_format($total_price, 0, ',', '.') ?></span>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mt-4">
                <h6>Metode Pembayaran</h6>
                <div class="list-group">
                    <label class="list-group-item">
                        <input type="radio" name="payment_method" value="ShopeePay" required>
                        ShopeePay
                    </label>
                    <label class="list-group-item">
                        <input type="radio" name="payment_method" value="BCA" required>
                        BCA
                    </label>
                    <label class="list-group-item">
                        <input type="radio" name="payment_method" value="Visa" required>
                        Visa
                    </label>
                </div>
            </div>

            <!-- Tombol Bayar -->
            <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#confirmationModal">Bayar</button>
        </form>
    </div>

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Pembelian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Metode Pembayaran: <span id="selected-payment"></span></p>
                    <p>Total Harga: <strong id="modal-total-price"></strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary" form="paymentForm">Lanjutkan Pembayaran</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi untuk menghitung total harga
        function updateTotalPrice() {
            let totalPrice = 0;
            document.querySelectorAll('.quantity-control').forEach(control => {
                const quantity = parseInt(control.querySelector('input').value);
                const price = parseInt(control.closest('.d-flex').querySelector('.product-image').getAttribute('data-price'));
                totalPrice += quantity * price;
            });
            document.getElementById('total-price').textContent = `Rp. ${totalPrice.toLocaleString('id-ID')}`;
        }

        // Event listener untuk tombol +/- kuantitas
        document.querySelectorAll('.increase-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const productId = btn.getAttribute('data-id');
                const quantityInput = document.getElementById(`quantity-${productId}`);
                quantityInput.value = parseInt(quantityInput.value) + 1;
                updateTotalPrice();
            });
        });

        document.querySelectorAll('.decrease-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const productId = btn.getAttribute('data-id');
                const quantityInput = document.getElementById(`quantity-${productId}`);
                if (quantityInput.value > 1) {
                    quantityInput.value = parseInt(quantityInput.value) - 1;
                    updateTotalPrice();
                }
            });
        });

        // Menampilkan data pada modal
        document.querySelector('.btn-primary').addEventListener('click', () => {
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            const totalPrice = document.getElementById('total-price').textContent;
            document.getElementById('selected-payment').textContent = paymentMethod;
            document.getElementById('modal-total-price').textContent = totalPrice;
        });
    </script>
</body>

</html>
