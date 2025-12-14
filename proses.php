<?php
include 'koneksi.php';

if(isset($_POST['btnProses'])){
    $judul = $_POST['judul']; 
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $kategori = $_POST['kategori'];

    if($_POST['btnProses'] == 'edit'){
        $id = $_POST['id'];

        if(!empty($_FILES['gambar']['name'])){
            $gambar = $_FILES['gambar']['name'];

            $queryhapus = "SELECT gambar FROM tb_buku WHERE id='$id'";
            $sqlhapus = mysqli_query($konek, $queryhapus);
            $datahapus = mysqli_fetch_assoc($sqlhapus);

            if(!empty($datahapus['gambar']) && file_exists("gambar/".$datahapus['gambar'])){
                unlink("gambar/".$datahapus['gambar']);
            }

            move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$gambar);

            $query = "UPDATE tb_buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', kategori='$kategori', gambar='$gambar' WHERE id='$id'";
        } else {
            $query = "UPDATE tb_buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', kategori='$kategori' WHERE id='$id'";
        }

        mysqli_query($konek, $query);
        header('Location: index.php');
        exit;
    }

    elseif($_POST['btnProses'] == 'tambah'){
        $gambar = !empty($_FILES['gambar']['name']) ? $_FILES['gambar']['name'] : '';
        if($gambar != ''){
            move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$gambar);
        }

        $query = "INSERT INTO tb_buku (judul, pengarang, penerbit, kategori, gambar) VALUES ('$judul', '$pengarang', '$penerbit', '$kategori', '$gambar')";
        mysqli_query($konek, $query);
        header('Location: index.php');
        exit;
    }
}


if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];

    $queryhapus = "SELECT gambar FROM tb_buku WHERE id='$id'";
    $sqlhapus = mysqli_query($konek, $queryhapus);
    $datahapus = mysqli_fetch_assoc($sqlhapus);

    if(!empty($datahapus['gambar']) && file_exists("gambar/".$datahapus['gambar'])){
        unlink("gambar/".$datahapus['gambar']);
    }

    $query = "DELETE FROM tb_buku WHERE id='$id'";
    mysqli_query($konek, $query);

    header('Location: index.php');
    exit;
}
?>
