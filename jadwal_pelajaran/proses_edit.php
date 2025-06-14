<?php

$id_jadwal_pelajaran = $_POST ['id_jadwal_pelajaran'];
$id_kelas= $_POST ['id_kelas'];
$id_mapel= $_POST ['id_mapel'];
$id_guru= $_POST ['id_guru'];
$hari= $_POST ['hari'];
$jam_mulai= $_POST ['jam_mulai'];
$jam_selesai= $_POST ['jam_selesai'];

$query = mysqli_query($koneksi, "UPDATE tb_jadwal_pelajaran SET id_kelas='$id_kelas',id_mapel='$id_mapel',id_guru='$id_guru',hari='$hari',jam_mulai='$jam_mulai',jam_selesai='$jam_selesai' WHERE id_jadwal_pelajaran='$id_jadwal_pelajaran'");

if ($query){
    echo "<script>alert('Data Berhasil DiUpdate');window.location.href='?page=jadwal_pelajaran/index';</script>";
}else{
    echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=jadwal_pelajaran/edit&id_jadwal_pelajaran=$id_jadwal_pelajaran';</script>";

}


?>
