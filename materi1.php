<?php

echo '<img src="https://i.pinimg.com/736x/f1/15/3a/f1153a5a5ba2dd8588a43e478c2ef93f.jpg" alt="Description of image">';
echo '<br><br> ================================================================================================================================== <br><br>';
//Materi 1: Variabel dan Tipe Data
$nama = 'AFone';
$umur = 20;
$tinggi = 170.5;
$hobi = ['membaca', 'bermain game', 'berolahraga'];
echo 'Nama saya ' . $nama . ', umur saya ' . $umur . ' tahun, tinggi saya ' . $tinggi . ' cm, dan hobi saya adalah: ' . $hobi[0] . ' dan ' . $hobi[1];


echo '<br><br> ================================================================================================================================== <br><br>';

//Materi 2: Operator dan kondisi

//Operator Aritmatika

//penjumlahan
$nilai1 = 10;
$nilai2 = 20;
$hasil = $nilai1 + $nilai2;
echo 'Hasil penjumlahan nilai 1 + nilai 2 = ' . $hasil;

echo '<br><br> ================================================================================================================================== <br><br>';

//pengurangan
$nilai1 = 10;
$nilai2 = 20;
$hasil = $nilai1 - $nilai2;
echo 'Hasil pengurangan nilai 1 - nilai 2 = ' . $hasil;

echo '<br><br> ================================================================================================================================== <br><br>';

//perkalian
$nilai1 = 10;
$nilai2 = 20;
$hasil = $nilai1 * $nilai2;
echo 'Hasil perkalian nilai 1  x nilai 2 = ' . $hasil;

echo '<br><br> ================================================================================================================================== <br><br>';

//pembagian
$nilai1 = 10;
$nilai2 = 20;
$hasil = $nilai1 / $nilai2;
echo 'Hasil pembagian nilai 1 :nilai 2 = ' . $hasil;

echo '<br><br> ================================================================================================================================== <br><br>';
//kondisi (if else)
$nilai = 90;

if ($nilai >= 80) {
    echo 'Nilai Anda A';
} elseif ($nilai >= 70) {
    echo 'Nilai Anda B';
} elseif ($nilai >= 60) {
    echo 'Nilai Anda C';
} else {
    echo 'Nilai Anda D';
}


echo '<br><br> ================================================================================================================================== <br><br>';
//penentuan bilangan genap atau ganjil
$bilangan = 15;

if ($bilangan % 2 == 0) {
    echo 'Bilangan ' . $bilangan . ' adalah genap';
} else {
    echo 'Bilangan ' . $bilangan . ' adalah ganjil';
}
echo '<style>body { background-color: redk; }</style>';
?>