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
      <h1>Selamat Datang <span style="color:<?php echo $color?>"><?php echo $_SESSION['nama'] ?></span> di Portal Universitas Udayana </h1>
      <h2>Berita terkini</h2>
      <img src="./img/news1.jpg" alt="#">
      <p>Kapolda Bali Irjen Pol. Petrus R. Golose bersama jajaran bertemu Rektor Unud Prof. A.A Raka Sudewi di Gedung
        Rektorat Kampus Jimbaran, Senin (30/3/2020). Turut hadir mendampingi Rektor, Wakil Rektor Bidang Perencanaan
        Kerja Sama dan Informasi, Dekan FMIPA dan Wakil Dekan serta Koorprodi <a href="#">Baca Selengkapnya...</a></p>
      <img src="./img/news2.jpg" alt="#">
      <p>Jimbaran - Senin (16/3/2020) bertempat di Gedung Rektorat Kampus Jimbaran, Rektor Unud Prof. A.A Raka Sudewi menggelar rapat dengan Para Wakil Rektor, Ketua LPPM, Tim Mitigasi Bencana Unud, Kepala Biro Umum dan Direktur RS Unud untuk mengawal Instruksi Rektor Nomor 1 Tahun 2020 tentang Pencegahan Perkembangan dan Penyebaran <a href="#">Baca Selengkapnya...</a></p>
    </section>
  </div>
  <div class="footer">
    <h2>UNIVERSITAS UDAYANA</h1>
      <h4>Jl. Raya Kampus UNUD, Bukit Jimbaran, Kuta Selatan, Badung-Bali-803611</h4>
  </div>
</body>

</html>