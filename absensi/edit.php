<?php
$id_absensi = $_GET['id_absensi'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_absensi ta JOIN tb_siswa tb ON ta.id_siswa = tb.id_siswa WHERE id_absensi='$id_absensi'");
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
                    <form action="?page=absensi/proses_edit" method="post">
                        <input type="hidden" name="id_absensi" value="<?= $data['id_absensi'] ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                        <label for="">Nama Siswa</label>
                                        <select name="id_siswa" class="form-select form-control">
                                            <option value="<?= $data['id_siswa'] ?>"><?= $data['nama'] ?></option>
                                            <?php
                                            $querysiswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
                                            while ($data1 = mysqli_fetch_array($querysiswa)) {
                                            ?>
                                                <option value="<?= $data1['id_siswa'] ?>"><?= $data1['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?= $data['tanggal'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="statuss" class="form-select form-control" id="selectStatuss">
                                        <option value="<?= $data['statuss'] ?>"><?= $data['statuss'] ?></option>
                                            <option value="Hadir">Hadir</option>
                                            <option value="Izin">Izin</option>
                                            <option value="Sakit">Sakit</option>
                                            <option value="Alpha">Alpha</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group" id="viewKeterangan">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan" rows="4"><?= $data['keterangan'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="?page=absensi/index" class="btn btn-danger">Kembali</a>
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