<?php
session_start();
include '../koneksi.php';

$siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa ts 
    JOIN tb_kelas tk ON ts.id_kelas = tk.id_kelas 
    WHERE ts.id_siswa = '$_SESSION[user_ref_id]'");

$datasiswa = mysqli_fetch_array($siswa);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Pelajaran - SMAN NEGERI 02 BATANG KAPAS</title>
    <style type="text/css" media="print">
        @page {
            size: A4 portrait;
            margin: 0;
        }

        body {
            margin: 0;
        }

        .container {
            box-shadow: none !important;
            margin: 0 !important;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
    <style>
        body {
            background-color: #cccccc;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 790px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .header {
            display: flex;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .kop {
            text-align: center;
            border-bottom: 3px solid black;
            padding-bottom: 8px;
            margin-bottom: 15px;
            flex-shrink: 0;
        }

        .kop h1 {
            margin: 0;
            font-size: 16pt;
            font-weight: normal;
        }

        .kop h2 {
            margin: 0;
            font-size: 10pt;
            font-weight: normal;
        }

        h3 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 12pt;
            text-decoration: underline;
            flex-shrink: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 8pt;
            flex-grow: 1;
            overflow: auto;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px 7px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 8pt;
            flex-shrink: 0;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container">
        <div class="kop">
            <h1>SMAN 02 BATANG KAPAS</h1>
            <h2>Jl.Tuik IV Koto Mudik Kab.Pesisir Selatan | Telp: +6281277407483</h2>
            <h2>Website : app.sisfosman.com | Email: sman02@gmail.com</h2>
        </div>

        <h3>DARTAR NILAI</h3>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Mapel</th>
                    <th>Mata Pelajaran</th>
                    <th>Semester</th>
                    <th>Tahun Ajaran</th>
                    <th>Nilai Angka</th>
                    <th>Nilai Huruf</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $id_siswa = $datasiswa['id_siswa'];
                $query = mysqli_query($koneksi, "SELECT * FROM tb_nilai tn JOIN tb_siswa ts ON tn.id_siswa = ts.id_siswa JOIN tb_mapel tm ON tn.id_mapel = tm.id_mapel WHERE tn.id_siswa='$id_siswa'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['nama_mapel'] ?></td>
                        <td><?= $data['semester'] ?></td>
                        <td><?= $data['tahun_ajaran'] ?></td>
                        <td><?= $data['nilai_angka'] ?></td>
                        <td><?= $data['nilai_huruf'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="footer">
            <p>Dicetak Pada <script>
                    document.write(new Date().toLocaleDateString('id-ID'));
                </script>
            </p>
        </div>
    </div>
</body>

</html>