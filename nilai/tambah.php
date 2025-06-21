<?php
$id_siswa = $_GET['id_siswa'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE id_siswa='$id_siswa'");
$data = mysqli_fetch_array($query);
?>

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data Jadwal Pelajaran</div>
                    </div>
                    <form action="?page=nilai/proses_tambah" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nama Siswa</label>
                                        <select name="id_siswa" class="form-select form-control" readonly>
                                            <option value="<?=$data['id_siswa']?>"><?=$data['nama']?> </option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_siswa'] ?>"><?= $data['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Mata pelajaran</label>
                                        <select name="id_mapel" class="form-select form-control">
                                            <option value="">Pilih Mata pelajaran</option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_mapel");
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id_mapel'] ?>"><?= $data['nama_mapel'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <select name="semester" class="form-select form-control">
                                            <option value="">Pilih Semester</option>
                                            <option value="Ganjil">Ganjil</option>
                                            <option value="Genap">Genap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tahun Ajaran </label>
                                        <input type="text" id="" class="form-control" name="tahun_ajaran" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nilai Angka</label>
                                        <input type="number" id="" class="form-control" name="nilai_angka" />
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
