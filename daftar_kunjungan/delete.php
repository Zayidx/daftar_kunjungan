<?php
include 'db.php';  // Koneksi ke database

// Cek jika ada parameter ID untuk dihapus
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menghapus pengunjung berdasarkan ID
    $query = "DELETE FROM pengunjung WHERE id = '$id'";
    mysqli_query($conn, $query);

    // Reset nomor urut
    $query = "SET @num := 0";
    mysqli_query($conn, $query);

    // Update nomor urut pengunjung
    $query = "UPDATE pengunjung SET nomor = (@num := @num + 1)";
    mysqli_query($conn, $query);
    
    // Pindah ke halaman utama setelah penghapusan
    header('Location: index.php');
}
?>
