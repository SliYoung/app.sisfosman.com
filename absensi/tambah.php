<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data Absensi</div>
                    </div>
                    <form action="?page=absensi/proses_tambah" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                        <label for="">Pilih Siswa</label>
                                        <select name="id_siswa" class="form-select form-control" required>
                                            <option value="">Pilih Nama Siswa</option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_siswa'] ?>"><?= $data['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d')?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="statuss" class="form-select form-control" 
                                        id="selectStatuss" required>
                                            <option value="">Pilih Status</option>
                                            <option value="Hadir">Hadir</option>
                                            <option value="Izin">Izin</option>
                                            <option value="Sakit">Sakit</option>
                                            <option value="Alpha">Alpha</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group" id="viewKeterangan" style="display: none;">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" name="keterangan" rows="4" placeholder="Masukkan Keterangan"></textarea>
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
    document.getElementById('selectStatuss').addEventListener('change', function(){
        var statussSelect = this.value;
        var Keteranganview = document.getElementById('viewKeterangan');

        if (statussSelect == 'Izin' || statussSelect == 'Sakit') {
            Keteranganview.style.display ='block';
        }else  {
            Keteranganview.style.display ="none";
        }
    })
</script>