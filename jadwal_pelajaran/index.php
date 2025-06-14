<div class="container">
  <div class="page-inner">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Jadwal Pelajaran</h4>
            <a class="btn btn-primary btn-round ms-auto" href="?page=jadwal_pelajaran/tambah">
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
                  <th>Kelas</th>
                  <th>Mata Pelajaran</th>
                  <th>Guru</th>
                  <th>Hari</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesei</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM tb_jadwal_pelajaran tjp JOIN tb_kelas tk ON tjp.id_kelas = tK.id_kelas JOIN tb_mapel tm ON tjp.id_mapel = tm.id_mapel JOIN tb_guru tg ON tjp.id_guru = tg.id_guru ");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_kelas'] ?></td>
                    <td><?= $data['nama_mapel'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['hari'] ?></td>
                    <td><?= $data['jam_mulai'] ?></td>
                    <td><?= $data['jam_selesai'] ?></td>
                    <td>
                      <div class="form-button-action">
                        <a class="btn btn-link btn-primary btn-lg" href="?page=jadwal_pelajaran/edit&id_jadwal_pelajaran=<?= $data['id_jadwal_pelajaran'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-link btn-danger btn-lg" href="?page=jadwal_pelajaran/hapus&id_jadwal_pelajaran=<?= $data['id_jadwal_pelajaran'] ?>" onclick="return confirm('anda yakin hapus?')"><i class="fa fa-times"></i></a>
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