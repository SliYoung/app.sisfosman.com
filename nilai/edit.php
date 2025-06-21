<?php
$id_nilai = $_GET['id_nilai'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_nilai tn JOIN tb_siswa ts ON tn.id_siswa = ts.id_siswa JOIN tb_mapel tm ON tn.id_mapel = tm.id_mapel WHERE id_nilai='$id_nilai'");
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
                    <form action="?page=nilai/proses_edit" method="post">
                        <input type="hidden" name="id_nilai" value="<?= $data['id_nilai'] ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                        <label for="">Nama Siswa</label>
                                        <select name="id_siswa" class="form-select form-control">
                                            <option value="<?= $data['id_siswa'] ?>"><?= $data['nama'] ?></option>
                                            <?php
                                            $querynilai = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
                                            while ($data1 = mysqli_fetch_array($querynilai)) {
                                            ?>
                                                <option value="<?= $data1['id_siswa'] ?>"><?= $data1['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Matapelajaran</label>
                                        <select name="id_mapel" class="form-select form-control">
                                            <option value="<?= $data['id_mapel'] ?>"><?= $data['nama_mapel'] ?></option>
                                            <?php
                                            $querynilai = mysqli_query($koneksi, "SELECT * FROM tb_mapel");
                                            while ($data1 = mysqli_fetch_array($querynilai)) {
                                            ?>
                                                <option value="<?= $data1['id_mapel'] ?>"><?= $data1['nama_mapel'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <select name="semester" class="form-select form-control">
                                        <option value="<?=$data['semester']?>"><?=$data['semester']?></option>
                                            <option value="Ganjil">Ganjil</option>
                                            <option value="Genap">Genap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tahun Ajaran</label>
                                        <input type="text" class="form-control" name="tahun_ajaran" value="<?= $data['tahun_ajaran'] ?>"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nilai Angka</label>
                                        <input type="number" class="form-control" name="nilai_angka" value="<?= $data['nilai_angka'] ?>"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="?page=nilai/index&id_siswa=<?=$id_siswa?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>