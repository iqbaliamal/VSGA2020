// fungsi random dan mutlak Adalah fungsi yang menghasilkan nilai acak antara 0.0 sampai 1.0.
var n = Math.random();

// Jika ingin membuat nilai acak dari rentang nilai tertentu, maka kita bisa menggunakan bantuan fungsi floor() untuk membulatkan lalu dikali dengan nilai min dan max.

function random(min, max) {
  return Math.floor(Math.random() * (min - max)) + min;
}
random(1, 100);


// fungsi MUTLAK adalah fungsi yang menghasilkan nilai mutlak atau absolute atau positif.
var x = Math.abs(-2);