<?php

$id_user = $_POST ['id_user'];
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

$query = mysqli_query($koneksi, "UPDATE tb_user SET username='$username',password='$password', role='$role', status='$status',user_ref_id='$user_ref_id' WHERE id_user='$id_user'");

if ($query){
    echo "<script>alert('Data Berhasil DiUpdate');window.location.href='?page=user/index';</script>";
}else{
    echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=user/edit&id_user=$id_user';</script>";

}


?>
