<?php

header("Access-Control-Allow-Origin: header");
header("Access-Control-Allow-Origin: *");
include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $response = array();
    $username = "";
    $password = "";
    $fullname ="";
    $email = "";

    if(isset($_POST['username'])){
        $username = $_POST['username'];
    }
    if(isset($_POST['passowrd'])){
        $password = md5($_POST['password']);
    }
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    if(isset($_POST['fullname'])){
        $fullname = $_POST['fullname'];
    }


    $cek = "SELECT * FROM users WHERE username = '$username' || email = '$email'";
    $result = mysqli_fetch_array(mysqli_query($koneksi, $cek));

    if(isset($result)) {
        $response['value'] = 2;
        $response['message'] = "Username atau email telah digunakan";
        echo json_encode($response);
    } else {
        $insert = "INSERT INTO users VALUE (NULL, '$username', '$email', '$password', '$fullname', NOW())";
        if(mysqli_query($koneksi, $insert)) {
            $response ['value'] = 1;
            $response ['message'] = "Berhasil didaftarkan";
            echo json_encode($response);
        } else {
            $response['value'] = 0;
            $response ['message'] = "Gagal didaftarkan";
            echo json_encode($response);
        }
    }
}

?>