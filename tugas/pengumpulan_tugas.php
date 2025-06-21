<?php
$id_tugas = $_GET['id_tugas'];
$tgl = date('Y-m-d');
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
                        <div class="card-title">Silahkan Kumpulkan Tugas !</div>
                    </div>
                    <form action="?page=tugas/proses_pengumpulan_tugas" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_siswa" value="<?= $_SESSION['user_ref_id'] ?>">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <input type="text" class="form-control" value="<?= $data['judul'] ?>" readonly>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal_kumpul" value="<?= date('Y-m-d') ?>" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label for="">File Tugas</label>
                                        <input type="file" class="form-control" name="file_jawaban" required />
                                    </div>

                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">Silahkan Kirim Tugas</button>

                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>