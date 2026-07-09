<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM alat ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM RS - Data Alat Elektromedis</title>
    <style>
        /* Reset & Base Style */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            padding: 40px 20px;
        }
        
        /* Container */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        /* Header */
        .main-header {
            margin-bottom: 25px;
            border-bottom: 2px solid #edf2f7;
            padding-bottom: 15px;
        }
        .main-header h2 {
            color: #2d3748;
            font-size: 24px;
            font-weight: 600;
        }

        /* Action Button */
        .btn-tambah {
            display: inline-block;
            padding: 10px 20px;
            background-color: #10b981; 
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 20px;
            transition: all 0.2s ease;
        }
        .btn-tambah:hover {
            background-color: #059669;
            transform: translateY(-1px);
        }

        /* Table Design */
        .table-responsive {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            margin-top: 5px;
        }
        
        /* Table Header */
        th {
            background-color: #f8fafc;
            color: #4a5568;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            padding: 16px;
            border-bottom: 2px solid #e2e8f0;
        }

        /* Table Body */
        td {
            padding: 16px;
            border-bottom: 1px solid #edf2f7;
            color: #4a5568;
            font-size: 15px;
        }
        
        /* Zebra Striping & Hover Effect */
        tr:nth-child(even) td {
            background-color: #fcfdfd;
        }
        tr:hover td {
            background-color: #f1f5f9;
        }

        /* Action Links Inside Table */
        .actions a {
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            padding: 4px 8px;
            border-radius: 4px;
            transition: all 0.2s;
        }
        .actions .edit {
            color: #3b82f6; 
            background-color: #eff6ff;
            margin-right: 5px;
        }
        .actions .edit:hover {
            background-color: #dbeafe;
        }
        .actions .delete {
            color: #ef4444; 
            background-color: #fef2f2;
        }
        .actions .delete:hover {
            background-color: #fee2e2;
        }

        /* Footer Style untuk Nama Anda */
        .main-footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #edf2f7;
            text-align: center;
            font-size: 13px;
            color: #a0aec0;
        }
        .main-footer strong {
            color: #4a5568;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="main-header">
        <h2>Sistem Informasi Manajemen RS - Data Alat</h2>
    </div>

    <a href="add.php" class="btn-tambah">+ Tambah Alat Baru</a>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Nama Alat</th>
                    <th>Tahun</th>
                    <th>Merek</th>
                    <th>Lokasi</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($user_data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td><strong>".$user_data['nama_alat']."</strong></td>";
                    echo "<td>".$user_data['tahun']."</td>";
                    echo "<td>".$user_data['merek']."</td>";
                    echo "<td>".$user_data['lokasi']."</td>";
                    echo "<td class='actions' style='text-align: center;'>
                            <a href='edit.php?id=$user_data[id]' class='edit'>Edit</a>
                            <a href='delete.php?id=$user_data[id]' class='delete' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="main-footer">
        Aplikasi dikembangkan oleh: <strong>FIRMANSYAH GITA PRADANA</strong>
    </div>
</div>

</body>
</html>