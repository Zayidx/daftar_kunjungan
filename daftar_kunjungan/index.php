<?php
include 'db.php';  // Koneksi ke database

// Function Jumlah Pengunjung
$total_pengunjung = mysqli_query($conn, "SELECT COUNT(*) as total FROM pengunjung");
$total = mysqli_fetch_assoc($total_pengunjung)['total'];

// Ambil Data
$query = "SELECT * FROM pengunjung";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kunjungan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<style>
    .font-roboto {
        font-family: "Merriweather", serif;
    }
</style>
</head>

<body class=" bg-gradient-to-r from-cyan-500 to-blue-500">
    <div class="flex justify-between p-2">
        <img src="./img/Logo_SMK_Negeri_1_Kota_Bekasi.png" class="w-[70px]" alt="">
        <img src="./img/logo-rpl.png" class="w-[70px]" alt="">
    </div>
    <h1 class="text-7xl font-roboto text-lime-50 font-bold text-center mb-6 mt-[-20px]">Selamat Datang Di</h1>

    <center><img src="./img/logo-aesnovation-Recovered.png" class="w-[700px] mb-6" alt=""></center>

    <p class="font-roboto text-center text-5xl text-lime-50 font-bold mb-10">Total Pengunjung : <i class="text-[#fbbf24]"><?php echo $total; ?></i></p>

    <center><a href="add.php"><button class="font-roboto px-4 py-2 bg-[#fbbf24] mb-[100px] text-white rounded">Tambah Pengunjung</button></a></center>

  
    <div class="p-[100px] pt-[10px]">
    <h2 class="font-roboto text-center text-5xl text-lime-50 font-bold mb-10">Daftar Pengunjung</h2>
    <table class="min-w-full border-collapse border border-gray-300 mt-4">
        <tr class="bg-gray-100">
            <th class="bg-[#fbbf24] font-roboto border border-gray-300 px-4 py-2">No</th>
            <th class="bg-[#fbbf24] font-roboto border border-gray-300 px-4 py-2">Nama</th>
            <th class="bg-[#fbbf24] font-roboto border border-gray-300 px-4 py-2">No Telepon</th>
            <th class="bg-[#fbbf24] font-roboto border border-gray-300 px-4 py-2">Asal</th>
            <th class="bg-[#fbbf24] font-roboto border border-gray-300 px-4 py-2">Kesan Pesan</th>
            <th class="bg-[#fbbf24] font-roboto border border-gray-300 px-4 py-2">Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td class='bg-slate-100 border border-gray-300 px-4 py-2'>{$no}</td>
                    <td class='bg-slate-100 border border-gray-300 px-4 py-2'>{$row['nama']}</td>
                    <td class='bg-slate-100 border border-gray-300 px-4 py-2'>{$row['no_telepon']}</td>
                    <td class='bg-slate-100 border border-gray-300 px-4 py-2'>{$row['asal']}</td>
                    <td class='bg-slate-100 border border-gray-300 px-4 py-2'>{$row['kesan_pesan']}</td>
                    <td class='bg-slate-100 border border-gray-300 px-4 py-2'>
                        <a href='edit.php?id={$row['id']}' class='text-blue-500'>Edit</a> | 
                        <a href='delete.php?id={$row['id']}' class='text-red-500'>Hapus</a>
                    </td>
                  </tr>";
            $no++;
        }
        ?>
    </table>
    <br>
    <a href="reset.php"><button class="px-4 py-2 bg-red-500 text-white rounded">Reset Database</button></a>
    </div>
    


</body>

</html>