<?php
    // koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "sistem_alumni");

    // menerima query sql

    function query($query) {
        global $conn;
        // ambil data
        $result = mysqli_query($conn, $query);
        $rows = [];
        // masukkan ke array
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function tambah($data) {
        global $conn;
        
        $nim = test_input($data["nim"]);
        $nama = test_input($data["nama"]);
        $tmplahir = test_input($data ["tmplahir"]);
        $tgllahir = test_input($data["tgllahir"]);
        $alamat = test_input($data ["alamat"]);
        $prodi = test_input($data["prodi"]);
        $thlulus = test_input($data["thlulus"]);
        $pekerjaan = test_input($data ["pekerjaan"]);
    
        // Check if nim already exists
        $check_nim = mysqli_query($conn, "SELECT nim FROM alumni WHERE nim = '$nim'");
        if (mysqli_num_rows($check_nim) > 0) {
            echo "<script>alert('NIM sudah ada dalam database');</script>";
            return false;
        }
    
        $query = "INSERT INTO alumni VALUES ('', '$nim', '$nama', '$tmplahir', '$tgllahir', '$alamat', '$prodi', '$thlulus', '$pekerjaan')";
    
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);
    }
    

    function hapus($data) {
        global $conn;

        mysqli_query($conn, $data);

        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;

        $id = $data["id"];
        $nim = test_input($data["nim"]);
        $nama = test_input($data["nama"]);
        $tmplahir = test_input($data ["tmplahir"]);
        $tgllahir = test_input($data["tgllahir"]);
        $alamat = test_input($data ["alamat"]);
        $prodi = test_input($data["prodi"]);
        $thlulus = test_input($data["thlulus"]);
        $pekerjaan = test_input($data ["pekerjaan"]);


        $ubah = "UPDATE alumni SET nama = '$nama', nim = '$nim', tmplahir = '$tmplahir', tgllahir = '$tgllahir', alamat = '$alamat', prodi = '$prodi', thlulus = '$thlulus', pekerjaan = '$pekerjaan' WHERE id = $id";

        mysqli_query($conn, $ubah);
        
        return mysqli_affected_rows($conn);
    }

    function ubah2($data) {
        global $conn;

        $id = $data["id"];
        $nim = test_input($data["nim"]);
        $nama = test_input($data["nama"]);
        $tmplahir = test_input($data ["tmplahir"]);
        $tgllahir = test_input($data["tgllahir"]);
        $alamat = test_input($data ["alamat"]);
        $prodi = test_input($data["prodi"]);
        $thlulus = test_input($data["thlulus"]);
        $pekerjaan = test_input($data ["pekerjaan"]);

        $ubah = "UPDATE alumni SET nama = '$nama', nim = '$nim', tmplahir = '$tmplahir', tgllahir = '$tgllahir', alamat = '$alamat', prodi = '$prodi', thlulus = '$thlulus', pekerjaan = '$pekerjaan' WHERE id = $id";

        mysqli_query($conn, $ubah);
        
        return mysqli_affected_rows($conn);
    }

    function cari($data) {

        $search = "SELECT * FROM alumni WHERE
                nim LIKE '%$data%' OR
                nama LIKE '%$data%' OR
                tmplahir LIKE '%$data%' OR
                tgllahir LIKE '%$data%' OR
                alamat LIKE '%$data%' OR
                prodi LIKE '%$data%' OR
                pekerjaan LIKE '%$data%' OR
                thlulus LIKE '%$data%' ORDER BY nim ASC";
                
        return query($search);
    }

    function update($nim, $data) {
        global $conn;
        // Example query to update alumni data based on NIM
        $query = "UPDATE alumni SET 
                    nama = '{$data['nama']}', 
                    tanggal_lahir = '{$data['tanggal_lahir']}', 
                    alamat = '{$data['alamat']}', 
                    prodi = '{$data['prodi']}', 
                    thlulus = '{$data['thlulus']}', 
                    pekerjaan = '{$data['pekerjaan']}'
                  WHERE nim = $nim";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    
    function delete($nim) {
        global $conn;
        // Example query to delete alumni data based on NIM
        $query = "DELETE FROM alumni WHERE nim = $nim";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    

    function regristasi($data) {
        // menerima data dari post

        global $conn;

        $username = test_input(strtolower($data["username"]));
        // memungkinkan tanda "" dalam database
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $konpassword = mysqli_real_escape_string($conn, $data["konpassword"]);

        // cek username
        $res = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        $res2 = mysqli_query($conn, "SELECT alunim FROM alu WHERE alunim = '$username'");

        if (mysqli_fetch_assoc($res) || mysqli_fetch_assoc($res2)) {
            echo "<script>alert('sudah ada')</script>";
            echo "<script>window.location.href = 'login.php'</script>";
            return false;
        }
        
        // cek konfirmasi password
        if ($password !== $konpassword) {
            echo "<script>alert('konfirmasi salah')</script>";
            return false;
        }

        // enkripsi password
        // password_hash, mengacak menggunakan algoritma default
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambah user baru
        mysqli_query($conn, "INSERT INTO user VALUES('', '$nama_lengkap','$username', '$password','$tempat_lahir','$tanggal_lahir','$alamat','$image')");

        return mysqli_affected_rows($conn);
    }

    function aluregristasi($data) {
        // menerima data dari post

        global $conn;

        $username = test_input(strtolower($data["username"]));
        // memungkinkan tanda "" dalam database
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $konpassword = mysqli_real_escape_string($conn, $data["konpassword"]);

        // cek username
        $res = mysqli_query($conn, "SELECT alunim FROM alu WHERE alunim = '$username'");
        $res2 = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

        if (mysqli_fetch_assoc($res) || mysqli_fetch_assoc($res2)) {
            echo "<script>alert('sudah ada')</script>";
            echo "<script>window.location.href = 'login.php'</script>";
            return false;
        }
        
        // cek konfirmasi password
        if ($password !== $konpassword) {
            echo "<script>alert('konfirmasi salah')</script>";
            return false;
        }

        // enkripsi password
        // password_hash, mengacak menggunakan algoritma default
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambah user baru
        mysqli_query($conn, "INSERT INTO alu VALUES('', '$nama_lengkap','$username', '$password','$tempat_lahir','$tanggal_lahir','$alamat','$image')");

        return mysqli_affected_rows($conn);
    }