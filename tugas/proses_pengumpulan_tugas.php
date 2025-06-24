<?php

$id_tugas = $_POST['id_tugas'];
$id_siswa = $_POST['id_siswa'];
$status = $_POST['status'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_pengumpulan_tugas WHERE  id_tugas='$id_tugas' AND id_siswa = '$id_siswa'");
$data = mysqli_fetch_array($query);

if ($data) {
    if ($_FILES['file_jawaban']['name'] == '') {
        $file_jawaban = $_POST['file_jawaban_lama'];
    } else {
        $file = $_FILES['file_jawaban']['name'];
        $file_jawaban = uniqid() . $file;
        $namaSementara = $_FILES['file_jawaban']['tmp_name'];

        unlink('files/' . $_POST['file_jawaban_lama']);
        $terupload = move_uploaded_file($namaSementara, 'files/' . $file_jawaban);
    }

    $query = mysqli_query($koneksi, "UPDATE tb_pengumpulan_tugas SET file_jawaban='$file_jawaban' WHERE id_pengumpulan_tugas= '$data[id_pengumpulan_tugas]'");

    if ($query) {
        echo "<script>alert('Data Berhasil Dikirim');window.location.href='?page=tugas/tugas_session';</script>";
    } else {
        echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=tugas/tugas&id_tugas=$id_tugas';</script>";
    }
} else {
    $file = $_FILES['file_jawaban']['name'];
    $file_jawaban = uniqid() . $file;
    $namaSementara = $_FILES['file_jawaban']['tmp_name'];
    $terupload = move_uploaded_file($namaSementara, 'files/' . $file_jawaban);

    $query = mysqli_query($koneksi, "INSERT INTO tb_pengumpulan_tugas (id_tugas, id_siswa,status, file_jawaban) VALUES ('$id_tugas','$id_siswa','dikirim','$file_jawaban')");

    if ($query) {
        echo "<script>alert('Data Berhasil Dikirim');window.location.href='?page=tugas/tugas_session';</script>";
    } else {
        echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=tugas/tugas&id_tugas=$id_tugas';</script>";
    }
}
