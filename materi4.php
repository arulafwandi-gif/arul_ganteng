<form action="" method="post">
    username : <input type="text" name="username"><br>
    password : <input type="password" name="password"><br>
    nama : <input type="text" name="nama"><br>
    email : <input type="email" name="email"><br>
    <input type="submit" value="kirim" name="kirim"><br>
</form>

<?php
include 'koneksi.php';
if (isset($_POST['kirim'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $sql = "INSERT INTO user (username, password, nama, email) VALUES ('$username', '$password', '$nama', '$email')";
    
    if (mysqli_query($koneksi, $sql)) {
        echo "Data berhasil disimpan!";
    } else {
        echo " Data gagal disimpan: " ;
    }
}
?>