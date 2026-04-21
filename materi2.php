<form method ="post" >
    masukan angka :   <input type="number" name="angka"><br>
    <input type="submit" value="kirim">
</form>

<?php
if (isset($_POST['angka'])) {
    $data=$_POST['angka'];  
    for ($i=1; $i <= $data; $i++) {
        echo "Angka: $i <br>";
    }
    if ($data % 2 == 0) {
        echo "Angka $data adalah bilangan genap.";
    } else {
        echo "Angka $data adalah bilangan ganjil.";
    }
}

 ?>
