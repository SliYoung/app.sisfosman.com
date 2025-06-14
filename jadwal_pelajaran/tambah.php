<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data Jadwal Pelajaran</div>
                    </div>
                    <form action="?page=jadwal_pelajaran/proses_tambah" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nama Kelas</label>
                                        <select name="id_kelas" class="form-select form-control">
                                            <option value="">Pilih Kelas</option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_kelas'] ?>"><?= $data['nama_kelas'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Mata pelajaran</label>
                                        <select name="id_mapel" class="form-select form-control">
                                            <option value="">Pilih Mata pelajaran</option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_mapel");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_mapel'] ?>"><?= $data['nama_mapel'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Guru</label>
                                        <select name="id_guru" class="form-select form-control">
                                            <option value="">Guru</option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_guru");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_guru'] ?>"><?= $data['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hari</label>
                                        <select name="hari" class="form-select form-control">
                                            <option value="">Pilih Hari</option>
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
                                        <input type="time" id="" class="form-control" name="jam_mulai" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jam Selesei</label>
                                        <input type="time" id="" class="form-control" name="jam_selesai" />
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
