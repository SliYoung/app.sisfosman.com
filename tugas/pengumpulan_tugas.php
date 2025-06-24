<?php
$id_tugas = $_GET['id_tugas'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_tugas WHERE id_tugas='$id_tugas'");
$data = mysqli_fetch_array($query);

$query1 = mysqli_query($koneksi, "SELECT * FROM tb_pengumpulan_tugas tpt 
JOIN tb_tugas tt ON tpt.id_tugas = tt.id_tugas WHERE tpt.id_tugas='$id_tugas' AND tpt.id_siswa='$_SESSION[user_ref_id]'");
$data1 = mysqli_fetch_array($query1);


?>
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Silahkan Kumpulkan Tugas ! <?= $_SESSION['nama'] ?></div>
                    </div>
                    <form action="?page=tugas/proses_pengumpulan_tugas" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_tugas" value="<?= $id_tugas ?>">
                        <input type="hidden" name="id_siswa" value="<?= $_SESSION['user_ref_id'] ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input type="text" class="form-control" value="<?= $data['judul'] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <input type="text" class="form-control" value="<?= $data['deskripsi'] ?>" readonly>
                                    </div>
                                    <?php if ($data1 != null) { ?>
                                        <div class="form-group">
                                            <label for="">File Jawaban</label>
                                            <input type="hidden" class="form-control" name="file_jawaban_lama" value="<?= $data1["file_jawaban"] ?>" />
                                            <input type="file" class="form-control" name="file_jawaban" />
                                            <br>
                                            <a href="files/<?= $data1['file_jawaban'] ?>" target="_blank"><i class="fas fa-file"></i></a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="form-group">
                                            <label for="">File Jawaban</label>
                                            <input type="file" class="form-control" name="file_jawaban" required />
                                        </div>
                                    <?php } ?>
                                    <div class="card-action">
                                        <button class="btn btn-success" type="submit">Silahkan Kirim Tugas</button>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <iframe src="files/<?= $data['file_tugas'] ?>" width="100%" height="600"></iframe>
                                </div>
                                </div>
                                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>