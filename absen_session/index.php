<div class="container">
  <div class="page-inner">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Absen</h4>
            <a class="btn btn-primary btn-round ms-auto" href="?page=absen_session/tambah">
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
                  <th>Nama Guru</th>
                  <th>Nama Kelas</th>
                  <th>Hari</th>
                  <th>Tanggal</th>
                  <th>Jam Buka</th>
                  <th>Jam Tutup</th>
                  <th>Status</th>
                  <th>Hadir</th>
                  <th>Persentase</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT *, tas.tanggal as tanggal_absen FROM tb_absen_session tas 
                JOIN tb_jadwal_pelajaran tjp ON tas.id_jadwal_pelajaran = tjp.id_jadwal_pelajaran
                JOIN tb_mapel tm ON tjp.id_mapel = tm.id_mapel 
                JOIN tb_guru tg ON tjp.id_guru = tg.id_guru 
                JOIN tb_kelas tk ON tjp.id_kelas = tk.id_kelas");

                while ($data = mysqli_fetch_array($query)) {
                $absen = mysqli_query($koneksi,"SELECT count(*) as total_siswa_hadir FROM tb_absensi WHERE id_absen_session = '$data[id_absen_session]'");
                $datahadir = mysqli_fetch_assoc($absen);

                $siswa = mysqli_query($koneksi, "SELECT count(*) as total_siswa FROM tb_siswa ts
                JOIN tb_kelas tk ON ts.id_kelas = tk.id_kelas
                JOIN tb_jadwal_pelajaran tjp ON tk.id_kelas = tjp.id_kelas
                WHERE tjp.id_jadwal_pelajaran ='$data[id_jadwal_pelajaran]'");
                $datasiswa = mysqli_fetch_assoc($siswa);
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_mapel'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['nama_kelas'] ?></td>
                    <td><?= $data['hari'] ?></td>
                    <td><?= $data['tanggal'] ?></td>
                    <td><?= date('H:i',strtotime($data['jam_buka'])) ?></td>
                    <td><?= date('H:i',strtotime($data['jam_tutup']))?></td>
                    <td style="text-transform: capitalize;"><?= $data['status_absen_session'] ?></td>
                    <td><?=$datahadir['total_siswa_hadir']?>/<?=$datasiswa['total_siswa']?></td>
                    <td><?= ($datasiswa['total_siswa'] > 0) ? number_format(($datahadir['total_siswa_hadir'] / $datasiswa['total_siswa']) * 100, 2) . '%' : '0%'  ?>
                  </td>
                  <td>
                      <div class="form-button-action">
                      <a class="btn btn-link btn-info btn-lg" href="?page=absensi/index&id_absen_session=<?= $data['id_absen_session'] ?>"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-link btn-primary btn-lg" href="?page=absen_session/edit&id_absen_session=<?= $data['id_absen_session'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-link btn-danger btn-lg" href="?page=absen_session/hapus&id_absen_session=<?= $data['id_absen_session'] ?>" onclick="return confirm('anda yakin hapus?')"><i class="fa fa-times"></i></a>
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