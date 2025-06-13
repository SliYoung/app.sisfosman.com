<?php
$kode_mapel= $_POST['kode_mapel'];
$nama_mapel= $_POST ['nama_mapel'];


$query = mysqli_query($koneksi, "INSERT INTO tb_mapel(kode_mapel,nama_mapel) VALUES ('$kode_mapel','$nama_mapel')");

if ($query){
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=mapel/index';</script>";
}else{
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=mapel/tambah';</script>";

}


?>
