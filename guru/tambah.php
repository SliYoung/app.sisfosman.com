<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data</div>
                    </div>
                    <form action="?page=guru/proses_tambah" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nip</label>
                                        <input type="text" class="form-control" name="nip" placeholder="Masukkan Nip" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Guru</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Guru" />
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
                                        <label for="">Mapel</label>
                                        <select name="id_mapel" class="form-select form-control">
                                            <option value="">Pilih Mapel</option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_mapel");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_mapel'] ?>"><?= $data['nama_mapel'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="4" placeholder="Masukkan Alamat"></textarea>
                                    </div>
                                <div class="form-group">
                                    <label for="">No Hamphone</label>
                                    <input type="text" class="form-control" name="no_hp" placeholder="Masukkan Nohp" />
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Masukkan Email" />
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" class="form-control" name="foto_guru" />
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <a href="?page=guru/index" class="btn btn-danger">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>