<?php

$nis= $_POST ['nis'];
$nama= $_POST ['nama'];
$jenis_kelamin= $_POST ['jenis_kelamin'];
$tempat_lahir= $_POST ['tempat_lahir'];
$tanggal_lahir= $_POST ['tanggal_lahir'];
$alamat= $_POST ['alamat'];
$id_kelas= $_POST ['id_kelas'];
$tgl_masuk= $_POST ['tgl_masuk'];
$status= $_POST ['status'];

$foto =$_FILES['foto_siswa']['name'];
$foto_siswa =uniqid() . $foto;
$namaSementara =$_FILES['foto_siswa']['tmp_name'];
$terupload = move_uploaded_file($namaSementara, 'img/' . $foto_siswa);

$query = mysqli_query($koneksi, "INSERT INTO tb_siswa(nis,nama,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,id_kelas,tgl_masuk,status,foto_siswa) VALUES ('$nis','$nama','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat','$id_kelas','$tgl_masuk','$status','$foto_siswa')");

if ($query){
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=siswa/index';</script>";
}else{
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=siswa/tambah';</script>";

}


?>
