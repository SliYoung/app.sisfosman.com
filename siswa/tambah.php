<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data Siswa</div>
                    </div>
                    <form action="?page=siswa/proses_tambah" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nis</label>
                                        <input type="text" class="form-control" name="nis" placeholder="Masukkan Nis" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama siswa</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama siswa" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-select form-control">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" />
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="4" placeholder="Masukkan Alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Kelas</label>
                                        <select name="id_kelas" class="form-select form-control">
                                            <option value="">Pilih Kelas</option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_kelas'] ?>"><?= $data['nama_kelas'] ?> (<?= $data['tingkat'] ?>)</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tgl_masuk" />
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-select form-control">
                                            <option value="">Pilih Status</option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Lulus">Lulus</option>
                                            <option value="Keluar">Keluar</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input type="file" class="form-control" name="foto_siswa" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="?page=siswa/index" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>