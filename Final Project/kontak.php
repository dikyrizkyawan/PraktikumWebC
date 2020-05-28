<?php
require "koneksi.php";
if( !isset($_SESSION["login"])) {
    header("Location: index.php");
}
if ($_SESSION['role'] == "Mahasiswa") {
    $role = $_SESSION['role'];
    $color = "green";
}
elseif ($_SESSION['role'] == "Dosen") {
    $role = $_SESSION['role'];
    $color = "red";
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
</head>

<body>
    <div class="left-panel">
        <section class="logo">
          <img class="logounud" src="./img/unud.png" alt="unud.png" height="250 px" />
        </section>
        <section class="sub-panel" style="background-color: <?php echo $color ?>">
        <h3><?php echo $_SESSION['role'] ?></h3>
        </section>
        <section class="sub-panel-1">
        <a href="logout.php" style="text-decoration: none;">
            <h4>Logout</h4>
        </a>
        </section>
        <section class="sub-panel">
          <h3>ARTIKEL POPULER</h3>
        </section>
        <section class="sub-panel-1">
          <a href="#" style="text-decoration: none;">
            <h4>Ternyata COVID-19...</h4>
          </a>
        </section>
        <section class="sub-panel-1">
          <a href="#" style="text-decoration: none;">
            <h4>Mengejutkan! Berikut Foto...</h4>
          </a>
        </section>
        <section class="sub-panel-1">
          <a href="#" style="text-decoration: none;">
            <h4>WOW! Mahasiswi ini...</h4>
          </a>
        </section>
        <section class="sub-panel-1">
          <a href="#" style="text-decoration: none;">
            <h4>OMG! WOW! Ternyata...</h4>
          </a>
        </section>
      </div>

  <div class="cover-panel"> 
      <img src="./img/cover.jpg">
  </div>
  <div class="right-panel">

  <section class="navbar">
      <ul>
          <li>
            <a href="beranda.php" style="text-decoration: none;">
              <h3>HOME</h3>
            </a>
        </li>
        <li>
          <a href="tentang.php" style="text-decoration: none;">
            <h3>TENTANG</h3>
          </a>
        </li>
        <li>
          <a href="pengajar.php" style="text-decoration: none;">
            <h3>PENGAJAR</h3>
          </a>
        </li>
        <li>
          <a href="kontak.php" style="text-decoration: none;">
            <h3>KONTAK</h3>
          </a>
        </li>
      </ul>
    </section>

    <section class="deskripsi">
        <h1>Kontak</h1>
            <div class="garis"></div>
            <h2>Diky Rizky Awan</h2>
            <h2>1708561055</h2>
            <h2>dikyrizkyawan@gmail.com</h2>
    </section>
  </div>
  <div class="footer">
    <h2>UNIVERSITAS UDAYANA</h1>
      <h4>Jl. Raya Kampus UNUD, Bukit Jimbaran, Kuta Selatan, Badung-Bali-803611</h4>
  </div>
</body>

</html>