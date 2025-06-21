<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data Tugas</div>
                    </div>
                    <form action="?page=tugas/proses_tambah" method="post"  enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                </div>
                                <div class="form-group">
                                    <label for="">Jadwal_Pelajaran</label>
                                    <select name="id_jadwal_pelajaran" class="form-select select2">
                                        <option value="">Pilih Jadwal Pelajaran</option>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM tb_jadwal_pelajaran tjp
                                            JOIN tb_mapel tm ON tjp.id_mapel = tm.id_mapel
                                            JOIN tb_guru tg ON tjp.id_guru = tg.id_guru 
                                            JOIN tb_kelas tk ON tjp.id_kelas = tk.id_kelas");
                                        while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                            <option value="<?= $data['id_jadwal_pelajaran'] ?>">
                                                <?= $data['nama_kelas'] ?> (<?= $data['tingkat'] ?>) | <?= $data['nama_mapel'] ?> | <?= $data['nama'] ?> | <?= $data['hari'] ?>, <?= date('H:i', strtotime($data['jam_mulai'])) ?>-<?= date('H:i', strtotime($data['jam_selesai'])) ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <textarea class="form-control" name="judul" rows="5" placeholder="Tambahkan Judul"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" rows="5" placeholder="Tambahkan Deskripsi"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d') ?>" />
                                </div>
                                <div class="form-group">
                                    <label>Deadline</label>
                                    <input type="datetime-local" class="form-control" name="deadline" />
                                </div>
                                <div class="form-group">
                                    <label for="">File Tugas</label>
                                    <input type="file" class="form-control" name="file_tugas" />
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success" type="submit">Simpan</button>
                    <a href="?page=tugas/index" class="btn btn-danger">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>