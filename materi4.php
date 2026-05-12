<?php
include 'koneksi.php';

/* =========================
   DELETE DATA
========================= */
if (isset($_GET['hapus_id'])) {
    $id = $_GET['hapus_id'];
    mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
    echo "<p>Data berhasil dihapus!</p>";
}

/* =========================
   TAMBAH DATA (CREATE)
========================= */
if (isset($_POST['kirim'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];

    mysqli_query($koneksi,
        "INSERT INTO user (username,password,nama,email)
         VALUES ('$username','$password','$nama','$email')");

    echo "<p>Data berhasil disimpan!</p>";
}

/* =========================
   AMBIL DATA EDIT
========================= */
$data_edit = null;
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
    $data_edit = mysqli_fetch_assoc($result);
}

/* =========================
   UPDATE DATA
========================= */
if (isset($_POST['update'])) {
    $id       = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];

    mysqli_query($koneksi,
        "UPDATE user SET 
        username='$username',
        password='$password',
        nama='$nama',
        email='$email'
        WHERE id='$id'");

    echo "<p>Data berhasil diupdate!</p>";
}
?>

<h2>Tambah User</h2>
<form method="post">
    Username : <input type="text" name="username" required><br>
    Password : <input type="password" name="password" required><br>
    Nama     : <input type="text" name="nama" required><br>
    Email    : <input type="email" name="email" required><br>
    <button name="kirim">Simpan</button>
</form>

<hr>

<?php if ($data_edit) { ?>
<h2>Edit User</h2>
<form method="post">
    <input type="hidden" name="id" value="<?= $data_edit['id'] ?>">
    
    Username : <input type="text" name="username" value="<?= $data_edit['username'] ?>"><br>
    Password : <input type="text" name="password" value="<?= $data_edit['password'] ?>"><br>
    Nama     : <input type="text" name="nama" value="<?= $data_edit['nama'] ?>"><br>
    Email    : <input type="email" name="email" value="<?= $data_edit['email'] ?>"><br>
    
    <button name="update">Update</button>
</form>
<hr>
<?php } ?>

<h2>Data User</h2>
<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Username</th>
    <th>Password</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
$result = mysqli_query($koneksi, "SELECT * FROM user");
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $row['username'] ?></td>
    <td><?= $row['password'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['email'] ?></td>
    <td>
        <a href="?edit_id=<?= $row['id'] ?>">Edit</a> |
        <a href="?hapus_id=<?= $row['id'] ?>" 
           onclick="return confirm('Yakin hapus?')">Delete</a>
    </td>
</tr>
<?php } ?>
</table>