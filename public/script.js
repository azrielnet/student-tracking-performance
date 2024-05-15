// Fungsi untuk menampilkan pop-up biodata
function openPopup() {
    document.getElementById("profilePopup").style.display = "block";
  }
  
  // Fungsi untuk menutup pop-up biodata
  function closePopup() {
    document.getElementById("profilePopup").style.display = "none";
  }
  
  // Menambahkan event listener untuk menampilkan pop-up saat logo profil ditekan
  document.getElementById("profileLogo").addEventListener("click", openPopup);
  