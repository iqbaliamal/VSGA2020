<?php

// membuat ARRAY KOSONG
$buah = array();
$hobii = [];

// membuat array sekaligus mengisinya
$minuman  = array("Kopi", "Susu", "Jus Jeruk");
$makanan  = ["Nasi Goreng", "Nasi Uduk", "Soto"];

// membuat array sesuai dengan index
$anggota[0] = "Iqbal";
$anggota[1] = "Ikhlasul";
$anggota[2] = "Amal";

// membuat array campur
$item = ["Bunga", 123, 3.14, true];


// =============================================================================================
// membuat array
$barang = ["Buku", "Pensil", "Bolpoin"];

// menampilkan array dengan index
echo $barang[0] . "<br>";
echo $barang[1] . "<br>";
echo $barang[2] . "<br>";

echo "<br>";
echo "<hr>";
echo "<br>";


// =============================================================================================
// membuat array
$barang2 = ["Buku", "Pensil", "Bolpoin"];

// menampilkan array dengan perulangan for
for ($i = 0; $i < count($barang2); $i++) {
  # code...
  echo $barang2[$i] . "<br>";
}

echo "<hr>";
echo "<br>";


// =============================================================================================
// membuat array
$barang3 = ["Buku", "Pensil", "Bolpoin"];

// menampilkan array dengan perulangan foreach
foreach ($barang3 as $isi) {
  # code...
  echo $isi . "<br>";
}

echo "<hr>";
echo "<br>";


// =============================================================================================
// membuat array
$barang4 = ["Buku", "Pensil", "Bolpoin"];

// menampilkan array dengan perulangan while
$i = 0;
while ($i < count($barang4)) {
  # code...
  echo $barang4[$i] . "<br>";
  $i++;
}

echo "<hr>";
echo "<br>";


// =============================================================================================
// membuat array
$hewan = [
  "Burung",
  "Kucing",
  "Ikan"
];

// menghapus array [1] => kucing
unset($hewan[1]);

echo $hewan[0] . "<br>";
echo $hewan[1] . "<br>"; //akan terjadi error
echo $hewan[2] . "<br>";

echo "<hr>";
echo "<pre>";
print_r($hewan);
echo "</pre>";

echo "<br>";
echo "<hr>";
echo "<br>";

// =============================================================================================
// membuat array
$hobi = [
  "Membaca",
  "Menulis",
  "Ngeblog"
];

// mengisi array ke index 3
$hobi[3] = "Ngoding";

// mengisi array ke index terahir (otomatis)
$hobi[] = "Olahraga";

// menampilkan array dengan perulangan foreach
foreach ($hobi as $hobiku) {
  # code...
  echo $hobiku . "<br>";
}

echo "<hr>";
echo "<br>";


// =============================================================================================
// membuat array
$user = [
  "iqbal",
  "ali",
  "budi"
];

// insert data ke array [1] => ali di timpa dengan subhan
$user[1] = "subhan";

echo "<hr>";
echo "<pre>";
print_r($user);
echo "</pre>";

echo "<br>";
echo "<hr>";
echo "<br>";

// =============================================================================================
// membuat array asosiatf
$artikel = [
  "judul" => "Belajar pemrograman web",
  "penulis" => "Digital talent",
  "view" => 128
];

echo "<h2>" . $artikel["judul"] . "</h2>";
echo "<p>oleh : " . $artikel["penulis"] . "</p>";
echo "<p>view : " . $artikel["view"] . "</p>";

echo "<hr>";
echo "<br>";

// =============================================================================================
// membuat array multi dimensi
$matriks = [
  [2, 3, 4],
  [7, 5, 0],
  [4, 3, 8],
];

// cara memanggil isinya
echo $matriks[1][0]; //===> Output 7

echo "<br>";
echo "<hr>";
echo "<br>";


// =============================================================================================
$artikel2 = [
  [
    "judul" => "Belajar pemrograman PHP",
    "penulis" => "Digitalent"
  ],
  [
    "judul" => "Tutorial PHP dari nol hingga mahir",
    "penulis" => "Digitalent"
  ],
  [
    "judul" => "Membuat aplikasi web dengan PHP",
    "penulis" => "Digitalent"
  ]
];

foreach ($artikel2 as $post) {
  # code...
  echo "<h2>" . $post["judul"] . "</h2>";
  echo "<p>" . $post["penulis"] . "</p>";
  echo "<hr>";
}
