<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM alat ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sim Rs - Data Alat</title>
    <style>
        .header { background-color: orange; color: white; }
        table { width: 80%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        
        /* Style tambahan untuk tombol tambah data agar rapi */
        .btn-tambah {
            display: inline-block;
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-family: sans-serif;
            margin-bottom: 10px;
        }
        .btn-tambah:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <a href="add.php" class="btn-tambah">+ Tambah Alat Baru</a>

    <table>
        <tr class="header">
            <th>Nama Alat</th><th>Tahun</th><th>Merek</th><th>Lokasi</th><th>Aksi</th>
        </tr>
        <?php
        while($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$user_data['nama_alat']."</td>";
            echo "<td>".$user_data['tahun']."</td>";
            echo "<td>".$user_data['merek']."</td>";
            echo "<td>".$user_data['lokasi']."</td>";
            echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>
</html>