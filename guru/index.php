<div class="container">
  <div class="page-inner">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Guru</h4>
            <a class="btn btn-primary btn-round ms-auto" href="?page=guru/tambah">
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
                  <th>Nip</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Mapel</th>
                  <th>Alamat</th>
                  <th>Nohp</th>
                  <th>Email</th>
                  <th>Foto</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM tb_guru tk JOIN tb_mapel tg ON tk.id_mapel = tg.id_mapel");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nip'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['jenis_kelamin'] ?></td>
                    <td><?= $data['nama_mapel'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['no_hp'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td> <img src="img/<?= $data['foto_guru'] ?>" width="50px"></td>
                    <td>
                      <div class="form-button-action">
                        <a class="btn btn-link btn-primary btn-lg" href="?page=guru/edit&id_guru=<?= $data['id_guru'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-link btn-danger btn-lg" href="?page=guru/hapus&id_guru=<?= $data['id_guru'] ?>" onclick="return confirm('anda yakin hapus?')"><i class="fa fa-times"></i></a>
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