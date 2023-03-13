<?php

    $conn =  mysqli_connect('localhost','root','','data_uangkas');

    function query($query) {
        global $conn;
        $result = mysqli_query($conn,$query);
        //logika
        // menyiapkan wadah kosong yang kemudian di isi oleh while yang menampilkan nilai dari tabel 
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row; // menambahkan elemen baru di arkhir array
        }
        return $rows;
    }

function registrasi($data){
    global $conn;

    $username = strtolower (stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]) ;
    $password2 = mysqli_real_escape_string($conn,$data["password2"]) ;


    //CEK USERNAME SUDAH ADA ATAU BELUM 
    $result = mysqli_query($conn, "SELECT username FROM user 
                    WHERE username = '$username' ");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar')
                </script>";
        return false;
    }


    //cek konfirmasi passwrd
    if( $password !== $password2 ){
        echo "<script>
                alert('konfirmasi password tidak sesuai');
                </script>";
                return false;
    }
        //enkripsi password 
        $password = password_hash($password,PASSWORD_DEFAULT);
        
       //tambahkan user ke 
       mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");

       return mysqli_affected_rows($conn);
}
?>