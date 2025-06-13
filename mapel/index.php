<div class="container">
  <div class="page-inner">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Matapelajaran</h4>
            <a class="btn btn-primary btn-round ms-auto" href="?page=mapel/tambah">
              <i class="fa fa-plus"></i>
              Tambah Data
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="add-row" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Matapelajaran</th>
                  <th>Nama Matapelajaran</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM tb_mapel");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['kode_mapel'] ?></td>
                    <td><?= $data['nama_mapel'] ?></td>
                    <td>
                      <div class="form-button-action">
                        <a class="btn btn-link btn-primary btn-lg" href="?page=mapel/edit&id_mapel=<?= $data['id_mapel'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-link btn-danger btn-lg" href="?page=mapel/hapus&id_mapel=<?= $data['id_mapel'] ?>" onclick="return confirm('anda yakin hapus?')"><i class="fa fa-times"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>