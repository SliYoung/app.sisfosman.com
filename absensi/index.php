<div class="container">
  <div class="page-inner">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Absensi</h4>
            <a class="btn btn-primary btn-round ms-auto"href="?page=absensi/tambah&id_absen_session=<?=$_GET['id_absen_session']?>">
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
                  <th>Jam</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $id_absen_session = $_GET['id_absen_session'];
                $query = mysqli_query($koneksi, "SELECT * FROM tb_absensi ta 
                JOIN tb_siswa ts ON ta.id_siswa = ts.id_siswa
                JOIN tb_absen_session tas ON ta.id_absen_session = tas.id_absen_session
                WHERE ta.id_absen_session='$id_absen_session'");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['tanggal'] ?></td>
                    <td><?= $data['jam'] ?></td>
                    <td><?= $data['statuss'] ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td>
                      <div class="form-button-action">
                        <a class="btn btn-link btn-primary btn-lg" href="?page=absensi/edit&id_absensi=<?= $data['id_absensi'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-link btn-danger btn-lg" href="?page=absensi/hapus&id_absensi=<?= $data['id_absensi'] ?>&id_absen_session=<?= $data['id_absen_session'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-times"></i></a>
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