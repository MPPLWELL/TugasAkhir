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

<?php 
$kategori="kosong";
if(!isset($_GET['kategori'])){
} else {
  $kategori=$_GET['kategori'];
}
?>

<?php 
if($kategori == "kosong"){
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
} else if($kategori == "Food"){
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
} else if($kategori == "Shirt"){
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
} else if($kategori == "Bag"){
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
} else if($kategori == "Shoes"){
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
if($kategori == "Food"){
  ?>
<img src="Gambar/chiki.png" alt="" style="height: 340px; margin-left: 180px; margin-top: 50px;">
  <?php
}else if($kategori == "Bag"){
  ?>
<img src="Gambar/tas.png" alt="" style="height: 340px; margin-left: 180px; margin-top: 50px;">
  <?php
}else if($kategori == "Shirt"){
  ?>
<img src="Gambar/baju.png" alt="" style="height: 340px; margin-left: 180px; margin-top: 50px;">
  <?php
}else if($kategori == "Shoes"){
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

  <div style="display: flex; gap: 25px; margin-left: 170px;">

    <?php 
    $i =  4;
    if($kategori=='Food' || $kategori=='Bag' || $kategori=='Shirt' || $kategori=='Shoes'){
      $query=mysqli_query($konek,"select * from produk where kategoriproduk = '$kategori'");
      } else {
      $query=mysqli_query($konek,"select * from produk");

    }
        while($data=mysqli_fetch_array($query))
        { ?>

    <?php if($i % 4 == 0 && $i != 4){ ?>
    <div style="display: flex; gap: 25px; margin-left: 170px;">
      <?php } ?>

      <div style="height: 400px; width: 300px;">
        <div style="width: 300px; height: 200px; background-color: #4A628A;">

        </div>

        <div style="padding-top: 10px;">

          <h1 style="font-size: 22px;"><?=$data['namaproduk'];?></h1>
          <p style="font-size: large; margin-top: -5px;"><?=$data['hargaproduk'];?></p>

          <p style="font-size: 12px; margin-top: -5px;"><?=$data['deskripsiproduk'];?></p>

          <a href="" style="text-decoration: none; color: white;">
            <div
              style="background-color: #B9E5E8; height: 30px; width: 150px; text-align: center; align-items: center; border-radius: 20px; margin-top: 30px;">
              <p style="padding-top: 2px;">Add to cart</p>
            </div>
          </a>

        </div>

      </div>
      <?php 
  $i++;
    if($i % 4 == 0){ ?>
    </div>
    <?php }
  ?>

    <?php } ?>

  <?php
  if($i % 4 != 0 || $i % 2 == 0 || $i % 3 == 0){?>

  </div>

  <?php
  }
  ?>

  <footer style="background-color: #4A628A; height: 250px; margin-top: 100px;">

  </footer>

</body>

</html>