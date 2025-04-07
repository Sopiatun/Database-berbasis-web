<?php
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "sistem_alumni");
    
  if(isset($_SESSION["alulogin"])) {

    $alunim = $_SESSION["alunim"];  
    $alumni = mysqli_query($conn, "SELECT * FROM alumni WHERE nim = $alunim");
    
    if($alumni == false) {
        echo "<script>alert('Daftarkan data terlebih dahulu')</script>";
        echo "<script>window.location.href = 'inputdata.php'</script>";
    }
      
    foreach($alumni as $tabel) {
        $nim = $tabel['nim'];
        $nama = $tabel['nama'];
        $tanggal_lahir = $tabel['tanggal_lahir'];
        $alamat = $tabel['alamat'];
        $prodi = $tabel['prodi'];
        $thlulus = $tabel['thlulus'];
        $pekerjaan = $tabel['pekerjaan'];
      }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="style.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap"
      rel="stylesheet"
    />

    <title>Sistem Informasi Alumni</title>
  </head>
  <body>
    <section class="pengaturan-akun">
      <div class="header">
        <h2 class="nama">Sistem Informasi Alumni</h2>
        <div class="navbar">
          <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="inputdata.php">Input Data</a></li>
            <li><a href="pencarian.php">Cari Alumni</a></li>
          </ul>
        </div>
        <div class="action">
          <div class="profile" onclick="menuToggle();">
            <img src="img/User_cicrle_light.svg" alt="" />
          </div>
          <div class="menu">
            <ul>
              <li>
                <a href="pengaturanakun.php">Pengaturan Akun</a>
              </li>
              <li class="last-list">
                <a href="local.php">Logout</a>
              </li>
            </ul>
          </div>
        </div>
        <script>
          function menuToggle() {
            const toggleMenu = document.querySelector(".menu");
            toggleMenu.classList.toggle("active");
          }
        </script>
      </div>

      <div class="mid">
        <div class="akun-sidebar">
          <ul class="menu-list">
            <li class="menu-item"><a href="pengaturanakun.php">Informasi Akun</a></li>
            <li class="menu-item"><a href="gantipass.php">Ubah Password</a></li>
          </ul>
        </div>

        <div class="akun-info" id="">
        
        <?php if(isset($_SESSION["user"])) : ?>

          <div class="akun-info-judul">INFORMASI AKUN</div>
          <div class="akun-info-container">
          <div class="left-side">
              <ul>
                <li>Nama Lengkap</li>
                <li>Username</li>
                <li>password</li>
                <li>Tempat lahir</li>
                <li>Tanggal lahir</li>
                <li>Alamat</li>
                <li>image</li>
              </ul>
            </div>

            <div class="right-side">
              <ul>
                <li><?= $nama_lengkap; ?></li>
                <li><?= $username; ?></li>
                <li><?= $password; ?></li>
                <li><?= $tempat_lahir; ?></li>
                <li><?= $tanggal_lahir; ?></li>
                <li><?= $alamat; ?></li>
                <li><?= $image; ?></li>
              </ul>
            </div>           
          </div>
        <?php endif ?>

        <?php if(isset($_SESSION["alulogin"])) : ?>
          <div class="akun-info-judul">INFORMASI AKUN</div>
          <div class="akun-info-container">
          </div>
          
        <h3><a href="ganti.php?nim=<?= $alunim; ?>">Ubah Data</a></h3>
        <?php endif ?>
        </div>
      </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
