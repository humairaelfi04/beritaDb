<?php
    
$koneksi = mysqli_connect("localhost", "root", "", "db_beritaa");

if($koneksi){
    // echo "Database berhasil konek";
} else {
    echo "gagal Connect";
}  

?>