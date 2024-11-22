<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Form with Modal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .product-image,
    .payment-icon {
      width: 50px;
      height: 50px;
      background-color: #ddd;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 5px;
    }

    .quantity-control button {
      border: 1px solid #ccc;
      background-color: #f8f9fa;
      width: 30px;
      height: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 5px;
    }

    .pay-button {
      width: 100%;
      padding: 12px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
    }

    .pay-button:hover {
      background-color: #0056b3;
    }

    .back-button {
      font-size: 20px;
      cursor: pointer;
    }

    .total-price {
      font-weight: bold;
      font-size: 18px;
    }

    /* Blur effect when modal is open */
    .modal-backdrop-blur {
      backdrop-filter: blur(5px);
    }

    .summary-box {
      background-color: #eaf3ff;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <!-- Back Button -->
    <div class="mb-3">
      <span class="back-button">&larr;</span>
    </div>

    <!-- Payment Form -->
    <form id="paymentForm">
      <!-- Product Section -->
      <div class="card p-3">
        <div class="d-flex align-items-center">
          <div class="product-image"></div>
          <div class="ms-3 flex-grow-1">
            <h5 class="mb-0">Product Name</h5>
            <p class="mb-0 text-muted">Rp. 100,000.00</p>
            <input type="hidden" name="product_name" value="Product Name">
            <input type="hidden" name="product_price" value="100000">
          </div>
          <div class="quantity-control d-flex align-items-center">
            <button type="button" class="btn btn-sm" id="decrease-btn">-</button>
            <input
              type="text"
              id="quantity"
              name="quantity"
              class="form-control mx-2 text-center"
              value="1"
              style="width: 50px;"
              readonly />
            <button type="button" class="btn btn-sm" id="increase-btn">+</button>
          </div>
        </div>
      </div>

      <!-- Payment Method -->
      <div class="mt-4">
        <h6>Payment Method</h6>
        <div class="list-group">
          <label class="list-group-item d-flex align-items-center">
            <div class="payment-icon me-3"></div>
            ShopeePay **** 7690
            <input class="form-check-input ms-auto" type="radio" name="payment_method" value="ShopeePay" required>
          </label>
          <label class="list-group-item d-flex align-items-center">
            <div class="payment-icon me-3"></div>
            BCA **** 7690
            <input class="form-check-input ms-auto" type="radio" name="payment_method" value="BCA" required>
          </label>
          <label class="list-group-item d-flex align-items-center">
            <div class="payment-icon me-3"></div>
            Visa Classic **** 7690
            <input class="form-check-input ms-auto" type="radio" name="payment_method" value="Visa Classic" required>
          </label>
        </div>
      </div>

      <!-- Order Info -->
      <div class="d-flex justify-content-between mt-4">
        <span>Total Harga</span>
        <span class="total-price" id="total-price">Rp. 100,000.00</span>
        <input type="hidden" id="total-price-input" value="100000">
      </div>

      <!-- Pay Button -->
      <button type="button" class="pay-button mt-3" data-bs-toggle="modal" data-bs-target="#confirmationModal">Bayar</button>
    </form>
  </div>

  <!-- Confirmation Modal -->
  <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pembelian</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="summary-box">
            <p><strong>Product Name</strong>: <span id="summary-product-name"></span></p>
            <p><strong>Metode Pembayaran</strong>: <span id="summary-payment-method"></span></p>
          </div>
          <p>Total Harga: <strong>Rp <span id="summary-total-price"></span></strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary" form="paymentForm">Melanjutkan Pembayaran</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const quantityInput = document.getElementById("quantity");
    const totalPriceElement = document.getElementById("total-price");
    const totalPriceInput = document.getElementById("total-price-input");
    const decreaseBtn = document.getElementById("decrease-btn");
    const increaseBtn = document.getElementById("increase-btn");

    const summaryProductName = document.getElementById("summary-product-name");
    const summaryPaymentMethod = document.getElementById("summary-payment-method");
    const summaryTotalPrice = document.getElementById("summary-total-price");

    const pricePerItem = 100000; // Price per product

    function updateTotalPrice() {
      const quantity = parseInt(quantityInput.value);
      const totalPrice = quantity * pricePerItem;
      totalPriceElement.textContent = `Rp. ${totalPrice.toLocaleString("id-ID")}.00`;
      totalPriceInput.value = totalPrice;
    }

    decreaseBtn.addEventListener("click", () => {
      let quantity = parseInt(quantityInput.value);
      if (quantity > 1) {
        quantity--;
        quantityInput.value = quantity;
        updateTotalPrice();
      }
    });

    increaseBtn.addEventListener("click", () => {
      let quantity = parseInt(quantityInput.value);
      quantity++;
      quantityInput.value = quantity;
      updateTotalPrice();
    });

    document.querySelector(".pay-button").addEventListener("click", () => {
      summaryProductName.textContent = "Product Name";
      const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
      summaryPaymentMethod.textContent = selectedPaymentMethod ? selectedPaymentMethod.value : "Tidak dipilih";
      summaryTotalPrice.textContent = totalPriceInput.value.toLocaleString("id-ID");
    });
  </script>
</body>

</html>