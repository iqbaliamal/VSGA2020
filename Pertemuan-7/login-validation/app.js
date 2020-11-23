function validation() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;
  var pesan_error = document.getElementById("pesan_error");

  if (username !== "admin" && password !== "admin") {
    pesan_error.innerHTML = "<p class='pesan'>Username atau Password salah!</p>";
    return false;
  } else {
    alert("Anda Berhasil Login!");
    return;
  }
}