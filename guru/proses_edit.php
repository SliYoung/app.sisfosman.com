<?php

$id_guru = $_POST ['id_guru'];
$nip= $_POST ['nip'];
$nama= $_POST ['nama'];
$jenis_kelamin= $_POST ['jenis_kelamin'];
$id_mapel= $_POST ['id_mapel'];
$alamat= $_POST ['alamat'];
$no_hp= $_POST ['no_hp'];
$email= $_POST ['email'];

if ($_FILES['foto_guru']['name'] == '') {
    $foto_guru = $_POST['foto_guru_lama'];
} else {
    $foto = $_FILES['foto_guru']['name'];
    $foto_guru = uniqid() . $foto;
    $namaSementara = $_FILES['foto_guru']['tmp_name'];

    unlink('img/' . $_POST['foto_guru_lama']);
    $terupload = move_uploaded_file($namaSementara, 'img/' . $foto_guru);
}

$query = mysqli_query($koneksi, "UPDATE tb_guru SET nip='$nip',nama='$nama',jenis_kelamin='$jenis_kelamin',id_mapel='$id_mapel',alamat='$alamat',no_hp='$no_hp',email='$email', foto_guru='$foto_guru' WHERE id_guru='$id_guru'");

if ($query){
    echo "<script>alert('Data Berhasil DiUpdate');window.location.href='?page=guru/index';</script>";
}else{
    echo "<script>alert('Data Gagal DiUpdate');window.location.href='?page=guru/edit&id_guru=$id_guru';</script>";

}


?>
