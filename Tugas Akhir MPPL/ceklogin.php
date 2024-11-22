<?php
 session_start();
// menghubungkan dengan koneksi
$query=new mysqli('localhost', 'root', '', 'titipin');
// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = $_POST['pass'];
// menyeleksi data admin dengan email dan password yang sesuai
$data = mysqli_query($query,"select * from akun where
Username='$email' and Password='$password'")or die
(mysqli_error($query));
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

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


$query=mysqli_query($konek,"SELECT * from akun where Username = '$email'");
while($data=mysqli_fetch_array($query)) {
$id = $data['id'];
}


if($cek > 0){
$_SESSION['email'] = $email;
$_SESSION['status'] = "login";
header("location:DashboardPage.php?id=$id");
}else{
header("location:LoginPage.php");
} ?>