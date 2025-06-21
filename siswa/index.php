<div class="container">
  <div class="page-inner">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Siswa</h4>
            <a class="btn btn-primary btn-round ms-auto" href="?page=siswa/tambah">
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
                  <th>Nis</th>
                  <th>Nama Siswa</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Kelas</th>
                  <th>Tanggal Masuk</th>
                  <th>Status</th>
                  <th>Foto</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM tb_siswa ts JOIN tb_kelas tk ON ts.id_kelas = tK.id_kelas");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nis'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td>
                      <?php
                        if ($data['jenis_kelamin'] == 'L') {
                           $jk='Laki-Laki';
                        }elseif($data['jenis_kelamin'] == 'P'){
                            $jk='Perempuan';
                        }
                      ?>
                      <?= $jk ?>
                    </td>
                    <td><?= $data['tempat_lahir'] ?></td>
                    <td><?= $data['tanggal_lahir'] ?></td>
                    <td><?= $data['alamat'] ?></td>
                    <td><?= $data['nama_kelas'] ?> (<?= $data['tingkat'] ?>)</td>
                    <td><?= $data['tgl_masuk'] ?></td>
                    <td><?= $data['status'] ?></td>
                    <td><img src="img/<?=$data['foto_siswa']?>" width="50px"></td>
                    <td>
                      <div class="form-button-action">
                        <a class="btn btn-link btn-info btn-lg" href="?page=nilai/index&id_siswa=<?= $data['id_siswa'] ?>"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-link btn-primary btn-lg" href="?page=siswa/edit&id_siswa=<?= $data['id_siswa'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-link btn-danger btn-lg" href="?page=siswa/hapus&id_siswa=<?= $data['id_siswa'] ?>" onclick="return confirm('anda yakin hapus?')"><i class="fa fa-times"></i></a>
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