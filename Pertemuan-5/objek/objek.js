// Objek sebenarnya adalah sebuah variabel yang menyimpan nilai (properti) dan fungsi (method). 
// ---------perbedaan properti dan method------------
// ===Properti adalah ciri khas dari objek (variabel). Sedangkan method adalah perilaku dari objek (fungsi).
// ===Method dapat dibuat dengan cara mengisi nilai (value) dengan sebuah fungsi.

var car = {
  // properties
  type: "fiat",
  model: "500",
  color: "white",


  // method
  start: function () {
    console.log("ini method start");
  },
  drive: function () {
    console.log("ini method drive");
  },
  brake: function () {
    console.log("ini method brake");
  },
  stop: function () {
    console.log("ini method stop");
  }
}