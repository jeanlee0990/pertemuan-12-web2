<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Ambil ID kategori dari URL
$idKategori = $_GET['id'];

// Query untuk mendapatkan data kategori berdasarkan ID
$query = "SELECT * FROM tblKategori WHERE idKategori='$idKategori'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

// Inisialisasi variabel untuk menyimpan nama kategori
$namaKategori = "";

// Jika data kategori ditemukan
if ($row) {
    $namaKategori = $row['nama_kategori'];
} else {
    echo "Data kategori tidak ditemukan.";
}

// Jika tombol Edit ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kategori = $_POST['nama_kategori'];

    // Query untuk mengupdate data kategori
    $query = "UPDATE tblKategori SET nama_kategori='$nama_kategori' WHERE idKategori='$idKategori'";
    if (mysqli_query($koneksi, $query)) {
        echo "Data kategori berhasil diupdate.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    // Perbarui nama kategori yang telah diubah
    $namaKategori = $nama_kategori;
}

// Tutup koneksi
mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Kategori</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?id=".$idKategori; ?>" method="POST">
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori:</label><br>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $namaKategori; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
