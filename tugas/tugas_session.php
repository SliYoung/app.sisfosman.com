<div class="container">
    <div class="page-inner">
        <!-- Card -->
        <h3 class="fw-bold mb-3">Pengumpulan Tugas</h3>

        <div class="row">
            <?php
            $id_kelas = $_SESSION['id_kelas'];
            $tanggal = date("Y-m-d");
            $query = mysqli_query($koneksi, "SELECT *, tas.tanggal as tanggal_tugas FROM tb_tugas tas 
            JOIN tb_jadwal_pelajaran tjp ON tas.id_jadwal_pelajaran = tjp.id_jadwal_pelajaran
            JOIN tb_mapel tm ON tjp.id_mapel = tm.id_mapel 
            JOIN tb_guru tg ON tjp.id_guru =tg.id_guru 
            JOIN tb_kelas tk ON tjp.id_kelas = tk.id_kelas WHERE tjp.id_kelas = '$id_kelas'");
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
                                <div class="view-profile">
                                        <?php
                                        $now = date('Y-m-d H:i:s');
                                        $tglnow = date('Y-m-d');
                                        if ($tglnow >= $data['tanggal'] && $now <= $data['deadline']) {
                                        ?>
                                            <a href="?page=tugas/pengumpulan_tugas&id_tugas=<?= $data['id_tugas'] ?>" class="btn btn-success w-100">Pegumpulan Tugas</a>
                                        <?php } else { ?>
                                            <a href="#" class="btn w-100" style="background-color: grey; color: white;">Pegumpulan Tugas</a>
                                        <?php } ?>
                                    </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row user-stats text-center">
                                <div class="col">
                                    <div class="number"><?= date('d-m-Y', strtotime($data['tanggal'])) ?></div>
                                    <div class="title">Tanggal</div>
                                </div>
                                <div class="col">
                                    <div class="number"><?= date('d-m-Y H:i', strtotime($data['deadline'])) ?></div>
                                    <div class="title">Deadline</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>