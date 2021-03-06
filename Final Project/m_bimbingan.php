<?php
require "koneksi.php";
if( !isset($_SESSION["login"])) {
    header("Location: index.php");
}

$role = $_SESSION['role'];
$username = $_SESSION["username"];
if($role == 'Mahasiswa'){
$query1 = mysqli_query($koneksi, "SELECT * FROM user where username = '$username'");
$data1 = mysqli_fetch_assoc($query1);
$pembimbing = $data1['pembimbing'];
$query2 = mysqli_query($koneksi, "SELECT * FROM user where username = '$pembimbing'");
$data2 = mysqli_fetch_assoc($query2);
$n_pembimbing = $data2['nama'];
$query = mysqli_query($koneksi, "SELECT * FROM user where pembimbing = '$pembimbing' order by nama asc");
}
elseif($role == 'Dosen'){
$query2 = mysqli_query($koneksi, "SELECT * FROM user where username = '$username'");
$data2 = mysqli_fetch_assoc($query2);
$n_pembimbing = $data2['nama'];
$query = mysqli_query($koneksi, "SELECT * FROM user where pembimbing = '$username' order by nama asc");
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
                            <?php if($role == 'Mahasiswa' || $role == 'Admin'){?>
                            <a class="nav-link" href="m_kuliah.php"
                                ><div class="sb-nav-link-icon"></i></div>
                                KRS</a>
                            <?php } if($role == 'Dosen' || $role == 'Admin'){?>
                            <a class="nav-link" href="d_kuliah.php"
                                ><div class="sb-nav-link-icon"></i></div>
                                Kelas</a>
                            <?php } ?>
                            <a class="nav-link" href="m_dosen.php"
                                ><div class="sb-nav-link-icon"></i></div>
                                Daftar Dosen</a>
                                <a class="nav-link" href="m_mhs.php"
                                ><div class="sb-nav-link-icon"></i></div>
                                Daftar Mahasiswa</a>
                                <?php if($role == 'Mahasiswa' || $role == 'Admin'){?>
                            <a class="nav-link" href="m_kelas.php"
                                ><div class="sb-nav-link-icon"></i></div>
                                Daftar Kelas</a>
                                <?php } ?>
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
                        <h1 class="mt-4">Daftar Pembimbing</h1>
                        <div class="card mb-4">
                        <div class="card-header">Dosen Pembimbing : <?= $n_pembimbing ?></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Fakultas</th>
                                                <th>Jurusan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                             while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $data['username']?></td>
                                                <td><?= $data['nama']?></td>
                                                <td><?= $data['email']?></td>
                                                <td><?= $data['fakultas']?></td>
                                                <td><?= $data['jurusan']?></td>
                                            </tr>
                                            <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
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
