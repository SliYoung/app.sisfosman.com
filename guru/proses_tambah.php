<?php

$nip= $_POST ['nip'];
$nama= $_POST ['nama'];
$jenis_kelamin= $_POST ['jenis_kelamin'];
$id_mapel= $_POST ['id_mapel'];
$alamat= $_POST ['alamat'];
$no_hp= $_POST ['no_hp'];
$email= $_POST ['email'];

$foto =$_FILES['foto_guru']['name'];
$foto_guru =uniqid() . $foto;
$namaSementara =$_FILES['foto_guru']['tmp_name'];
$terupload = move_uploaded_file($namaSementara, 'img/' . $foto_guru);

$query = mysqli_query($koneksi, "INSERT INTO tb_guru(nip,nama,jenis_kelamin,id_mapel,alamat,no_hp,email,foto_guru) VALUES ('$nip','$nama','$jenis_kelamin','$id_mapel','$alamat','$no_hp','$email','$foto_guru')");

if ($query){
    echo "<script>alert('Data Berhasil Ditambahkan');window.location.href='?page=guru/index';</script>";
}else{
    echo "<script>alert('Data Gagal Ditambahkan');window.location.href='?page=guru/tambah';</script>";

}


?>
