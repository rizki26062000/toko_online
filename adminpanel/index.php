<?php
require "session.php";
require "../koneksi.php";

// ini query katagori
$queryKategori = mysqli_query($conn, "SELECT * FROM  kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

//  ini query produk
$queryProduk = mysqli_query($conn, "SELECT * FROM  produk");
$jumlahProduk = mysqli_num_rows($queryProduk);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <!-- ini link boostrap nya  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- ini link fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<style>
  .kotak {
    border: solid;
  }

  .summary-kategori {
    background-color: #0a6ba4;
    border-radius: 10px;
  }

  .summary-produk {
    background-color: #5B691D;
    border-radius: 10px;
  }

  .title1 {
    padding-left: 20px;

  }

  .title2 {
    padding-left: 20px;

  }
</style>

<body>

  <?php
  require "navbar.php";
  ?>

  <div class="container mt-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <i class="fas fa-home"></i> Home
        </li>
      </ol>
    </nav>
    <h2>halo <?= $_SESSION['username']; ?></h2>
    <!-- ini table kategori -->
    <div class="d-flex">
      <div class="container mt-5">
        <div class="row">
          <div class=" col-lg">
            <div class="summary-kategori p-3">
              <div class="row">
                <!-- bagian ini yang di ubah -->
                <div class="col-md-4 col-sm-6 col-12  ">
                  <i class="fas fa-align-justify fa-7x text-black-50"> </i>
                </div>
                <!-- bagian yang di ubah  -->
                <div class="col-md-6  text-white ">
                  <div class="title1">
                    <h3 class="fs-2">kategori</h3>
                    <span class="fs-4"> <?= $jumlahKategori; ?> kategori</span>
                    <p><a href="kategori.php" class="text-white" style="text-decoration: none;">lihat detail</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ini produk -->
      <div class="container mt-5 mb-4">
        <div class="row">
          <div class=" col-lg ">
            <div class="summary-produk p-3">
              <div class="row">
                <!-- bagian ini yang di ubah -->
                <div class="col-md-4 col-sm-6 col-12 ">
                  <i class="fas fa-box fa-7x text-black-50"> </i>
                </div>
                <!-- bagian yang di ubah  -->
                <div class="col-md-6  text-white ">
                  <div class="title2">
                    <h3 class="fs-2">produk</h3>
                    <span class="fs-4"><?= $jumlahProduk; ?> produk</span>
                    <p><a href="produk.php" class="text-white" style="text-decoration: none;">lihat detail</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->


    </div>
</body>

<!-- ini link js boostrap nya  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>