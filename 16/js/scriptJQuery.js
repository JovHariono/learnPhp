$(document).ready(function () {
    $("#tombol-cari").hide();

  //event ketika keyword dituliskan
  $("#keyword").on("keypress", function () {
    //munculkan icon loading
    $(".loader").show();

    //ajax menggunakan load, load punya keterbatasan karena hanya bisa GET
    // $("#container").load(`ajax/mahasiswa.php?keyword=${$("#keyword").val()}`);

    //$_get
    $.get(`ajax/mahasiswa.php?keyword=${$("#keyword").val()}`, function(data){
        $("#container").html(data)
        $(".loader").hide()
    });
  });
});
