<?php

$id_tugas = $_POST['id_tugas'];
$id_siswa = $_POST['id_siswa'];

if ($_FILES['file_jawaban']['name'] == '') {
    $file_jawaban = $_POST['file_jawaban_lama'];
} else {
    $file = $_FILES['file_jawaban']['name'];
    $file_jawaban = uniqid() . $file;
    $namaSementara = $_FILES['file_jawaban']['tmp_name'];

    unlink('files/' . $_POST['file_jawaban_lama']);
    $terupload = move_uploaded_file($namaSementara, 'files/' . $file_jawaban);
}

$query = mysqli_query($koneksi, "UPDATE tb_pengumpulan_tugas SET id_jadwal_pelajaran='$id_jadwal_pelajaran',judul='$judul',deskripsi='$deskripsi',deadline='$deadline',tanggal='$tanggal',file_jawaban='$file_jawaban' WHERE id_pengumpulan_tugas='$id_pengumpulan_tugas'");

// if ($query){
//     echo "<script>alert('Data Berhasil DiUpdate');window.location.href='?page=tugas/index';</script>";
// }else{
//     echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=tugas/edit&id_tugas=$id_tugas';</script>";

// }


?>

