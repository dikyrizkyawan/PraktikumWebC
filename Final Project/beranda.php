<?php
require "koneksi.php";
if( !isset($_SESSION["login"])) {
    header("Location: index.php");
}
if ($_SESSION['role'] == "Mahasiswa") {
    $role = $_SESSION['role'];
    $color = "green";
    $_SESSION['color'] = $color;
    $username = $_SESSION["username"];
    $query = mysqli_query($koneksi, "SELECT * FROM user where username = '$username'");
    $data = mysqli_fetch_assoc($query);
}
elseif ($_SESSION['role'] == "Dosen") {
    $role = $_SESSION['role'];
    $color = "red";
    $_SESSION['color'] = $color;
    $username = $_SESSION["username"];
    $query = mysqli_query($koneksi, "SELECT * FROM user where username = '$username'");
    $data = mysqli_fetch_assoc($query);
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
    <section class="subpanel1a">
      <a href="m_kuliah.php" style="text-decoration: none;">
        <h4>SIMAK</h4>
      </a>
  </div>

  <div class="coverpanela"> 
      <img src="./img/cover.jpg">
  </div>
  <div class="rightpanela">

    <section class="navbara">
      <ul>
          <li>
            <a onclick="home_show()" style="text-decoration: none; color: #f0b101" id="lbl_home">
              <h3>HOME</h3>
            </a>
        </li>
        <li>
          <a onclick="profil_show()" style="text-decoration: none; color: white" id="lbl_profil">
            <h3>PROFIL</h3>
          </a>
        </li>
        <li>
          <a onclick="tentang_show()" style="text-decoration: none; color: white" id="lbl_tentang">
            <h3>TENTANG</h3>
          </a>
        </li>
      </ul>
    </section>

    <section class="deskripsia">
      <section id="d_home">
        <h1>Selamat Datang <span style="color:<?php echo $color?>"><?php echo $data['nama'] ?></span> di Portal Universitas Udayana </h1>
        <h2>Berita terkini</h2>
        <img src="./img/news1.jpg" alt="#">
        <p>Kapolda Bali Irjen Pol. Petrus R. Golose bersama jajaran bertemu Rektor Unud Prof. A.A Raka Sudewi di Gedung
          Rektorat Kampus Jimbaran, Senin (30/3/2020). Turut hadir mendampingi Rektor, Wakil Rektor Bidang Perencanaan
          Kerja Sama dan Informasi, Dekan FMIPA dan Wakil Dekan serta Koorprodi <a href="#">Baca Selengkapnya...</a></p>
        <img src="./img/news2.jpg" alt="#">
        <p>Jimbaran - Senin (16/3/2020) bertempat di Gedung Rektorat Kampus Jimbaran, Rektor Unud Prof. A.A Raka Sudewi menggelar rapat dengan Para Wakil Rektor, Ketua LPPM, Tim Mitigasi Bencana Unud, Kepala Biro Umum dan Direktur RS Unud untuk mengawal Instruksi Rektor Nomor 1 Tahun 2020 tentang Pencegahan Perkembangan dan Penyebaran <a href="#">Baca Selengkapnya...</a></p>
      </section>
      
      <section id="d_profil" style="display: none">
      <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card-body">
            <form method="POST" action="profiledit.php">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control" id="nama" name="nama" value="<?= $data['nama']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control" id="email" name="email" value="<?= $data['email']; ?>">
                </div>
              </div>
              <?php if($role == 'Mahasiswa'){?>
                
                <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Fakultas</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control" id="fakultas" name="fakultas" value="<?= $data["fakultas"]; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control" id="jurusan" name="jurusan" value="<?= $data["jurusan"]; ?>">
                </div>
              </div>
                
              <?php } ?>
              
              <input type="submit" class="btn btn-primary" value="Edit Profile">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
      </section>

    <section id="d_kuliah" style="display: none;">
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

  <div class="footera">
    <h2>UNIVERSITAS UDAYANA</h1>
      <h4>Jl. Raya Kampus UNUD, Bukit Jimbaran, Kuta Selatan, Badung-Bali-803611</h4>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <script type="text/javascript">
  function home_show() {
    document.getElementById("d_home").style.display = "block";
    document.getElementById("lbl_home").style.color = "#f0b101";
    document.getElementById("d_profil").style.display = "none";
    document.getElementById("lbl_profil").style.color = "white";
    document.getElementById("lbl_tentang").style.color = "white";
    document.getElementById("d_kuliah").style.display = "none";
      }
  function profil_show() {
    document.getElementById("lbl_tentang").style.color = "white";
    document.getElementById("lbl_home").style.color = "white";
    document.getElementById("d_home").style.display = "none";
    document.getElementById("lbl_profil").style.color = "#f0b101";
    document.getElementById("d_profil").style.display = "block";
    document.getElementById("d_kuliah").style.display = "none";
      }
  function tentang_show() {
    document.getElementById("lbl_home").style.color = "white";
    document.getElementById("lbl_profil").style.color = "white";
    document.getElementById("lbl_tentang").style.color = "#f0b101";
    document.getElementById("d_kuliah").style.display = "block";
    document.getElementById("d_home").style.display = "none";
    document.getElementById("d_profil").style.display = "none";
      }
</script>

</body>

</html>