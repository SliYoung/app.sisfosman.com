<?php
$id_absen_session = $_GET['id_absen_session'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_absen_session tas 
JOIN tb_jadwal_pelajaran tjp ON tas.id_jadwal_pelajaran = tjp.id_jadwal_pelajaran
JOIN tb_mapel tm ON tjp.id_mapel = tm.id_mapel 
JOIN tb_guru tg ON tjp.id_guru =tg.id_guru 
JOIN tb_kelas tk ON tjp.id_kelas = tk.id_kelas WHERE id_absen_session='$id_absen_session'");
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
                    <form action="?page=absen_session/proses_edit" method="post">
                        <input type="hidden" name="id_absen_session" value="<?= $data['id_absen_session'] ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                        <label for="">Jadwal Pelajaran</label>
                                        <select name="id_jadwal_pelajaran" class="form-select select2">
                                            <option value="<?= $data['id_jadwal_pelajaran'] ?>"><?= $data['nama_kelas'] ?> | <?= $data['nama_mapel'] ?> |  <?= $data['nama'] ?> | <?= $data['hari'] ?>, <?= date('H:i', strtotime($data['jam_mulai']))?>-<?= date('H:i', strtotime($data['jam_selesai']))?></option>
                                            <?php
                                             $queryabsensession = mysqli_query($koneksi, "SELECT * FROM tb_jadwal_pelajaran tjp 
                                             JOIN tb_mapel tm ON tjp.id_mapel = tm.id_mapel 
                                             JOIN tb_guru tg ON tjp.id_guru = tg.id_guru 
                                             JOIN tb_kelas tk ON tjp.id_kelas = tk.id_kelas");
                                            while ($data2 = mysqli_fetch_array($queryabsensession)) {
                                            ?>
                                                <option value="<?= $data2['id_jadwal_pelajaran'] ?>">
                                                <?= $data2['nama_kelas'] ?> | <?= $data2['nama_mapel'] ?> |  <?= $data2['nama'] ?> | <?= $data2['hari'] ?>, <?= date('H:i', strtotime($data2['jam_mulai']))?>-<?= date('H:i', strtotime($data2['jam_selesai']))?>  </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d')?>" value="<?= $data['tanggal'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jam Buka</label>
                                        <input type="time" class="form-control" name="jam_buka" value="<?=$data['jam_buka']?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jam Tutup</label>
                                        <input type="time" class="form-control" name="jam_tutup" value="<?=$data['jam_tutup']?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status_absen_session" class="form-select form-control" 
                                        id="selectStatuss" required>
                                        <option value="<?= $data['status_absen_session'] ?>"><?= $data['status_absen_session'] ?></option>
                                            <option value="dibuka">dibuka</option>
                                            <option value="ditutup">ditutup</option>
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
<script>
    function toggleKeterangan(){
        var statussSelect = document.getElementById('selectStatuss').value;
        var Keteranganview = document.getElementById('viewKeterangan');

        if (statussSelect == 'Izin' || statussSelect == 'Sakit') {
            Keteranganview.style.display ='block';
        }else  {
            Keteranganview.style.display ="none";
        }
    }

    document.getElementById('selectStatuss').addEventListener('change', toggleKeterangan);
    window.addEventListener('DOMContentLoaded', toggleKeterangan);
</script>