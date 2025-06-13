<?php
$id_kelas = $_GET['id_kelas'];
$query= mysqli_query($koneksi, "SELECT * FROM tb_kelas tk JOIN tb_guru tg ON tk.id_guru = tg.id_guru WHERE id_kelas='$id_kelas'");
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
                    <form action="?page=kelas/proses_edit" method="post">
                    <input type="hidden" name="id_kelas" value="<?=$data['id_kelas']?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="">Nama Kelas</label>
                                    <input type="text" class="form-control" name="nama_kelas" value="<?=$data['nama_kelas']?>" />

                                </div>
                                <div class="form-group">
                                    <label>Tingkat</label>
                                    <select name="tingkat" class="form-select form-control">
                                    <option value="<?=$data['tingkat']?>"><?=$data['tingkat']?></option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Guru</label>
                                    <select name="id_guru" class="form-select form-control" required>
                                    <option value="<?=$data['id_guru']?>"><?=$data['nama']?></option>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM tb_guru");
                                        while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                        <option value="<?=$data['id_guru']?>"><?=$data['nama']?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="?page=kelas/index" class="btn btn-danger">Kembali</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>