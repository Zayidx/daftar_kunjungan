<?php
include 'db.php';  // Koneksi ke database

// Cek apakah ada ID yang dikirimkan
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data pengunjung berdasarkan ID
    $query = "SELECT * FROM pengunjung WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

// Function Update data pengunjung
if (isset($_POST['update'])) {
    $nomor = $_POST['nomor'];
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];
    $asal = $_POST['asal'];
    $kesan_pesan = $_POST['kesan_pesan'];

    // Update data pengunjung
    $query = "UPDATE pengunjung 
              SET nomor = '$nomor', nama = '$nama', no_telepon = '$no_telepon', asal = '$asal', kesan_pesan = '$kesan_pesan' 
              WHERE id = '$id'";
    mysqli_query($conn, $query);

    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengunjung</title>
</head>
<body>
    <a href="index.php"><button>Kembali</button></a>

    <h2>Edit Pengunjung</h2>
    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        <label for="nomor">Nomor Pengunjung:</label><br>
        <input type="number" id="nomor" name="nomor" value="<?php echo $row['nomor']; ?>" required><br>

        <label for="nama">Nama Pengunjung:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required><br>

        <label for="no_telepon">Nomor Telepon:</label><br>
        <input type="text" id="no_telepon" name="no_telepon" value="<?php echo $row['no_telepon']; ?>" required><br>

        <label for="asal">Asal Pengunjung:</label><br>
        <input type="text" id="asal" name="asal" value="<?php echo $row['asal']; ?>" required><br>

        <label for="kesan_pesan">Kesan dan Pesan:</label><br>
        <textarea id="kesan_pesan" name="kesan_pesan" required><?php echo $row['kesan_pesan']; ?></textarea><br>

        <button type="submit" name="update">Simpan Perubahan</button>
    </form>
</body>
</html>
