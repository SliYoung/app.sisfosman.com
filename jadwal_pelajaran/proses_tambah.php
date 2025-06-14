<?php

$id_kelas= $_POST ['id_kelas'];
$id_mapel= $_POST ['id_mapel'];
$id_guru= $_POST ['id_guru'];
$hari= $_POST ['hari'];
$jam_mulai= $_POST ['jam_mulai'];
$jam_selesai= $_POST ['jam_selesai'];

$query = mysqli_query($koneksi, "INSERT INTO tb_jadwal_pelajaran(id_kelas,id_mapel,id_guru,hari,jam_mulai,jam_selesai) VALUES ('$id_kelas','$id_mapel','$id_guru','$hari','$jam_mulai','$jam_selesai')");

if ($query){
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=jadwal_pelajaran/index';</script>";
}else{
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=jadwal_pelajaran/tambah';</script>";

}


?>
