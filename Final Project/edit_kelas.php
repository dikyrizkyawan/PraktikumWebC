<?php
require "koneksi.php";
if( !isset($_SESSION["login"])) {
    header("Location: index.php");
}

if ($_SESSION['role'] == "Mahasiswa") {
    header("Location: m_kuliah.php");
}

$id = $_GET['id_kelas'];
$query = mysqli_query($koneksi, "SELECT * FROM kelas INNER JOIN matkul ON kelas.kode_matkul = matkul.kode_matkul where id = '$id'");
$data = mysqli_fetch_assoc($query);

if(isset($_POST["editbtn"])) {
    $kelas = $_POST["kelas"];
    $kuota = $_POST["kuota"];
    $status = $_POST["status"];
    $query = "UPDATE kelas SET kelas = '$kelas', kuota = '$kuota', status = '$status' WHERE id = '$id'";
    $exe = mysqli_query($koneksi, $query);
    echo "<script>
            document.location.href = 'd_kuliah.php';
            alert('Data Berhasil Diupdate!');
         </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Static Navigation - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <a class="navbar-brand" href="index.html">Simak</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            >
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto"">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <br>
                            <a class="nav-link" href="beranda.php"
                                ><div class="sb-nav-link-icon"></div>Homepage</a>
                            <br>
                            <a class="nav-link active" href="d_kuliah.php"
                                ><div class="sb-nav-link-icon"></i></div>
                                Kelas</a>
                            <a class="nav-link" href="m_dosen.php"
                                ><div class="sb-nav-link-icon"></i></div>
                                Daftar Dosen</a>
                            <a class="nav-link" href="m_mhs.php"
                                ><div class="sb-nav-link-icon"></i></div>
                                Daftar Mahasiswa</a>
                            <a class="nav-link" href="m_kelas.php"
                                ><div class="sb-nav-link-icon"></i></div>
                                Daftar Kelas</a>
                            <a class="nav-link" href="m_bimbingan.php"
                                ><div class="sb-nav-link-icon"></i></div>
                                Daftar Bimbingan</a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Hai,</div>
                        <?= $_SESSION['nama'] ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit Kelas</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                            <form form action="" id="buat" method="POST" >
                                <div class="form-group ml-4 py-3 mb-0">
                                    <label for="namaKelas">Nama Kelas</label>
                                    <input type="text" class="form-control col-sm-3" id="kelas" name="kelas" value="<?= $data['kelas']; ?>">
                                </div> 
                                <div class="form-group ml-4">
                                    <label for="jamKuliah">Mata Kuliah</label>
                                    <input type="text" class="form-control col-sm-3" id="matkul" name="matkul" readonly value="<?= $data['matkul']; ?>">
                                </div>
                                <div class="form-group ml-4">
                                    <label for="kuotaKelas">Kuota Kelas</label>
                                    <input type="number" class="form-control col-sm-3" id="kuota" name="kuota"  value="<?= $data['kuota']; ?>">
                                </div>
                                <div class="form-group ml-4 ">
                                    <label for="status" class="form-label">Status</label>
                                    <select name="status" id="status" class="form-control col-sm-3">
                                        <option value="<?= $data['status']; ?>"><?= $data['status']; ?></option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Non-Aktif">Non-Aktif</option>
                                    </select>
                                </div>
                                <input type="submit" name="editbtn" id="editbtn" class="btn btn-primary ml-4 mb-3" value="Edit Kelas">
                            </form>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Diky Rizky Awan PrakWebC</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
