<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data</div>
                    </div>
                    <form action="?page=kelas/proses_tambah" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="">Nama Kelas</label>
                                    <input type="text" class="form-control" name="nama_kelas" placeholder="Masukkan Nama kelas" />

                                </div>
                                <div class="form-group">
                                    <label>Tingkat</label>
                                    <select name="tingkat" class="form-select form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Guru</label>
                                    <select name="id_guru" class="form-select form-control">
                                        <option value="">Pilih Guru</option>
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