<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data absen_session</div>
                    </div>
                    <form action="?page=absen_session/proses_tambah" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                        <label for="">Jadwal</label>
                                        <select name="id_jadwal_pelajaran" class="form-select select2" required>
                                            <option value="">Pilih Jadwal</option>
                                            <?php
                                             $query = mysqli_query($koneksi, "SELECT * FROM tb_jadwal_pelajaran tjp 
                                             JOIN tb_mapel tm ON tjp.id_mapel = tm.id_mapel 
                                             JOIN tb_guru tg ON tjp.id_guru = tg.id_guru 
                                             JOIN tb_kelas tk ON tjp.id_kelas = tk.id_kelas");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_jadwal_pelajaran'] ?>">
                                                <?= $data['nama_kelas'] ?> | <?= $data['nama_mapel'] ?> |  <?= $data['nama'] ?> | <?= $data['hari'] ?>, <?= date('H:i', strtotime($data['jam_mulai']))?>-<?= date('H:i', strtotime($data['jam_selesai']))?>  </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d')?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jam Buka</label>
                                        <input type="time" class="form-control" name="jam_buka" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jam Tutup</label>
                                        <input type="time" class="form-control" name="jam_tutup" />
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status_absen_session" class="form-select form-control" 
                                        id="selectStatuss" required>
                                            <option value="">Pilih Status</option>
                                            <option value="dibuka">Dibuka</option>
                                            <option value="ditutup">Ditutup</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="?page=absen_session/index" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>