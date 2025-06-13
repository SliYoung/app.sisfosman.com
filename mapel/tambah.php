<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Data</div>
                    </div>
                    <form action="?page=mapel/proses_tambah" method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="">Kode Mapel</label>
                                    <input type="text" class="form-control" name="kode_mapel" placeholder="Masukkan Kode Mapel" />

                                </div>
                                <div class="form-group">
                                    <label>Nama Mapel</label>
                                    <input type="text" class="form-control" name="nama_mapel" placeholder="Masukkan Nama Mapel" />
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="?page=mapel/index" class="btn btn-danger">Kembali</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>