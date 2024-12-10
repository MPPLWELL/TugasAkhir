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

   $id = $_GET['id'];
   $idakun = $_GET['idakun'];


    $query=mysqli_query($konek,"UPDATE paketinformasi SET notif='0' where id='$id'") or die (mysqli_error($konek));
    header("location:DashboardPage.php?id=$idakun");





?>