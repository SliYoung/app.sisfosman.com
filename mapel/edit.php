<?php
$id_mapel = $_GET['id_mapel'];
$query= mysqli_query($koneksi, "SELECT * FROM tb_mapel WHERE id_mapel='$id_mapel' ");
$data = mysqli_fetch_array($query);
?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Mapel</div>
                    </div>
                    <form action="?page=mapel/proses_edit" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_mapel" value="<?=$data['id_mapel']?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="">Kode Matapelajaran</label>
                                    <input type="text" class="form-control" name="kode_mapel" value="<?=$data['kode_mapel']?>" />

                                </div>
                                <div class="form-group">
                                    <label>Nama Matapelajaran</label>
                                    <input type="text" class="form-control" name="nama_mapel" value="<?=$data['nama_mapel']?>" />
                            </div>
                        </div>
                    </div>
                        <div class="card-action">
                            <button class="btn btn-success">Simpan</button>
                            <a href="?page=mapel/index" class="btn btn-danger">Kembali</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>