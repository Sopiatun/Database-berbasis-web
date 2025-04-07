<?php
require "functions.php";
session_start();

if(!isset($_SESSION["login"]) && !isset($_SESSION["alulogin"])) {
    header("Location: login.php");
    exit;
}

$nim = $_GET['nim'];
$alumni = query("SELECT * FROM alumni WHERE nim = $nim")[0];

if (isset($_POST["submit"])) {
    if (update($nim, $_POST) > 0) {
        echo "<script>alert('Data successfully updated!'); window.location='pencarian.php';</script>";
    } else {
        echo "<script>alert('Failed to update data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- Form structure here with prefilled values from $alumni -->
 <style>/* Centering the form on the page */
form {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  width: 300px;
  margin: auto;
}

/* Style for form labels */
label {
  font-weight: bold;
  margin-top: 10px;
}

/* Style for input fields */
input[type="text"],
input[type="date"] {
  width: 100%;
  padding: 8px;
  margin-top: 5px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 14px;
}

/* Style for the button */
button {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  color: #fff;
  background-color: #007bff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #0056b3;
}
</style>
<form method="post">
  Nama: <input type="text" name="nama" value="<?php echo $alumni['nama']; ?>"><br>
  Tanggal Lahir: <input type="date" name="tanggal_lahir" value="<?php echo $alumni['tanggal_lahir']; ?>"><br>
  Alamat: <input type="text" name="alamat" value="<?php echo $alumni['alamat']; ?>"><br>
  Program Studi: <input type="text" name="prodi" value="<?php echo $alumni['prodi']; ?>"><br>
  Tahun Lulus: <input type="text" name="thlulus" value="<?php echo $alumni['thlulus']; ?>"><br>
  Pekerjaan: <input type="text" name="pekerjaan" value="<?php echo $alumni['pekerjaan']; ?>"><br>
  <button type="submit" name="submit">Update Data</button>
</form>
</html>
