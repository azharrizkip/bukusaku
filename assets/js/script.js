function cek(){
  var cek = document.login.nis.value;
  if(isNaN(cek)){
    alert("format Nis Anda Salah");
    document.getElementById('nis').focus();
    document.getElementById('nis').value = "";
  }
}﻿
