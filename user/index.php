<div class="container">
  <div class="page-inner">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Users</h4>
            <a class="btn btn-primary btn-round ms-auto" href="?page=user/tambah">
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
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Paswsord</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT *, ts.nama as nama_siswa, tg.nama as nama_guru, tu.status as status FROM tb_user tu LEFT JOIN tb_siswa ts ON tu.user_ref_id = ts.id_siswa LEFT JOIN tb_guru tg ON tu.user_ref_id = tg.id_guru");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td>
                      <?php
                        if ($data['role'] == 'guru') {
                          $nama = $data['nama_guru'];
                        }elseif ($data['role'] == 'siswa'){
                          $nama = $data['nama_siswa'];
                        }elseif ($data['role'] == 'admin'){
                          $nama = 'administator';
                        }
                      ?>
                      <?= $nama ?>
                    </td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['password'] ?></td>
                    <td><?= $data['role'] ?></td>
                    <td><?= $data['status'] ?></td>
                    <td>
                      <div class="form-button-action">
                        <a class="btn btn-link btn-primary btn-lg" href="?page=user/edit&id_user=<?= $data['id_user'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-link btn-danger btn-lg" href="?page=user/hapus&id_user=<?= $data['id_user'] ?>" onclick="return confirm('anda yakin hapus?')"><i class="fa fa-times"></i></a>
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