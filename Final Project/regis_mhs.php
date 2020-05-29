<?php
require "koneksi.php";
if(isset($_POST["btnregis"])) {
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $fakultas = $_POST["fakultas"];
    $jurusan = $_POST["jurusan"];
    $query = "INSERT INTO user VALUES ('$username', '$password','Mahasiswa', '$nama', '$email', '$fakultas', '$jurusan',NULL)";
    $exe = mysqli_query($koneksi, $query);
    echo "<script>
            document.location.href = 'index.php';
            alert('Akun Berhasil Dibuat!');
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
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">Username</label><input class="form-control py-4" name="username" id="username" type="text" placeholder="Enter username"/></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Password</label><input class="form-control py-4" name="pass" id="pass" type="password" placeholder="Enter password" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Nama</label><input class="form-control py-4" name="nama" id="nama" type="text" aria-describedby="emailHelp" placeholder="Enter your name" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" name="email" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" /></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Fakultas</label><input class="form-control py-4" name="fakultas" id="fakultas" type="text" placeholder="Enter fakultas" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Jurusan</label><input class="form-control py-4" name="jurusan" id="jurusan" type="text" placeholder="Enter jurusan" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><input type="submit" name="btnregis" class="btn btn-primary btn-block" value="Create Account"></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
