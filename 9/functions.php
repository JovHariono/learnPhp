<?php
$conn = mysqli_connect("localhost", "root", "", "phplat");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function insert($data)
{
    global $conn;

    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa VALUES('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
        alert('Pilih gambar terlebih dahulu')
        </script>";
        return false;
    }

    //cek apakah file yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Yang anda upload bukan gambar')
        </script>";
        return false;
    }

    //cek bila file gambar terlalu besar
    if( $ukuranFile > 1000000 ){
        echo "<script>
        alert('Ukuran gambar terlalu besar')
        </script>";
        return false;
    }

    //jika lolos
    //generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, "img/" . $namaFileBaru);
    return $namaFileBaru;
}

function delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;

    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $id = htmlspecialchars($data["id"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    
    //cek apakah  ada gambar baru?
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else{
        $gambar = upload();
    }

    $query = "UPDATE mahasiswa SET nrp='$nrp', nama='$nama', email='$email', jurusan='$jurusan', gambar='$gambar' WHERE id=$id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%' OR email like '%$keyword%' OR jurusan like '%$keyword%'";

    return query($query);
}
