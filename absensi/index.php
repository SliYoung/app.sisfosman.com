<div class="container">
  <div class="page-inner">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Absensi</h4>
            <a class="btn btn-primary btn-round ms-auto" href="?page=absensi/tambah">
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
                  <th>Nama Siswa</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM tb_absensi tb JOIN tb_siswa ts ON tb.id_siswa = ts.id_siswa");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['tanggal'] ?></td>
                    <td><?= $data['statuss'] ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td>
                      <div class="form-button-action">
                        <a class="btn btn-link btn-primary btn-lg" href="?page=absensi/edit&id_absensi=<?= $data['id_absensi'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-link btn-danger btn-lg" href="?page=absensi/hapus&id_absensi=<?= $data['id_absensi'] ?>" onclick="return confirm('anda yakin hapus?')"><i class="fa fa-times"></i></a>
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