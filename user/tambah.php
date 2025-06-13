<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data</div>
                    </div>
                    <form action="?page=user/proses_tambah" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" />

                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" placeholder="Masukkan Password" />

                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-select form-control" id="roleSelect" required>
                                        <option value="">Pilih Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="guru">Guru</option>
                                        <option value="siswa">Siswa</option>
                                    </select>
                                </div>
                                <div class="form-group" id="guruSelectGroup" style="display: none;">
                                        <label for="">Guru</label>
                                        <select name="user_ref_id_guru" class="form-select form-control">
                                            <option value="">Pilih Guru</option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_guru");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_guru'] ?>"><?= $data['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group" id="siswaSelectGroup" style="display: none;">
                                        <label for="">Siswa</label>
                                        <select name="user_ref_id_siswa" class="form-select form-control">
                                            <option value="">Pilih Siswa</option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_siswa'] ?>"><?= $data['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-select form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="nonaktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card-action">
                            <button class="btn btn-success">Simpan</button>
                            <a href="?page=user/index" class="btn btn-danger">Kembali</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    document.getElementById('roleSelect').addEventListener('change', function(){
        var selectedRole = this.value;

        var guruGroup = document.getElementById('guruSelectGroup');
        var siswaGroup = document.getElementById('siswaSelectGroup');

        if (selectedRole == "guru") {
            guruGroup.style.display ='block';
            siswaGroup.style.display ='none';
        }else if (selectedRole == "siswa") {
            siswaGroup.style.display ="block";
            guruGroup.style.display ="none";
        } else {
            guruGroup.style.display ='none';
            siswaGroup.style.display ='none';
        }
    })
</script>