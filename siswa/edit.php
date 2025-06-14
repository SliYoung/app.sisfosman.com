<?php
$id_siswa = $_GET['id_siswa'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_siswa ts JOIN tb_kelas tk ON ts.id_kelas = tk.id_kelas WHERE id_siswa='$id_siswa'");
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
                    <form action="?page=siswa/proses_edit" method="post">
                        <input type="hidden" name="id_siswa" value="<?= $data['id_siswa'] ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nis</label>
                                        <input type="text" class="form-control" name="nis" placeholder="Masukkan Nip" value="<?= $data['nis'] ?>" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Siswa</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Siswa" value="<?= $data['nama'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-select form-control">
                                            <option value="<?= $data['jenis_kelamin'] ?>"><?php
                                            if ($data['jenis_kelamin'] == 'L') {
                                                $jk='Laki-Laki';
                                            }elseif ($data['jenis_kelamin'] === 'P') {
                                                $jk='Perempuan';
                                            }
                                             ?>
                                             <?= $jk ?>
                                            </option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="<?= $data['tempat_lahir'] ?>"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="4" placeholder="Masukkan Alamat"><?= $data['alamat'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kelas</label>
                                        <select name="id_kelas" class="form-select form-control">
                                            <option value="<?= $data['id_kelas'] ?>"><?= $data['nama_kelas'] ?></option>
                                            <?php
                                            $querysiswa = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                                            while ($data1 = mysqli_fetch_array($querysiswa)) {
                                            ?>
                                                <option value="<?= $data1['id_kelas'] ?>"><?= $data1['nama_kelas'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tgl_masuk" placeholder="Masukkan Nohp" value="<?= $data['tgl_masuk'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <input type="text" class="form-control" name="status" placeholder="Masukkan Email" value="<?= $data['status'] ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="?page=siswa/index" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>