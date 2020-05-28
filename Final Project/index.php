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
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];
    header("location:beranda.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 12 Session</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body style="background-color:white"><br><br><br>
<fieldset style="width: 10%; margin: auto; border: 1px solid;">
    <legend>Login</legend>
    <form action="" method="POST">
    <table border="0" align="center">
        <tr>
            <td>Username</td>
            <td>:</td><td><input type="text" name="username" size="20" placeholder="Username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td><td><input type="password" name="password" size="20" placeholder="Password"></td>
        </tr>
        <tr>
            <td></td><td></td><td><input type="submit" name="login_btn" Value="Login"></td>
        </tr>
    </table>
    </form>
</fieldset>
<br>
<fieldset style="width: 10%; margin: auto; border: 1px solid;">
    <legend>Akun Demo</legend>
    <table border="0" align="center">
        <tr>
            <td>Username</td>
            <td>:</td><td>1708561055</td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td><td>diky</td>
        </tr>
        <tr><td><hr></td></tr>
        <tr>
            <td>Username</td>
            <td>:</td><td>dosen</td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td><td>dosen</td>
        </tr>
    </table>
</fieldset>
</body>
</html>