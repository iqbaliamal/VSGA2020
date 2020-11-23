<?php

// membuat fungsi 
function perkenalan()
{
  echo "Selamat datang, ";
  echo "Pada Acara Digitalent <br>";
  echo "2020 <br>";
};

// memanggil fungsi
perkenalan();


// ===============================================================================================
// membuat fungsi dengan parameter
function perkenalan2($nama, $salam)
{
  echo $salam . ", ";
  echo "Nama Saya" . $nama . "<br>";
  echo "Senang berkenalan dengan anda <br>";
};

// memanggil fungsi
perkenalan2("Iqbal", "Assalamualaikum");
echo "<hr>";

$saya = "Febi";
$ucapanSalam = "Selamat Pagi";
// memanggil kembali
perkenalan2($saya, $ucapanSalam);


// ===============================================================================================
// membuat fungsi dengan nilai default
function perkenalan3($nama, $salam = "Assalamualaikum")
{
  echo $salam . ", ";
  echo "Nama Saya" . $nama . "<br>";
  echo "Senang berkenalan dengan anda <br>";
};

// memanggil fungsi
perkenalan3("Iqbal", "Assalamualaikum");
echo "<hr>";

$saya = "Febi";
$ucapanSalam = "Selamat Pagi";
// memanggil kembali
perkenalan3($saya);


// ===============================================================================================
/* 
  - Hasil pengolahan nilai dari fungsi mungkin saja kita butuhkan untuk pemrosesan berikutnya. Oleh karena itu, kita harus membuat fungsi yang dapat mengembalikan nilai.
  - Pengembalian nilai dalam fungsi dapat menggunakan kata kunci return.
*/

// membuat fungsi dengan return
function hitungUmur($thnskrg, $thnlahir)
{
  $umur = $thnskrg - $thnlahir;
  return $umur;
}

echo "Umur saya adalah " . hitungUmur(2020, 2000) . "tahun";


// ===============================================================================================
/* 
  - Fungsi yang sudah kita buat, dapat juga dipanggil di dalam fungsi lain.
*/
// membuat fungsi didalam fungsi
function hitungUmurr($tahun_lahir, $tahun_sekarang)
{
  $umur = $tahun_lahir - $tahun_sekarang;
  return $umur;
}

function kenalan($nama, $salamm = "Selamat datang!")
{
  echo $salamm . ", ";
  echo "Nama Saya" . $nama . "<br>";
  // memanggil fungsi lain
  echo "Saya berusia " . hitungUmurr(2000, 2020) . " tahun <br>";
  echo "Senang berkenalan dengan anda <br>";
}
// memanggil fungsi perkenalan
kenalan("komang");


// ===============================================================================================
/* 
  - Fungsi rekursif adalah fungsi yang memanggil dirinya sendiri. Fungsi ini biasanya digunakan untuk menyelesaikan masalah sepeti faktorial, bilangan fibbonaci, pemrograman dinamis, dan lain-lain.
*/
// membuat fungsi rekursif
function faktorial($angka)
{
  if ($angka < 2) {
    return 1;
  } else {
    return $angka * faktorial($angka - 1);
  }
}

// memanggil fungsi
echo "faktorial 5 adalah" . faktorial(5);


// ===============================================================================================
/* 
  - Sebuah perintah yang dapat digunakan untuk membagi beberapa kejadian dalam suatu kumpulan perintah yang lebih kecil dangan berbagai kelengkapan di dalamnya baik itu pengecekan kondisi, fungsi matematika maupun fungsi string.
  - Prosedur tidak dapat mengembalikan nilai.
  - Dengan menggunakan prosedur atau fungsi dapat menghemat banyak ruang atau ukuran program dan menghindari pengetikan kode yang berulang-ulang.

  == manfaat ==
  - Dapat menghemat banyak ruang atau ukuran program
  - Menghindari pengetikan kode yang berulang-ulang.
  - Pencarian kesalahan lebih mudah karena kesalahan dapat dilokalisasi dalam suatu sub routine tertentu saja.
  - Jika ada aktifitas memodifikasi program, programmer fokus pada memodifikasi satu fungsi atau procedure saja tanpa khawatir mengganggu fungsi atau procedure yang lain
  - Reusability, fungsi yang sudah dibuat dapat digunakan kembali
*/
// membuat fungsi prosedur
function do_print()
{
  // mencetak informasi waktu
  echo time();
}

// memanggil prosedur
do_print();
echo "<br>";

// contoh fungsi penjumlahan
function jumlah($a, $b)
{
  return ($a + $b);
}
// memanggil jumlah
echo jumlah(3, 4); // output => 7
