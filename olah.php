<!doctype html>
<?php
include 'koneksi.php';
$id="";
$judul ="";
$pengarang ="";
$penerbit ="";
$kategori ="";
//$gambar = $data['gambar'];

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $query = "SELECT * FROM tb_buku WHERE id='$id'";
    $sql = mysqli_query($konek, $query);
    $data = mysqli_fetch_array($sql);
    $judul = $data['judul'];
    $pengarang = $data['pengarang'];
    $penerbit = $data['penerbit'];
    $kategori = $data['kategori'];
    $gambar = $data['gambar'];


}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.rtl.min.css" integrity="sha384-CfCrinSRH2IR6a4e6fy2q6ioOX7O6Mtm1L9vRvFZ1trBncWmMePhzvafv7oIcWiW" crossorigin="anonymous">

    <title>Data buku</title>
  </head>

  <body>
    <div class="container">
     <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Data Buku</a>
    
  </div>
</nav>

<figure class="text-center mt-5">
  <blockquote class="blockquote">
    <p>Data Buku yang tersedia</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    <cite title="Source Title">Kelola Data Buku</cite>
  </figcaption>
</figure>

<form action="proses.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="mb-3 row">
  <label for="judul" class="col-sm-2 col-form-label">judul</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>"placeholder="Masukkan Judul Buku">
    </div>
  </div>
  <div class="mb-3 row">
  <label for="pengarang" class="col-sm-2 col-form-label">pengarang</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?php echo $pengarang; ?>"placeholder="Masukkan Nama Pengarang">
    </div>
  </div>
  <div class="mb-3 row">
  <label for="penerbit" class="col-sm-2 col-form-label">penerbit</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $penerbit; ?>"placeholder="Masukkan Nama Penerbit">
    </div>
  </div>
  <div class="mb-3 row">
  <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
  <div class="col-sm-10">
    <select name="kategori" id="kategori" class="form-control">
        <option value="Umum" <?php if($kategori == "Umum") echo "selected"; ?>>Umum</option>
        <option value="Komputer" <?php if($kategori == "Komputer") echo "selected"; ?>>Komputer</option>
    </select>
    </div>
  </div>
  <div class="mb-3 row">
  <label for="gambar" class="col-sm-2 col-form-label">gambar</label>
  <div class="col-sm-10">
    <input type="file" class="form-control" id="gambar" name="gambar">
    </div>
  </div>
  <div class="mb-3 row">
    <?php
    if(isset($_GET['edit'])){
        echo "<button type='submit' class='btn btn-primary' name='btnProses' value='edit'>Simpan Perubahan</button>";
    } else {
        echo "<button type='submit' class='btn btn-primary' name='btnProses' value='tambah'>Simpan Data</button>";
    }

    ?>

  </div>
</form>




</div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
  </body>
</html>