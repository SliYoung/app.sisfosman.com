<?php
include "../koneksi.php";

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $user =mysqli_query($koneksi, "SELECT *, ts.nama as nama_siswa, tg.nama as nama_guru, tu.status as status FROM tb_user tu 
    LEFT JOIN tb_siswa ts ON tu.user_ref_id = ts.id_siswa 
    LEFT JOIN tb_guru tg ON tu.user_ref_id = tg.id_guru 
    WHERE username='$username' 
    AND password = '$password' 
    AND role='$role'
    AND tu.status='aktif'");

    if (mysqli_num_rows($user) > 0) {
        $data = mysqli_fetch_array($user);

        if ($data['role'] == 'guru'){
            $nama = $data['nama_guru'];
        }elseif  ($data['role'] == 'siswa'){
            $nama = $data['nama_siswa'];
        }elseif  ($data['role'] == 'admin'){
            $nama = 'administrator';
        }
        
        session_start();
        $_SESSION['id_user'] = $data ['id_user'];
        $_SESSION['username'] = $data ['username'];
        $_SESSION['role'] = $data ['role'];
        $_SESSION['user_ref_id'] = $data ['user_ref_id'];
        $_SESSION['status'] = $data ['status'];
        $_SESSION['nama'] = $nama;
         
        echo "<script>
   alert('Login Berhasil')
   window.location='../index.php'
   </script>";
    }else {
        echo "<script>
   alert('Username Dan Password Salah')
   window.location='login.php'
   </script>";
    }
}
?>