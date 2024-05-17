<?php
$koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

$nama_kategori = $_POST['nama_kategori'];

$query = "INSERT INTO tblKategori (nama_kategori) VALUES ('$nama_kategori')";
if (mysqli_query($koneksi, $query)) {
    echo "Data kategori berhasil disimpan.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
