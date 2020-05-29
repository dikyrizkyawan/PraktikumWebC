<?php
require "koneksi.php";
if( isset($_SESSION["login"])) {
    header("Location: beranda.php");
}
if (isset($_POST["login_btn"])) {
  $username = $_POST["username"];
  $password = $_POST['password'];
  $query = mysqli_query($koneksi, "SELECT * FROM user where username = '$username' AND password = '$password'");
  $data = mysqli_fetch_assoc($query);
  var_dump($data);
  if ($data) {
    $_SESSION["login"] = true;
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['role'] = $data['role'];
    $_SESSION['nama'] = $data['nama'];
    header("location:beranda.php");
  }
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
    <body class="bg-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Username</label><input class="form-control py-4" name="username" type="text" placeholder="Enter Username" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" name="password" type="password" placeholder="Enter password" /></div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><input class="btn btn-primary" name="login_btn" type="submit" value="Login"> </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="regis_mhs.php">Daftar Mahasiswa</a></div>
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
