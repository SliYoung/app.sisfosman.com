<?php

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
$status = $_POST['status'];

if ($_POST['role'] == 'guru') {
    $user_ref_id = $_POST['user_ref_id_guru'];
} elseif ($_POST['role'] == 'siswa'){
    $user_ref_id = $_POST['user_ref_id_siswa'];
}elseif ($_POST['role'] == 'admin'){
    $user_ref_id = 0;
}


$query = mysqli_query($koneksi, "INSERT INTO tb_user(username, password, role, user_ref_id, status) VALUES ('$username','$password','$role','$user_ref_id','$status')");

if ($query) {
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=user/index';</script>";
} else {
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=user/tambah';</script>";
}
