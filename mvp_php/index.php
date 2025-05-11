<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("view/TampilMahasiswa.php");

$tampil = new TampilMahasiswa();
$proses = new ProsesMahasiswa();

if (isset($_POST['add_submit'])) {
    // Proses form tambah data
    $data = [
        'nim' => $_POST['nim'],
        'nama' => $_POST['nama'],
        'tempat' => $_POST['tempat'],
        'tl' => $_POST['tl'],
        'gender' => $_POST['gender'],
        'email' => $_POST['email'],
        'telp' => $_POST['telp']
    ];
    
    $result = $proses->addMahasiswa($data);
    
    if ($result) {
        header("Location: index.php?status=tambah_sukses");
    } else {
        header("Location: index.php?status=tambah_gagal");
    }
}
elseif (isset($_POST['edit_submit'])) {
    $data = [
        'id' => $_POST['id'],
        'nim' => $_POST['nim'],
        'nama' => $_POST['nama'],
        'tempat' => $_POST['tempat'],
        'tl' => $_POST['tl'],
        'gender' => $_POST['gender'],
        'email' => $_POST['email'],
        'telp' => $_POST['telp']
    ];
    
    $result = $proses->editMahasiswa($data);
    
    if ($result) {
        header("Location: index.php?status=edit_sukses");
    } else {
        header("Location: index.php?status=edit_gagal");
    }
}
elseif (isset($_GET['form']) && $_GET['form'] == 'tambah') {
    $tampil->tampilFormTambah();
}
elseif (isset($_GET['edit'])) {
    $tampil->tampilFormEdit($_GET['edit']);
}
elseif (isset($_GET['hapus'])) {
    $proses->deleteMahasiswa($_GET['hapus']);

    header("Location: index.php?status=hapus_sukses");
}
else {
    $tampil->tampil();
}