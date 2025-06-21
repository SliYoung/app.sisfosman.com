<div class="container">
    <div class="page-inner">
        <!-- Card -->
        <h3 class="fw-bold mb-3">Absen</h3>

        <div class="row">
            <?php
            $id_kelas = $_SESSION['id_kelas'];
            $tanggal = date("Y-m-d");
            $query = mysqli_query($koneksi, "SELECT *, tas.tanggal as tanggal_absen FROM tb_absen_session tas 
            JOIN tb_jadwal_pelajaran tjp ON tas.id_jadwal_pelajaran = tjp.id_jadwal_pelajaran
            JOIN tb_mapel tm ON tjp.id_mapel = tm.id_mapel 
            JOIN tb_guru tg ON tjp.id_guru =tg.id_guru 
            JOIN tb_kelas tk ON tjp.id_kelas = tk.id_kelas WHERE tjp.id_kelas = '$id_kelas' AND tas.status_absen_session = 'dibuka'");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-header" style="background-image: url('assets/assets/img/blogpost.jpg')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img src="assets/assets/img/profile.jpg" class="avatar-img rounded-circle" />
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-profile text-center">
                                <div class="name"><?= $data['nama'] ?></div>
                                <div class="job"><?= $data['nama_mapel'] ?><br><?= $data['hari'] ?>, <?= date('H:i', strtotime($data['jam_mulai'])) ?>-<?= date('H:i', strtotime($data['jam_selesai'])) ?></div>
                                <div class="desc"><?= $data['tingkat'] ?> <?= $data['nama_kelas'] ?></div>
                                <?php
                                     $tgl = date('Y-m-d');
                                     $id_absen_session = $data['id_absen_session'];
                                     $query1 = mysqli_query($koneksi, "SELECT * FROM tb_absensi WHERE tanggal='$tgl' AND id_siswa='$_SESSION[user_ref_id]' AND id_absen_session ='$id_absen_session'");
                                     $cek = mysqli_fetch_array($query1);
                                if ($cek != null) {
                                ?>
                                    <div class="view-profile">
                                        <a href="#" class="btn btn-primary w-100"> Anda Telah Ambil Absen</a>
                                    </div>
                                <?php } else { ?>
                                    <div class="view-profile">
                                        <?php
                                        $now = date('H:i:s');
                                        $tglnow = date('Y-m-d');
                                        if ($tglnow == $data['tanggal'] && $now >= $data['jam_buka'] && $now <= $data['jam_tutup']) {
                                        ?>
                                            <a href="?page=absensi/absen&id_absen_session=<?= $data['id_absen_session'] ?>" class="btn btn-success w-100">Silahkan Ambil Absen</a>
                                        <?php } else { ?>
                                            <a href="#" class="btn w-100" style="background-color: grey; color: white;">Silahkan Ambil Absen</a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row user-stats text-center">
                                <div class="col">
                                    <div class="number"><?= date('d-m-Y', strtotime($data['tanggal'])) ?></div>
                                    <div class="title">Tanggal</div>
                                </div>
                                <div class="col">
                                    <div class="number"><?= date('H:i', strtotime($data['jam_buka'])) ?>-<?= date('H:i', strtotime($data['jam_tutup'])) ?></div>
                                    <div class="title">Jam</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>