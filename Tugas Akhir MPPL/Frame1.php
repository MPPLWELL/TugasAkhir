<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: #7AB2D3;">

  <!-- Hero -->
  <div class="hero d-flex align-items-center" style="min-height: 100vh;"> <!-- Set height to 100vh -->
    <d class="container">
      <div class="row justify-content-center"> <!-- Center the row -->
        <div class="col-6 mt-5 d-flex justify-content-center">
          <img src="Gambar/Group 1.png" alt="" style="width: 23rem;">
        </div>
        <!-- Text Titipin -->
        <div class="col-6  mt-5  align-items-center justify-content-center"> <!-- Center text -->
          <div>
            <h3 class="text-white fw-light mb-5 fs-4 border-bottom pb-3">
              Titipin
            </h3>
            <h1 class="text-white fw-bold mb-4">
              <span class="auto-type"></span>
            </h1>
            <div class="d-flex justify-content-end align-items-end mt-4 " style="height: 100px;"> <!-- Container for button at the bottom right -->
              <button class=" btn btn-lg rounded-1 " style="background-color: #4A628A;">
                <a class="text-decoration-none text-white" href="LoginPage.php">Gabung Sekarang</a>
              </button>
            </div>
          </div>
        </div>
        <!-- Text Titipin -->
      </div>
      <div class="d-flex align-items-center justify-content-center mt-5 pt-5 text-white fw-light fs-6 " style="min-height: 10vh;">
        Selamat Datang di Titipin</div>
    </d>
  </div>
  <!-- Hero -->



  <!-- JS Auto Type -->
  <script src=" https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js">
  </script>
  <script>
    var typed = new Typed(".auto-type", {
      strings: ["Jasa Titip Internasional", "Belanja Global Mudah", "Belanja di Titipin Sekarang!"],
      typeSpeed: 40,
      backSpeed: 20,
      loop: true
    })
  </script>
  <!-- JS Auto Type -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>