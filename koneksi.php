<!-- ini cara membuat koneksi -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "toko_online";

$conn = mysqli_connect($servername, $username, $password, $database);


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
