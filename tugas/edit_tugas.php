<?php
$id_pengumpulan_tugas = $_GET['id_pengumpulan_tugas'];
$query = mysqli_query($koneksi, "SELECT tpt.*, ts.nama, tpt.status as status FROM tb_pengumpulan_tugas tpt 
JOIN tb_siswa ts ON tpt.id_siswa = ts.id_siswa
JOIN tb_tugas tt ON tpt.id_tugas = tt.id_tugas 
WHERE id_pengumpulan_tugas='$id_pengumpulan_tugas'");
$data = mysqli_fetch_array($query);

$id_tugas = $data['id_tugas'];
?>

<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Nilai Jawaban</div>
                    </div>
                    <form action="?page=tugas/proses_edit_tugas" method="post">
                        <input type="hidden" name="id_pengumpulan_tugas" value="<?= $data['id_pengumpulan_tugas'] ?>">
                        <input type="hidden" name="id_tugas" value="<?= $data['id_tugas'] ?>">
                        <input type="hidden" name="id_pengumpulan_tugas" value="<?= $data['id_pengumpulan_tugas'] ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <textarea class="form-control" name="catatan" rows="5"><?= $data['catatan'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Nilai</label>
                                        <input type="number" class="form-control" name="nilai" value="<?= $data['nilai'] ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-select form-control">
                                            <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>
                                            <option value="dinilai">dinilai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Simpan</button>
                            <a href="?page=tugas/nilai_tugas&id_tugas=<?= $id_tugas ?>" class="btn btn-danger">Kembali</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>