<div class="container">
  <div class="page-inner">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Kelas</h4>
            <a class="btn btn-primary btn-round ms-auto" href="?page=kelas/tambah">
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
                  <th>Nama Kelas</th>
                  <th>Tingkat</th>
                  <th>Nama guru</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM tb_kelas tk JOIN tb_guru tg ON tk.id_guru = tg.id_guru");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_kelas'] ?></td>
                    <td><?= $data['tingkat'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td>
                      <div class="form-button-action">
                        <a class="btn btn-link btn-primary btn-lg" href="?page=kelas/edit&id_kelas=<?= $data['id_kelas'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-link btn-danger btn-lg" href="?page=kelas/hapus&id_kelas=<?= $data['id_kelas'] ?>" onclick="return confirm('anda yakin hapus?')"><i class="fa fa-times"></i></a>
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