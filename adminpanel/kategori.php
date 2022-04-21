<?php
require "session.php";
require "../koneksi.php";
$queryKategori = mysqli_query($conn, "SELECT * FROM  kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori</title>

  <!-- ini link boostrap nya  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <!-- ini link fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!-- ini bagian navbar -->
  <?php
  require "navbar.php";
  ?>
  <!-- tutup navbar  -->

  <!-- ini table yang di bua -->
  <div class="container mt-3">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <a href="../adminpanel/" style="text-decoration: none;" class="text-muted"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <i></i> Kategori
        </li>
      </ol>
    </nav>
    <div class="my-3">
      <h3>Tambah Kategori</h3>
      <form action="" method="post">

        <div>
          <label for="kategori">
            Kategori
            <input type="text" name="kategori" id="kategori" placeholder="input nama kategori" class="form-control mt-3">
          </label>
        </div>
        <div>
          <!-- ini button dari search -->
          <button class="btn btn-primary mt-3" type="submit" name="simpan_kategori">Simpan</button>
        </div>
      </form>

      <!-- ini cara membuat untuk menampilkan ke layar -->
      <!-- ini fungsi simpan data -->
      <?php
      if (isset($_POST['simpan_kategori'])) {
        $kategori = htmlspecialchars($_POST['kategori']);
        $queryExist = mysqli_query($conn, "SELECT nama FROM kategori WHERE nama='$kategori'");
        $jumalahDataKategoriBaru = mysqli_num_rows($queryExist);
        // ini cara menyimpan data di php
        if ($jumalahDataKategoriBaru > 0) {
      ?>
          <div class="alert alert-primary mt-3" role="alert">
            data sudah ada
          </div>
          <?php
        } else {
          $querySimpan = mysqli_query($conn, "INSERT INTO kategori (nama) VALUES ('$kategori')");

          if ($querySimpan) {
          ?>
            <div class="alert alert-warning mt-3" role="alert">
              data berhasil di simpan
            </div>
            <!-- ini cara mengrefresh langsung  -->
            <meta http-equiv="refresh" content="1; url= kategori.php" />

      <?php
          } else {
            echo mysqli_error($conn);
          }
        }
      }
      ?>
    </div>

    <!-- selalu gunakan if else untuk mengandaikan nya  -->


    <!-- ini bagian table -->
    <div class="mt-3">
      <h2>
        List Kategori
      </h2>
      <div class="table-responsive mt-3">
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($jumlahKategori == 0) {
            ?>
              <tr>
                <td colspan="3" class="text-center"> Data Kategori tidak tersedia</td>
              </tr>
              <?php
            } else {
              $jumlah = 1;
              while ($data = mysqli_fetch_array($queryKategori)) {
              ?>
                <tr>
                  <td><?= $jumlah; ?></td>
                  <td><?= $data["nama"]; ?></td>
                  <td>
                    <!-- ini cara mengantarkan kita untuk edit data -->
                    <a href="kategori-detail.php?p=<?= $data['id']; ?>" class="btn btn-info"> <i class="fas fa-search"></i></a>
                  </td>
                </tr>
            <?php
                $jumlah++;
              }
            }


            ?>
          </tbody>
        </table>
      </div>

    </div>
    <!--akhir table   -->

  </div>

</body>


<!-- ini link js boostrap nya  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>