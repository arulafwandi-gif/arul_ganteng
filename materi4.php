<script src="https://cdn.tailwindcss.com"></script>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'koneksi.php';

/* DELETE */
if (isset($_GET['hapus_id'])) {
    $id = $_GET['hapus_id'];
    mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
}

/* CREATE */
if (isset($_POST['kirim'])) {
    mysqli_query($koneksi,"INSERT INTO user (username,password,nama,email)
    VALUES ('$_POST[username]','$_POST[password]','$_POST[nama]','$_POST[email]')");
}

/* AMBIL DATA EDIT */
$data_edit = null;
if (isset($_GET['edit_id'])) {
    $result = mysqli_query($koneksi,"SELECT * FROM user WHERE id='$_GET[edit_id]'");
    $data_edit = mysqli_fetch_assoc($result);
}

/* UPDATE */
if (isset($_POST['update'])) {
    mysqli_query($koneksi,"UPDATE user SET 
        username='$_POST[username]',
        password='$_POST[password]',
        nama='$_POST[nama]',
        email='$_POST[email]'
        WHERE id='$_POST[id]'");
}
?>

<body class="bg-slate-100 p-8">

<div class="max-w-5xl mx-auto">

<h1 class="text-3xl font-bold mb-6 text-center">CRUD USER DATABASE</h1>

<!-- FORM TAMBAH -->
<div class="bg-white p-6 rounded-xl shadow mb-8">
<h2 class="text-xl font-bold mb-4">Tambah User</h2>
<form method="post" class="grid grid-cols-2 gap-4">
<input class="border p-2 rounded" type="text" name="username" placeholder="Username" required>
<input class="border p-2 rounded" type="password" name="password" placeholder="Password" required>
<input class="border p-2 rounded col-span-2" type="text" name="nama" placeholder="Nama" required>
<input class="border p-2 rounded col-span-2" type="email" name="email" placeholder="Email" required>

<button name="kirim" class="col-span-2 bg-green-600 text-white py-2 rounded hover:bg-green-700">
Simpan Data
</button>
</form>
</div>

<!-- FORM EDIT -->
<?php if ($data_edit) { ?>
<div class="bg-yellow-50 p-6 rounded-xl shadow mb-8">
<h2 class="text-xl font-bold mb-4">Edit User</h2>
<form method="post" class="grid grid-cols-2 gap-4">
<input type="hidden" name="id" value="<?= $data_edit['id'] ?>">
<input class="border p-2 rounded" type="text" name="username" value="<?= $data_edit['username'] ?>">
<input class="border p-2 rounded" type="text" name="password" value="<?= $data_edit['password'] ?>">
<input class="border p-2 rounded col-span-2" type="text" name="nama" value="<?= $data_edit['nama'] ?>">
<input class="border p-2 rounded col-span-2" type="email" name="email" value="<?= $data_edit['email'] ?>">

<button name="update" class="col-span-2 bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
Update Data
</button>
</form>
</div>
<?php } ?>

<!-- TABEL -->
<div class="bg-white p-6 rounded-xl shadow">
<h2 class="text-xl font-bold mb-4">Data User</h2>

<table class="w-full text-left border-collapse">
<thead class="bg-slate-800 text-white">
<tr>
<th class="p-3">No</th>
<th class="p-3">Username</th>
<th class="p-3">Password</th>
<th class="p-3">Nama</th>
<th class="p-3">Email</th>
<th class="p-3">Aksi</th>
</tr>
</thead>

<tbody>
<?php
$no=1;
$result = mysqli_query($koneksi,"SELECT * FROM user");
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr class="border-b hover:bg-slate-50">
<td class="p-3"><?= $no++ ?></td>
<td class="p-3"><?= $row['username'] ?></td>
<td class="p-3"><?= $row['password'] ?></td>
<td class="p-3"><?= $row['nama'] ?></td>
<td class="p-3"><?= $row['email'] ?></td>
<td class="p-3 space-x-2">
<a href="?edit_id=<?= $row['id'] ?>" 
class="bg-yellow-400 px-3 py-1 rounded">Edit</a>

<a href="?hapus_id=<?= $row['id'] ?>" 
onclick="return confirm('Yakin hapus?')" 
class="bg-red-500 text-white px-3 py-1 rounded">Delete</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
</div>
</body>