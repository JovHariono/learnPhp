let keyword = document.getElementById("keyword");
let tombolCari = document.getElementById("tombol-cari");
let container = document.getElementById("container");

//tambahkan event ketika input diketik
keyword.addEventListener("keypress", function(){
    //buat object ajax, sama antara xhr & ajax. Mozilla, firefox, opera, chrome support
    let xhr = new XMLHttpRequest();
    
    // cek kesiapan ajax, kesiapan semua sumber siap itu dari 0-4, tapi 4 artinya subernya sudah pasti ok
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax
    xhr.open("GET", `ajax/mahasiswa.php?keyword=${keyword.value}`, true);
    xhr.send();

})