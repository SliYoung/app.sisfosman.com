<?php
$id_absen_session = $_GET['id_absen_session'];
$tgl = date('Y-m-d');
$query = mysqli_query($koneksi, "SELECT * FROM tb_absensi WHERE tanggal='$tgl' AND id_siswa='$_SESSION[user_ref_id]'");
$data = mysqli_fetch_array($query);
?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Silahkan Ambil Absen !</div>
                    </div>
                    <form action="?page=absensi/proses_tambah" method="post">
                    <input type="hidden" name="id_absen_session" value="<?=$id_absen_session?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="">Pilih Siswa</label>
                                        <input type="text" class="form-control" value="<?= $_SESSION['nama'] ?>" readonly>
                                        <input type="hidden" name="id_siswa" value="<?= $_SESSION['user_ref_id'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d') ?>" readonly />
                                    </div>
                                    <?php if ($data != null) { ?>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <input type="text" class="form-control" value="<?= $data['statuss'] ?>" readonly />
                                        </div>
                                    <?php } else { ?>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="statuss" class="form-select form-control" id="selectStatuss" required>
                                                <option value="">Pilih Status</option>
                                                <option value="Hadir">Hadir</option>
                                                <option value="Izin">Izin</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Alpha">Alpha</option>

                                            </select>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group" id="viewKeterangan" style="display: none;">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan" rows="4" placeholder="Masukkan Keterangan"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <?php if ($data != null) { ?>
                                <a class="btn btn-primary"><i class="fas fa-check-circle"></i> Absen Telah Diambil</a>
                            <?php } else { ?>
                                <button class="btn btn-success" type="submit">Absen</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('selectStatuss').addEventListener('change', function() {
        var statussSelect = this.value;
        var Keteranganview = document.getElementById('viewKeterangan');

        if (statussSelect == 'Izin' || statussSelect == 'Sakit') {
            Keteranganview.style.display = 'block';
        } else {
            Keteranganview.style.display = "none";
        }
    })
</script>