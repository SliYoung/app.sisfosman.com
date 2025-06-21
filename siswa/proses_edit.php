<?php

$id_siswa = $_POST ['id_siswa'];
$nis= $_POST ['nis'];
$nama= $_POST ['nama'];
$jenis_kelamin= $_POST ['jenis_kelamin'];
$tempat_lahir= $_POST ['tempat_lahir'];
$tanggal_lahir= $_POST ['tanggal_lahir'];
$alamat= $_POST ['alamat'];
$id_kelas= $_POST ['id_kelas'];
$tgl_masuk= $_POST ['tgl_masuk'];
$status= $_POST ['status'];

if ($_FILES['foto_siswa']['name'] == '') {
    $foto_siswa = $_POST['foto_siswa_lama'];
} else {
    $foto = $_FILES['foto_siswa']['name'];
    $foto_siswa = uniqid() . $foto;
    $namaSementara = $_FILES['foto_siswa']['tmp_name'];

    unlink('img/' . $_POST['foto_siswa_lama']);
    $terupload = move_uploaded_file($namaSementara, 'img/' . $foto_siswa);
}


$query = mysqli_query($koneksi, "UPDATE tb_siswa SET nis='$nis',nama='$nama',jenis_kelamin='$jenis_kelamin',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',alamat='$alamat',id_kelas='$id_kelas',tgl_masuk='$tgl_masuk',status='$status',foto_siswa='$foto_siswa' WHERE id_siswa='$id_siswa'");

if ($query){
    echo "<script>alert('Data Berhasil DiUpdate');window.location.href='?page=siswa/index';</script>";
}else{
    echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=siswa/edit&id_siswa=$id_siswa';</script>";

}


?>
