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

if($_POST['pass'] == $_POST['passcek']){

    $email = $_POST['email'];
    $password = $_POST['pass'];
    $query=mysqli_query($konek,"INSERT INTO akun VALUES('','$email','$password')") or die (mysqli_error($konek));
    header("location:loginPage.php?pesan=berhasilsignup");
} else {
    header("location:SignUpPage.php?pesan=Passwordincorrect");
}



?>