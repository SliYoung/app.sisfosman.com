<?php
$id_jadwal_pelajaran = $_GET['id_jadwal_pelajaran'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_jadwal_pelajaran tjp JOIN tb_kelas tk ON tjp.id_kelas = tk.id_kelas JOIN tb_mapel tm ON tjp.id_mapel = tm.id_mapel JOIN tb_guru tg ON tjp.id_guru = tg.id_guru WHERE id_jadwal_pelajaran='$id_jadwal_pelajaran'");
$data = mysqli_fetch_array($query);
?>

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Data</div>
                    </div>
                    <form action="?page=jadwal_pelajaran/proses_edit" method="post">
                        <input type="hidden" name="id_jadwal_pelajaran" value="<?= $data['id_jadwal_pelajaran'] ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                        <label for="">Nama Kelas</label>
                                        <select name="id_kelas" class="form-select form-control">
                                            <option value="<?= $data['id_kelas'] ?>"><?= $data['nama_kelas'] ?></option>
                                            <?php
                                            $queryjadwal_pelajaran = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                                            while ($data1 = mysqli_fetch_array($queryjadwal_pelajaran)) {
                                            ?>
                                                <option value="<?= $data1['id_kelas'] ?>"><?= $data1['nama_kelas'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Matapelajaran</label>
                                        <select name="id_mapel" class="form-select form-control">
                                            <option value="<?= $data['id_mapel'] ?>"><?= $data['nama_mapel'] ?></option>
                                            <?php
                                            $queryjadwal_pelajaran = mysqli_query($koneksi, "SELECT * FROM tb_mapel");
                                            while ($data1 = mysqli_fetch_array($queryjadwal_pelajaran)) {
                                            ?>
                                                <option value="<?= $data1['id_mapel'] ?>"><?= $data1['nama_mapel'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Guru</label>
                                        <select name="id_guru" class="form-select form-control">
                                            <option value="<?= $data['id_guru'] ?>"><?= $data['nama'] ?></option>
                                            <?php
                                            $queryjadwal_pelajaran = mysqli_query($koneksi, "SELECT * FROM tb_guru");
                                            while ($data1 = mysqli_fetch_array($queryjadwal_pelajaran)) {
                                            ?>
                                                <option value="<?= $data1['id_guru'] ?>"><?= $data1['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hari</label>
                                        <select name="hari" class="form-select form-control">
                                        <option value="<?=$data['hari']?>"><?=$data['hari']?></option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                            <option value="Sabtu">Sabtu</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jam Mulai</label>
                                        <input type="time" class="form-control" name="jam_mulai" value="<?= $data['jam_mulai'] ?>"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jam Selesai</label>
                                        <input type="time" class="form-control" name="jam_selesai" value="<?= $data['jam_selesai'] ?>"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="?page=jadwal_pelajaran/index" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>