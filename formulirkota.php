<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:dicodingkotabpn.database.windows.net,1433; Database = dicodingbpn", "dicodingbpn", "B4l!kp4p4n");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "dicodingbpn@dicodingkotabpn", "pwd" => "B4l!kp4p4n", "Database" => "dicodingbpn", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:dicodingkotabpn.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);


//    require 'function.php';
    if (isset ($_POST['submit'])){   
        if (tambah ($_POST)> 0){
            echo "<script> 
            alert ('Data Berhasil di tambahkan');
            document.location.href= 'formulirkota.php';
            </script>
            ";
        } else {
            echo "<script> 
            alert ('Data Gagal di tambahkan');
            document.location.href= 'formulirkota.php';
            </script>
            ";
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">KECAMATAN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tabel
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="tabelkota.php">Tabel Kota</a>
          <a class="dropdown-item" href="../formulirkecamatan/tabelkecamatan.php">Tabel Kecamatan</a>
          <a class="dropdown-item" href="../formulirwarga/tabelwarga.php">Tabel Warga</a>
          <a class="dropdown-item" href="../formulirbisnis/tabelbisnis.php">Tabel Bisnis</a>
          <a class="dropdown-item" href="../formulirpengelola/tabelpengelola.php">Tabel Pengelola</a>
        </div>

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Formulir
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item active" href="formulirkota.php">Formulir Kota</a>
          <a class="dropdown-item" href="../formulirkecamatan/formulirkecamatan.php">Formulir Kecamatan</a>
          <a class="dropdown-item" href="../formulirwarga/formulirwarga.php">Formulir Warga</a>
          <a class="dropdown-item" href="../formulirbisnis/formulirbisnis.php">Formulir Bisnis</a>
          <a class="dropdown-item" href="../formulirpengelola/formulirpengelola.php">Formulir Pengelola</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<h1 align="center">Formulir Kota </h1>

<form action="" method="POST"> 
  <div class="form-group">
    <label for="nama_kota">Nama Kota</label>
    <input  type="text" class="form-control"  name="nama_kota" id="nama_kota" placeholder="Nama Kota" Required>
  </div>
  <div class="form-group">
    <label hidden for="kode_kota">Kode Kota</label>
    <input  hidden type="text" class="form-control"  name="kode_kota" id="kode_kota" placeholder="Kode Kota">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">simpan</button>
</form>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
