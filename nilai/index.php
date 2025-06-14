<div class="container">
  <div class="page-inner">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Jadwal Pelajaran</h4>
            <a class="btn btn-primary btn-round ms-auto" href="?page=nilai/tambah">
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
                  <th>Mata Pelajaran</th>
                  <th>Semester</th>
                  <th>Tahun Ajaran</th>
                  <th>Nilai Angka</th>
                  <th>Nilai Huruf</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM tb_nilai tn JOIN tb_siswa ts ON tn.id_siswa = ts.id_siswa JOIN tb_mapel tm ON tn.id_mapel = tm.id_mapel");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['nama_mapel'] ?></td>
                    <td><?= $data['semester'] ?></td>
                    <td><?= $data['tahun_ajaran'] ?></td>
                    <td><?= $data['nilai_angka'] ?></td>
                    <td><?= $data['nilai_huruf'] ?></td>
                    <td>
                      <div class="form-button-action">
                        <a class="btn btn-link btn-primary btn-lg" href="?page=nilai/edit&id_nilai=<?= $data['id_nilai'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-link btn-danger btn-lg" href="?page=nilai/hapus&id_nilai=<?= $data['id_nilai'] ?>" onclick="return confirm('anda yakin hapus?')"><i class="fa fa-times"></i></a>
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