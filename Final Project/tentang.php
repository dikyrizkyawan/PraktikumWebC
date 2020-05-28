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
        <h1>Visi</h1>
            <p>Terwujudnya sebuah organisasi penjaminan mutu yang profesional untuk mencapai VISI
                Unud yaitu : Unggul, Mandiri
                dan Berbudaya.
            </p>
            <h1>Misi</h1>
            <ol>
                <li>
                    <p>Mendorong sumberdaya manusia di lingkungan UNUD agar senantiasa memiliki kesadaran dan tanggung
                        jawab akan
                        budaya mutu.</p>
                </li>
                <li>
                    <p>kompetensi staf Badan Penjaminan Mutu, baik di tingkat universitas, fakultas, jurusan/program
                        studi, lembaga dan unit lainnya secara terus menerus, dalam menangani penjaminan mutu secara
                        profesional.
                    </p>
                </li>
                <li>
                    <p>Mendorong, menciptakan, mengembangkan, dan memelihara secara terus menerus sistem penjaminan mutu
                        di
                        lingkungan UNUD.</p>
                </li>
            </ol>
    </section>
  </div>
  <div class="footer">
    <h2>UNIVERSITAS UDAYANA</h1>
      <h4>Jl. Raya Kampus UNUD, Bukit Jimbaran, Kuta Selatan, Badung-Bali-803611</h4>
  </div>
</body>

</html>