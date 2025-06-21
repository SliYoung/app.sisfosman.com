<div class="container">
  <div class="page-inner">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Tugas</h4>
            <a class="btn btn-primary btn-round ms-auto" href="?page=tugas/tambah">
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
                  <th>Nama Mata Pelajaran</th>
                  <th>Judul</th>
                  <th>Deskripsi</th>
                  <th>Tanggal</th>
                  <th>Dedline</th>
                  <th>File Tugas</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT *, tt.tanggal as tanggal_tugas FROM tb_tugas tt 
                JOIN tb_jadwal_pelajaran tjp ON tt.id_jadwal_pelajaran = tjp.id_jadwal_pelajaran
                JOIN tb_mapel tm ON tjp.id_mapel = tm.id_mapel");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_mapel'] ?></td>
                    <td><?= $data['judul'] ?></td>
                    <td><?= $data['deskripsi'] ?></td>
                    <td><?= $data['tanggal'] ?></td>
                    <td><?= date('H:i , Y-m-d',strtotime($data['deadline'])) ?></td>
                    <td style="text-align: center;"><a href="files/<?= $data['file_tugas'] ?>" target="_blank"><i class="fas fa-file"></i></a></td>
                   
                    <td>
                      <div class="form-button-action">
                      <a class="btn btn-link btn-info btn-lg" href="?page=absensi/index&id_absen_session=<?= $data['id_absen_session'] ?>"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-link btn-primary btn-lg" href="?page=tugas/edit&id_tugas=<?= $data['id_tugas'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-link btn-danger btn-lg" href="?page=tugas/hapus&id_tugas=<?= $data['id_tugas'] ?>" onclick="return confirm('anda yakin hapus?')"><i class="fa fa-times"></i></a>
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