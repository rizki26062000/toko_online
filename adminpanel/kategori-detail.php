<?php
// di bagian ini biasanya tempat kita buat berbagai fungsi
require "session.php";
require "../koneksi.php";


$id = $_GET['p'];


$query = mysqli_query($conn, "SELECT * FROM kategori WHERE id = '$id' ");

$data = mysqli_fetch_array($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit data Kategori</title>

  <!-- ini link boostrap nya  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <!-- ini link fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <?php
  require "navbar.php";

  ?>
  <div class="container mt-3">
    <h2> Detail Kategori</h2>
    <div class="row">
      <div class="col-md-12 ">
        <form action="" method="post">
          <div>
            <label for="kategori">
              kategori
              <input type="text" name="kategori" id="kategori" class="form-control mt-3" value="<?= $data['nama']; ?>">
            </label>
          </div>

          <div class="mt-3">
            <button type="submit" name="edit" class="btn btn-primary">edit data</button>
            <button type="submit" name="delete" class="btn btn-danger">delete</button>
          </div>
        </form>

        <!-- ini fungsi edit yang gampang -->
        <?php
        if (isset($_POST['edit'])) {
          $kategori = htmlspecialchars($_POST['kategori']);


          if ($data["nama"] == $kategori) {
        ?>
            <meta http-equiv="refresh" content="0; url= kategori.php" />
            <?php
          } else {
            $query = mysqli_query($conn, "SELECT * FROM  kategori WHERE nama = '$kategori'");
            $jumlahData = mysqli_num_rows($query);


            if ($jumlahData  > 0) {
            ?>
              <div class="alert alert-primary mt-3" role="alert">
                data sudah ada
              </div>
              <?php
            } else {
              $querySimpan = mysqli_query($conn, "UPDATE kategori SET nama = '$kategori' WHERE id= '$id'");

              if ($querySimpan) {
              ?>
                <div class="alert alert-warning mt-3" role="alert">
                  data berhasil Diubah
                </div>
                <!-- ini cara mengrefresh langsung  -->
                <meta http-equiv="refresh" content="1; url= kategori.php" />

            <?php
              } else {
                echo mysqli_error($conn);
              }
            }
          }
          // jangan lupa menggunakan if else dalam menggunakan fungsi 
        }

        // ini fungsi delete yang gampang
        if (isset($_POST['delete'])) {

          $queryDelete = mysqli_query($conn, "DELETE FROM kategori WHERE id = '$id' ");

          if ($queryDelete) {
            ?>
            <div class="alert alert-warning mt-3" role="alert">
              data berhasil di hapus
            </div>
            <meta http-equiv="refresh" content="1; url= kategori.php" />
        <?php
          } else {
            echo mysqli_error($conn);
          }
        }

        // selalu gunakan if else jangan lupa menggunakan if else
        ?>
      </div>
    </div>
  </div>



</body>

<!-- ini link js boostrap nya  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>