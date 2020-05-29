<?php
require "koneksi.php";
if( !isset($_SESSION["login"])) {
    header("Location: index.php");
}

$nama = $_POST["nama"];
$email = $_POST["email"];
$role = $_SESSION["role"];
$color = $_SESSION["color"];
if($role == 'Mahasiswa'){
$fakultas = $_POST["fakultas"];
$jurusan = $_POST["jurusan"];}

if(isset($_POST["simpanbtn"])) {
    $username = $_SESSION["username"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $query = "UPDATE user SET nama = '$nama', email = '$email' WHERE username = '$username'";
    $exe = mysqli_query($koneksi, $query);
    $_SESSION['nama'] = $nama;
    echo "<script>
            document.location.href = 'index.php';
            alert('Data Berhasil Diupdate!');
         </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Modul 12 Session</title>
  <link rel="stylesheet" href="style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
  <div class="leftpanela">
    <section class="logoa">
      <img class="logoss" src="./img/unud.png" alt="unud.png" height="250 px" style="margin-left: auto;margin-right: auto;" />
    </section>
    <section class="subpanela" style="background-color: <?php echo $color ?>">
      <h3><?php echo $_SESSION['role'] ?></h3>
    </section>
    <section class="subpanel1a">
      <a href="logout.php" style="text-decoration: none;">
        <h4>Logout</h4>
      </a>
    </section>
  </div>

  <div class="coverpanela"> 
      <img src="./img/cover.jpg">
  </div>
  <div class="rightpanela">

    <section class="navbara">
      <ul>
          <li>
            <a href="beranda.php" style="text-decoration: none;">
              <h3>HOME</h3>
            </a>
        </li>
    </section>

    <section class="deskripsia">
    <h2>Edit Profil</h2>
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-body">
            <form method="POST" action="">
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" autofocus class="form-control" id="nama" name="nama" value="<?= $nama; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?= $email; ?>">
                </div>
              </div>
              <?php if($role == 'Mahasiswa'){?>
              <div class="form-group row">
                <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control" id="fakultas" name="fakultas" value="<?= $fakultas; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control" id="jurusan" name="jurusan" value="<?= $jurusan; ?>">
                </div>
              </div>
              <?php } ?>
              <input type="submit" id="simpanbtn" name="simpanbtn" class="btn btn-primary " value="Simpan">
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>

      
  </div>

  <div class="footera">
    <h2>UNIVERSITAS UDAYANA</h1>
      <h4>Jl. Raya Kampus UNUD, Bukit Jimbaran, Kuta Selatan, Badung-Bali-803611</h4>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>