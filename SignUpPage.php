<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body style="background-color: #B9E5E8;">

  <!-- Hero -->
  <div class="container-fluid vh-100">
    <div class="row h-100">
      <!-- Kolom Gambar -->
      <div class="col-4 d-flex justify-content-center align-items-center" style="background-color: #7AB2D3;">
        <img src="Gambar/group 1.png" alt="Gambar Tampilan Awal" style="width: 23rem;">
      </div>

      <!-- Kolom Form -->
      <div class="col-8 d-flex align-items-center justify-content-center" style="background-color: #B9E5E8;">
        <div>
          <!-- Form -->
          <form method="POST" action="inputakun.php" class="align-items-center justify-content-center" style="width: 75vh;">
            <!-- Teks "Login" -->
            <div class="d-flex align-items-center justify-content-center my-4">
              <p class="text-center text-black fs-2 fw-bold mx-3 mb-0">Register</p>
            </div>

            <!-- Divider -->
            <hr class="my-4" style="border-top: 2px solid #4A628A;">
            
            <!-- Email input with larger icon -->
            <div class="input-group mb-4 mt-3">
              <span class="input-group-text text-white" style="font-size: 1.8rem; background-color:#4A628A; border-color: #4A628A;">
                <i class="bi bi-person-circle"></i>
              </span>
              <input type="text" name="email" id="email" style="background-color:#B9E5E8; color: #6c757d; border-color: #4A628A;" class="form-control form-control-lg" placeholder="Username / Email" />
            </div>

            <!-- Password input with larger icon -->
            <div class="input-group mb-3">
              <span class="input-group-text text-white" style="font-size: 1.8rem; background-color:#4A628A;">
                <i class="bi bi-lock"></i>
              </span>
              <input type="password" name="pass" id="password" style="background-color:#B9E5E8; color: #6c757d; border-color: #4A628A;" class="form-control form-control-lg" placeholder="Password" />
            </div>
            
            <?php
            $pesan = $_GET['pesan'];
              if ($pesan == "Passwordincorrect") {
            ?>
            <p style="color: red;">
              Password berbeda
            </p>

            <?php 
            } else {}
            ?>

            <div class="input-group mb-3">
              <span class="input-group-text text-white" style="font-size: 1.8rem; background-color:#4A628A;">
                <i class="bi bi-lock"></i>
              </span>
              <input type="password" name="passcek" id="password" style="background-color:#B9E5E8; color: #6c757d; border-color: #4A628A;" class="form-control form-control-lg" placeholder="Password" />
            </div>

            <!-- Full-width Login Button -->
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-lg w-100" style="background-color: #3B4E6E; color:aliceblue;">Submit</button>
            </div>
            <h5 class="fs-6 fw-light mt-3 d-flex align-items-center justify-content-center ">
              Udah ada akun kah maniez?</h5>
            <h5 class="fs-6 fw-light mt-1 d-flex align-items-center justify-content-center ">
              <a href="LoginPage.php" class="text-decoration-none" style="color: red;">
                yuk Dipake akunnya good loocking people
              </a>
            </h5>
          </form>
          <!-- Form End -->
        </div>
      </div>

      <!-- Kolom Form End -->
    </div>
  </div>
  <!-- Hero End -->

  <!-- JS Auto Type -->
  <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
  <script>
    var typed = new Typed(".auto-type", {
      strings: ["Jasa Titip Internasional", "Belanja Global Mudah", "Belanja di Titipin Sekarang!"],
      typeSpeed: 40,
      backSpeed: 20,
      loop: true
    });
  </script>
  <!-- JS Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>