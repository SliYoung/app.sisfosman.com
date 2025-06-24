<div class="container">
  <div class="page-inner">

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">Data Absensi</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="add-row" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Siswa</th>
                  <th>Tanggal Kumpul</th>
                  <th>Catatan</th>
                  <th>Nilai</th>
                  <th>Status</th>
                  <th>File Jawaban</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $id_tugas = $_GET['id_tugas'];
                $query = mysqli_query($koneksi, "SELECT tpt.*, ts.nama, tpt.status as status FROM tb_pengumpulan_tugas tpt 
                JOIN tb_siswa ts ON tpt.id_siswa = ts.id_siswa
                WHERE tpt.id_tugas = '$id_tugas'");
                
                while ($data = mysqli_fetch_array($query)) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= date('d-m-Y H:i:s', strtotime($data['tanggal_kumpul'])) ?></td>
                    <td><?= $data['catatan'] != '' ? $data['catatan'] : 'Tidak Ada'?></td>
                    <td><?= $data['nilai'] ?></td>
                    <td><?= $data['status'] == 'dikirim' ? 'Belum Dinilai' : 'Dinilai' ?></td>
                    <td style="text-align: center;"><a href="files/<?=$data['file_jawaban']?>" target="_blank"><i class="fas fa-file"></i></a></td>
                    <td>
                      <div class="form-button-action">
                        <a 
                        class="btn btn-link btn-primary btn-lg" 
                        href="?page=tugas/edit_tugas&id_pengumpulan_tugas=<?= $data['id_pengumpulan_tugas'] ?>&id_tugas=<?$id_tugas?>"><i class="fa fa-edit"></i></a>
                        <a 
                        class="btn btn-link btn-danger btn-lg" 
                        href="?page=tugas/hapus_tugas&id_pengumpulan_tugas=<?= $data['id_pengumpulan_tugas'] ?>&id_tugas=<?= $id_tugas ?>" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-times"></i></a>
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