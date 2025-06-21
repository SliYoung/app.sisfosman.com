<?php
$siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa ts 
    JOIN tb_kelas tk ON ts.id_kelas = tk.id_kelas 
    WHERE ts.id_siswa = '$_SESSION[user_ref_id]'");

$datasiswa = mysqli_fetch_array($siswa);
?>

<div class="container">
    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Nilai Indeks Semester</h4>
                        <a href="nilai/cetak.php" target="blank" class="btn btn-warning btn-round ms-auto"><i class="fa fa-file"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Mapel</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Semester</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Nilai Angka</th>
                                    <th>Nilai Huruf</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $id_siswa = $datasiswa['id_siswa'];
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_nilai tn 
                                    LEFT JOIN tb_mapel tm ON tn.id_mapel = tm.id_mapel 
                                    WHERE tn.id_siswa = '$id_siswa' 
                                    ORDER BY tn.tahun_ajaran DESC, tn.semester ASC");

                                while ($nilai = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $nilai['kode_mapel'] ?></td>
                                        <td><?= $nilai['nama_mapel'] ?></td>
                                        <td><?= $nilai['semester'] ?></td>
                                        <td><?= $nilai['tahun_ajaran'] ?></td>
                                        <td><?= $nilai['nilai_angka'] ?></td>
                                        <td><?= $nilai['nilai_huruf'] ?></td>
                                        <td><?php
                                            if ($nilai['nilai_huruf'] == 'A') {
                                                $bobot = 4;
                                            } elseif ($nilai['nilai_huruf'] == 'B') {
                                                $bobot = 3;
                                            }elseif ($nilai['nilai_huruf'] == 'C') {
                                                $bobot = 2;
                                            }elseif ($nilai['nilai_huruf'] == 'D') {
                                                $bobot = 1;
                                            }elseif ($nilai['nilai_huruf'] == 'E') {
                                                $bobot = 0;
                                            }
                                            ?>
                                            <?= $bobot ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>