<?php
$siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa ts JOIN tb_kelas tk ON ts.id_kelas = tk.id_kelas WHERE ts.id_siswa='$_SESSION[user_ref_id]'");
$datasiswa = mysqli_fetch_array($siswa)

?>
<div class="container">
    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Jadwal Pelajaran <?= $datasiswa['nama_kelas'] ?> (<?= $datasiswa['tingkat'] ?>)</h4>
                        <a href="jadwal_pelajaran/cetak.php" target="blank" class="btn btn-warning btn-round ms-auto"><i class="fa fa-file"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Mata pelajaran</th>
                                    <th>Nama Mata Pelajaran</th>
                                    <th>Guru</th>
                                    <th>Hari</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $id_kelas = $datasiswa['id_kelas'];
                                // Ambil data jadwal pelajaran berdasarkan kelas siswa
                                $query = mysqli_query($koneksi, "SELECT * FROM tb_jadwal_pelajaran tjp LEFT JOIN tb_mapel tm ON tjp.id_mapel = tm.id_mapel LEFT JOIN tb_guru tg ON tjp.id_guru = tg.id_guru WHERE tjp.id_kelas = '$id_kelas'");
                                while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data['kode_mapel'] ?></td>
                                        <td><?= $data['nama_mapel'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['hari'] ?></td>
                                        <td><?= $data['jam_mulai'] ?></td>
                                        <td><?= $data['jam_selesai'] ?></td>
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