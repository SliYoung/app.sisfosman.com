<?php
$id_guru = $_GET['id_guru'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_guru tk JOIN tb_mapel tg ON tk.id_mapel = tg.id_mapel WHERE id_guru='$id_guru'");
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
                    <form action="?page=guru/proses_edit" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_guru" value="<?= $data['id_guru'] ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nip</label>
                                        <input type="text" class="form-control" name="nip" placeholder="Masukkan Nip" value="<?= $data['nip'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Guru</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Guru" value="<?= $data['nama'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-select form-control">
                                            <option value="<?= $data['jenis_kelamin'] ?>"><?= $data['jenis_kelamin'] ?></option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Mapel</label>
                                        <select name="id_mapel" class="form-select form-control">
                                            <option value="<?= $data['id_mapel'] ?>"><?= $data['nama_mapel'] ?></option>
                                            <?php
                                            $queryMapel = mysqli_query($koneksi, "SELECT * FROM tb_mapel");
                                            while ($mapel = mysqli_fetch_array($queryMapel)) {
                                            ?>
                                                <option value="<?= $mapel['id_mapel'] ?>"><?= $mapel['nama_mapel'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="4" placeholder="Masukkan Alamat"><?= $data['alamat'] ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">No Hamphone</label>
                                        <input type="text" class="form-control" name="no_hp" placeholder="Masukkan Nohp" value="<?= $data['no_hp'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="Masukkan Email" value="<?= $data['email'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input type="hidden" class="form-control" name="foto_guru_lama" value="<?= $data['foto_guru'] ?>" />
                                        <input type="file" class="form-control" name="foto_guru" />
                                        <img src="img/<?=$data['foto_guru']?>" width="100" style="margin-top: 10px;">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="?page=guru/index" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>