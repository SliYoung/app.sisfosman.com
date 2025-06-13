<?php
$id_user = $_GET['id_user'];
$query = mysqli_query($koneksi, "SELECT *, ts.nama as nama_siswa, tg.nama as nama_guru, tu.status as status FROM tb_user tu LEFT JOIN tb_siswa ts ON tu.user_ref_id = ts.id_siswa LEFT JOIN tb_guru tg ON tu.user_ref_id = tg.id_guru WHERE tu.id_user='$id_user'");
$data = mysqli_fetch_array($query);
?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Users</div>
                    </div>
                    <form action="?page=user/proses_edit" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?=$data['id_user']?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?=$data['username']?>" />

                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" placeholder="Masukkan Password" value="<?=$data['password']?>" />

                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                   <input type="text"
                                          style="text-transform: capitalize;"
                                          class="form-control"
                                          name="role"
                                          id="roleInput"
                                          value="<?=$data['role']?>"
                                          readonly/>
                                </div>
                                <div class="form-group" id="guruSelectGroup" style="display: none;">
                                        <label for="">Guru</label>
                                        <select name="user_ref_id_guru" class="form-select form-control">
                                        <option value="<?= $data['id_guru'] ?>"><?= $data['nama_guru'] ?></option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_guru");
                                            while ($data1 = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data1['id_guru'] ?>"><?= $data1['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group" id="siswaSelectGroup" style="display: none;">
                                        <label for="">Siswa</label>
                                        <select name="user_ref_id_siswa" class="form-select form-control">
                                        <option value="<?= $data['id_siswa'] ?>"><?= $data['nama_siswa'] ?></option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
                                            while ($data1 = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data1['id_siswa'] ?>"><?= $data1['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-select form-control">
                                    <option value="<?=$data['status']?>"><?=$data['status']?></option>
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
    document.addEventListener('DOMContentLoaded', function(){
        var role = document.getElementById('roleInput').value.toLowerCase();
        var guruGroup = document.getElementById('guruSelectGroup');
        var siswaGroup = document.getElementById('siswaSelectGroup');

        if (role === "guru") {
            guruGroup.style.display ='block';
            siswaGroup.style.display ='none';
        }else if (role === "siswa") {
            siswaGroup.style.display ="block";
            guruGroup.style.display ="none";
        } else {
            guruGroup.style.display ='none';
            siswaGroup.style.display ='none';
        }
    })
</script>