<?php
session_start();
$hostname   = "localhost";
$username   = "root";
$password   = "";
$database   = "titipin";

$konek = new mysqli($hostname, $username, $password, $database);
if ($konek->connect_error) {
    die('Maaf koneksi gagal: ' . $konek->connect_error);
}

// Menambahkan produk ke keranjang
if (isset($_POST['add_to_cart'])) {
    $product_id = intval($_POST['add_to_cart']);
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    $stmt = $konek->prepare("SELECT * FROM produk WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

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

// Menghapus produk dari keranjang
if (isset($_POST['remove_from_cart'])) {
    $product_id = intval($_POST['remove_from_cart']);
    unset($_SESSION['cart'][$product_id]);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
                <?php foreach ($_SESSION['cart'] as $product_id => $product) { ?>
                <div class="d-flex align-items-center" data-product-id="<?= $product_id ?>" data-price="<?= $product['price'] ?>">
                    <div class="product-image me-3" style="width: 50px; height: 50px; background-color: #ddd;"></div>
                    <div class="flex-grow-1">
                        <h5 class="mb-0"><?= $product['name']; ?></h5>
                        <p class="mb-0 text-muted">Rp. <?= number_format($product['price'], 0, ',', '.'); ?></p>
                    </div>
                    <div class="quantity-control d-flex align-items-center">
                        <button type="button" class="btn btn-sm btn-outline-secondary decrease-btn" id="decrease-btn-<?= $product_id ?>">-</button>
                        <input type="text" id="quantity-<?= $product_id ?>" name="quantity" class="form-control mx-2 text-center" value="<?= $product['quantity']; ?>" style="width: 50px;" />
                        <button type="button" class="btn btn-sm btn-outline-secondary increase-btn" id="increase-btn-<?= $product_id ?>">+</button>
                        <button type="button" class="btn btn-sm btn-outline-danger ms-2 remove-btn" data-bs-toggle="modal" data-bs-target="#removeModal" data-id="<?= $product_id ?>"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
                <hr>
                <?php } ?>
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

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus produk ini dari keranjang?</p>
                        <input type="hidden" name="remove_from_cart" id="remove-product-id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Pembayaran -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Pembelian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
        function updateTotalPrice() {
            let totalPrice = 0;
            document.querySelectorAll("[data-product-id]").forEach((productContainer) => {
                const quantityInput = productContainer.querySelector("input");
                const price = parseInt(productContainer.dataset.price) || 0;
                const quantity = parseInt(quantityInput.value) || 0;
                totalPrice += price * quantity;
            });
            document.getElementById("total-price").textContent = `Rp. ${totalPrice.toLocaleString("id-ID")}`;
        }

        document.querySelectorAll(".decrease-btn").forEach((btn) => {
            btn.addEventListener("click", () => {
                const productContainer = btn.closest("[data-product-id]");
                const quantityInput = productContainer.querySelector("input");
                let quantity = parseInt(quantityInput.value) || 1;
                if (quantity > 1) {
                    quantityInput.value = --quantity;
                    updateTotalPrice();
                }
            });
        });

        document.querySelectorAll(".increase-btn").forEach((btn) => {
            btn.addEventListener("click", () => {
                const productContainer = btn.closest("[data-product-id]");
                const quantityInput = productContainer.querySelector("input");
                let quantity = parseInt(quantityInput.value) || 0;
                quantityInput.value = ++quantity;
                updateTotalPrice();
            });
        });

        document.querySelector(".btn-primary").addEventListener("click", () => {
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            const totalPrice = document.getElementById("total-price").textContent;
            document.getElementById("selected-payment").textContent = paymentMethod;
            document.getElementById("modal-total-price").textContent = totalPrice;
        });

        document.querySelectorAll(".remove-btn").forEach((btn) => {
            btn.addEventListener("click", () => {
                const productId = btn.dataset.id;
                document.getElementById("remove-product-id").value = productId;
            });
        });
    </script>
</body>

</html>
