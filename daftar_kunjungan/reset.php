<?php
include 'db.php';  // Koneksi ke database

if (isset($_POST['reset'])) {
    $password = $_POST['password'];

    // Validasi password
    if ($password == '023615') {
        // Hapus semua data pengunjung
        $query = "DELETE FROM pengunjung";
        mysqli_query($conn, $query);

        // Pindah ke index.php setelah reset
        header('Location: index.php');
    } else {
        echo "Password salah!";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Database</title>
</head>
<body>
    <h2>Reset Database Pengunjung</h2>

    <form action="reset.php" method="post">
        <label for="password">Password Reset:</label><br>
        <input type="password" id="password" name="password" required><br>

        <button type="submit" name="reset">Reset</button>
    </form>
</body>
</html>
