<?php
include 'db.php';  // Koneksi ke database

// Function Tambah pengunjung
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];
    $asal = $_POST['asal'];
    $kesan_pesan = $_POST['kesan_pesan'];

    // Menambahkan pengunjung ke database
    $query = "INSERT INTO pengunjung (nama, no_telepon, asal, kesan_pesan) VALUES ('$nama', '$no_telepon', '$asal', '$kesan_pesan')";
    mysqli_query($conn, $query);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengunjung</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-cyan-500 to-blue-500 min-h-screen flex flex-col items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <a href="index.php" class="inline-block mb-4 text-blue-500 hover:underline">← Kembali</a>
        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Pengunjung</h2>
        <form action="add.php" method="post" class="space-y-4">
            <!-- Nama Pengunjung -->
            <div class="flex items-center">
                <label for="nama" class="w-1/3 text-gray-700 font-medium">Nama Pengunjung:</label>
                <input type="text" id="nama" name="nama" class="w-2/3 bg-slate-100 rounded-md border-gray-300 shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <!-- Nomor Telepon -->
            <div class="flex items-center">
                <label for="no_telepon" class="w-1/3 text-gray-700 font-medium">Nomor Telepon:</label>
                <input type="text" id="no_telepon" name="no_telepon" class="w-2/3 bg-slate-100 rounded-md border-gray-300 shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <!-- Asal Pengunjung -->
            <div class="flex items-center">
                <label for="asal" class="w-1/3 text-gray-700 font-medium">Asal Pengunjung:</label>
                <input type="text" id="asal" name="asal" class="w-2/3 bg-slate-100 rounded-md border-gray-300 shadow-sm px-3 py-2 focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <!-- Kesan dan Pesan -->
            <div class="flex items-start">
                <label for="kesan_pesan" class="w-1/3 text-gray-700 font-medium mt-2">Kesan dan Pesan:</label>
                <textarea id="kesan_pesan" name="kesan_pesan" class="w-2/3 bg-slate-100 rounded-md border-gray-300  px-3 py-2 focus:ring-2 focus:ring-blue-500" rows="4" required></textarea>
            </div>
            
            <!-- Tombol Submit -->
            <div class="text-center">
                <button type="submit" name="tambah" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Tambah Pengunjung</button>
            </div>
        </form>
    </div>
</body>

</html>
